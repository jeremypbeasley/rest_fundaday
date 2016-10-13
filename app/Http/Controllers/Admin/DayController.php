<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Day, Session;

class DayController extends Controller {
	// login

	public function login(){
		return view('admin/login');
	}

	public function postLogin(Request $request){
		$input = $request->all();
		$user = empty($input['user']) ? null : $input['user'];
		$pass = empty($input['pass']) ? null : $input['pass'];

		Session::put('rest-admin-user',$user);
		Session::put('rest-admin-pass',$pass);

		return redirect()->route('admin.days.index');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$view = [
			'days' => Day::orderBy('day')->get(),
		];
		return view('admin/days/index',$view);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
            'day'=>'required',
            'name'=>'required',
        ]);
        $input = $request->all();

        $input_time = strtotime($input['day']);
        $start_day = config('app.fund_a_day_start_date');
        $start_time = strtotime($start_day);
        if($input_time < $start_time){
        	return redirect()->back()->withInput()->with('admin-error','Day is not valid. (Has to be after '.$start_day.')');
        }

        if(!array_key_exists('is_anonymous', $input)){
            $input['is_anonymous'] = 0;
        }
        $input_day = date('Y-m-d',$input_time);
        $day_exists = Day::where('day',$input_day)->count();
        if($day_exists){
			return redirect()->back()->withInput()->with('admin-error','Day already exists.');
        }
		$day = new Day;
        $day->day = $input_day;
        $day->donor_name = $input["name"];
        $day->donor_email = $input["email"];
        $day->is_anonymous = $input["is_anonymous"];
        $day->stripe_charge_id = 'CHECK';
        $day->stripe_customer_id = 'CHECK';
        $day->amount = config('app.fund_a_day_amount') * 100; // go dollars to cents :)
        $day->source = 'CHECK';
        $day->description = 'CHECK';
        $day->metadata = 'CHECK';
        $day->captured = 'CHECK';
        $day->statement_descriptor = 'CHECK';
        $day->save();

        return redirect()->route('admin.days.index')->with('admin-success','Day added: '.$input_day.'.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$day = Day::find($id);
		if(!$day){
			return redirect()->back()->withInput()->with('admin-error','Day not found');
		}
		if($day->stripe_charge_id != 'CHECK'){
			return redirect()->back()->withInput()->with('admin-error',"We can only delete it if it was from a check");
		}
		$input_day = date('Y-m-d',strtotime($day->day));
		$day->delete();

		return redirect()->route('admin.days.index')->with('admin-success','Day deleted: '.$input_day.'.');

	}

}
