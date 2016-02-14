<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use App\Membership;
use App\Gymaccess;
use App\Rate;
use DB;
use Auth;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        Customer::create($request->all());
        return redirect('dashboard');
    }

    public function listing()
    {
         $customers = Customer::all();
        return view('customers.listing', ['customers' => $customers]);
    }

    public function membership_listing()
    {
        $customers = Customer::members()->get();
        return view('customers.listing',['customers'=> $customers]);
    }

    public function gymaccess_listing()
    {
        $customers = Customer::withGymAccess()->get();
        return view('customers.listing',['customers'=> $customers]);
    }

    public function membership($id)
    {
        $customer = \App\Customer::where('id',$id)->firstOrFail();
        $activationDate = Carbon::today()->format('F d\\, Y');  
        $expirationDate = Carbon::today()->addYear()->subDay()->format('F d\\, Y');  

        $rate = \App\Rate::where('member_ind',2)->firstOrFail();
        $price = $rate->price;
        return view('customers.membership', compact('customer','activationDate','expirationDate', 'price'));
    }

    public function membership_update(Request $request)
    {
        /*dd($request->id);*/
        $customer = customer::find($request->id);
        $customer->membership_ind = 1;
        $customer->save();

        $membership = new Membership();
        $membership->customer_id = $request->id;
        $membership->activation_date = Carbon::today();
        $membership->expiration_date = Carbon::today()->addYear()->subDay();
        $membership->active_ind = 1;
        $membership->save();    
        return redirect('dashboard');
    }

    public function gymaccess($id)
    {
        $customer = \App\Customer::where('id',$id)->firstOrFail();
        /*$activationDate = Carbon::today();*/
        $activationDate = Carbon::today()->format('F d\\, Y');
        $rates = Rate::where('member_ind',$customer->membership_ind)->where('per_session_ind','!=',1)->lists('rate','id','price');
        return view('customers.gymaccess',compact('customer','rates','activationDate'));
    }

    public function gymaccess_update(Request $request)
    {
        $customer = customer::find($request->id);
        $customer->gymaccess_ind = 1;
        $customer->save();

        $gymaccess = new gymaccess();
        $gymaccess->customer_id = $request->id;
        $gymaccess->activation_date = Carbon::today();
        
        $rate_id = $request->gymaccess;
        $rate = Rate::where('id', '=', $rate_id)->firstOrFail();
        /*$price = number_format( $rate->price, 2);*/

        if($rate->period == 'day')
        {
            $gymaccess->expiration_date = Carbon::today()->addDays($rate->period_count);  
        }
        else if($rate->period == 'month')
        {
            $gymaccess->expiration_date = Carbon::today()->addMonths($rate->period_count)->subDay();  
        }
        else if($rate->period == 'year')
        {
            $gymaccess->expiration_date = Carbon::today()->addYears($rate->period_count)->subDay();  
        }
        $gymaccess->active_ind = 1;
        $gymaccess->save();    
        return redirect('dashboard');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
         dd($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
