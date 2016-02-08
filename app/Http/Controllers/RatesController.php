<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rate;
use Response;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Requests\RateRequest;
use App\Http\Controllers\Controller;

class RatesController extends Controller
{
    public function index()
    {
    	
    	/*$rates = Rate::order_by('member_ind','desc')->get();
    	return view('rates.index', compact('rates'));*/


    	 /*$rates = Rate::all();*/
    	 $memberRates = Rate::where('member_ind', 1)->get();
    	 $nonMemberRates = Rate::where('member_ind', 0)->get();
         return view('rates.index', ['memberRates' => $memberRates,'nonMemberRates' => $nonMemberRates]);
    }

    public function edit(Rate $rate)
    {
        return view('rates.edit', compact('rate'));
    }

     public function update(Rate $rate, RateRequest $request)
    {
        $rate->update($request->all());
        return view('dashboard.index');
    }

    public function ajaxRateInfo(Request $request)
    {
        /*$rate_id = $request->rate_id;
        $rate = Rate::where('id', '=', $rate_id)->get();
        return Response::json($rate);*/

        $rate_id = $request->rate_id;
        $rate = Rate::where('id', '=', $rate_id)->firstOrFail();
        $price = number_format( $rate->price, 2);

        if($rate->period == 'day')
        {
            $expirationDate = Carbon::today()->addDays($rate->period_count)->format('F d\\, Y');  
        }
        else if($rate->period == 'month')
        {
            $expirationDate = Carbon::today()->addMonths($rate->period_count)->subDay()->format('F d\\, Y');  
        }
        else if($rate->period == 'year')
        {
            $expirationDate = Carbon::today()->addYears($rate->period_count)->subDay()->format('F d\\, Y');  
        }

        /*if($rate_id == 2)
        {
            $expirationDate = Carbon::today()->addMonth()->format('F d\\, Y');      
        }
        else if($rate_id == 6)
        {
            $expirationDate = Carbon::today()->addYear()->subDay()->format('F d\\, Y');  
        }*/
        
        return Response::json(['price' => $price, 'expirationDate' => $expirationDate]);
    }
}
