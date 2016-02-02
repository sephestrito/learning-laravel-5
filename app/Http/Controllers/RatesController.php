<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rate;
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
}
