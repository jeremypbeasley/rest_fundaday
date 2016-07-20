<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Exception\MissingParameterException;

use Crypt;
use Day;
use Exception;
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
        $start_date = config('app.fund_a_day_start_date');

        $next_unfunded_date = new \Carbon\Carbon($start_date);
        $last_date = new \Carbon\Carbon($start_date);
        $last_date->addYear();
        $today = new \Carbon\Carbon();

        $next_unfunded_date = $today->gt($next_unfunded_date) ? $today : $next_unfunded_date;
        $found_unfunded_date = false;

        $return_data = [];
        $return_data['days'] = [];
        $return_data['next_unfunded_date'] = null;
        $return_data['total_days'] = $days->count();

        foreach($days as $day){
            // have we found the first unfunded date yet?
            if(!$found_unfunded_date){
                if($day->day == $next_unfunded_date->format('Y-m-d')){
                    // if this day has been funded - try the next day
                    $next_unfunded_date->addDay();
                }
                elseif(strtotime($day->day) > strtotime($next_unfunded_date->format('Y-m-d'))) {
                    // else - we found our date!
                    $found_unfunded_date = true;
                }
            }
            $name = $day->is_anonymous ? 'Generous Donor' : $day->donor_name;

            $return_data['days'][] = [
                'day'=>$day->day,
                'donor_name'=>$name,
                'is_anonymous'=>$day->is_anonymous,
            ];
        }

        // now, if the all the days have been filled in order - we need to be sure that next_unfunded_date isn't < last_date
        if($next_unfunded_date->lt($last_date)){
            $found_unfunded_date = true;
        }

        if($found_unfunded_date){
            $return_data['next_unfunded_date'] = $next_unfunded_date->format('Y-m-d');
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
        if(!array_key_exists('is_anonymous', $input)){
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
            $charge = Stripe::charges()->create([
                'customer' => $customer['id'],
                'currency' => $currency,
                'amount' => $amount,
                'description' => $description,
            ]);

        } catch (CardErrorException $e) {
            $return_data = [
                'status' => 'failed',
                'error' => $e->getErrorType(),
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'missing_param' => $e->getMissingParameter(),
            ];
            return response()->json($return_data,400);
        } catch (MissingParameterException $e) {
            $return_data = [
                'status' => 'failed',
                'error' => $e->getErrorType(),
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'missing_param' => $e->getMissingParameter(),
            ];
            return response()->json($return_data,400);
        } catch (Exception $e){
            $return_data = [
                'status' => 'failed '.$e->getMessage(),
                'error'=>'stripe'
            ];
            return response()->json($return_data,400);
        }

        // Save the day to the DB
        try {
            $day = new Day;
            $day->day = $input["day"];
            $day->donor_name = $input["name"];
            $day->donor_email = $input["email"];
            $day->is_anonymous = $input["is_anonymous"];
            $day->stripe_charge_id = $charge['id'];
            $day->stripe_customer_id = $charge['customer'];
            $day->amount = $charge['amount'];
            $day->source = json_encode($charge['source']);
            $day->description = $charge['description'];
            $day->metadata = json_encode($charge['metadata']);
            $day->captured = $charge['captured'];
            $day->statement_descriptor = $charge['statement_descriptor'];
            $day->save();

            $encrypted = Crypt::encrypt($day->id.'!'.$day->stripe_customer_id.'!rest4weary');

            $return_data = [
                "id"=>$encrypted,
                "day"=> $day->day,
                "name"=> $day->donor_name,
                "is_anonymous"=> $day->is_anonymous,
                "email"=> $day->donor_email,
            ];
        } catch (Exception $e){

            $return_data = [
                'status' => 'failed',
                'error'=>'db',
            ];
            return response()->json($return_data,400);
        }

        return response()->json($return_data,200);
    }

}
