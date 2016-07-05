<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Day;
use Stripe;

class DayController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Day Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the index and create of Day records
    |
    */

    /**
     * List all the day records
     *
     * @param  array  $data
     * @return User
     */
    public function index()
    {
        $days = Day::orderBy('day')->get();

        $return_data = [];
        $return_data['days'] = [];
        $return_data['total_days'] = $days->count();

        foreach($days as $day){
            $name = $day->is_anonymous ? 'Generous Donor' : $day->donor_name;

            $return_data['days'][] = [
                'day'=>$day->day,
                'donor_name'=>$name,
                'is_anonymous'=>$day->is_anonymous,
            ];
        }

        return response()->json($return_data);
    }

    /**
     * Create a new day record and send to Stripe
     *
     * @param  array  $data
     * @return User
     */
    public function create(Request $request)
    {
        // Validate Input
        $this->validate($request, [
            'day'=>'required',
            'name'=>'required',
            'email'=>'email|required',
            'cc_number'=>'required',
            'cc_exp_month'=>'required',
            'cc_exp_year'=>'required',
            'cvc'=>'required',
        ]);

        $input = $request->all();
        if(array_key_exists('is_anonymous', $input)){
            $input['is_anonymous'] = 0;
        }

        // Convert date format
        $input['day'] = date('Y-m-d',strtotime($input['day']));

        $day_exists = Day::where('day',$input['day'])->count();
        if($day_exists){
            $return_data = [
                'error'=>'That day was already selected'
            ];
            return response()->json($return_data,400);
        }

        // Default amount from config
        $description = config('app.fund_a_day_product_name');
        $amount = config('app.fund_a_day_amount');
        $currency = config('app.fund_a_day_currency');

        // Try to charge the card

        try {
            $token = Stripe::tokens()->create([
                'card' => [
                    'number' => $input["cc_number"],
                    'exp_month' => $input["cc_exp_month"],
                    'exp_year' => $input["cc_exp_year"],
                    'cvc' => $input["cvc"],
                ],
            ]);

            // Find or create the customer
            $customer = Stripe::customers()->create([
                'email' => $input["email"],
                'source' => $token['id'],
            ]);

            // Charge the customer!
            $response = Stripe::charges()->create([
                'customer' => $customer['id'],
                'currency' => $currency,
                'amount' => $amount,
                'description' => $description,
            ]);

            // Save the day to the DB
            $day = new Day;
            $day->day = $input["day"];
            $day->donor_name = $input["name"];
            $day->donor_email = $input["email"];
            $day->is_anonymous = $input["is_anonymous"];
            $day->stripe_charge_id = $response['id'];
            $day->stripe_customer_id = $response['customer'];
            $day->amount = $response['amount'];
            $day->source = json_encode($response['source']);
            $day->description = $response['description'];
            $day->metadata = json_encode($response['metadata']);
            $day->captured = $response['captured'];
            $day->statement_descriptor = $response['statement_descriptor'];
            $day->save();

            $return_data = [
                "day"=> $day->day,
                "name"=> $day->donor_name,
                "is_anonymous"=> $day->is_anonymous,
                "email"=> $day->donor_email,
            ];

        } catch (CardErrorException $e) {
            $return_data = [
                'status' => 'failed',
                'error' => $e->getErrorType(),
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'missing_param' => $e->getMissingParameter(),
            ];
        } catch (MissingParameterException $e) {
            $return_data = [
                'status' => 'failed',
                'error' => $e->getErrorType(),
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'missing_param' => $e->getMissingParameter(),
            ];
        }


        return response()->json($return_data);
    }

}
