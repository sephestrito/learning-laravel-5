<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rate;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdministratorController extends Controller
{
    public function rates()
    {
    	
    	/*$rates = Rate::order_by('member_ind','desc')->get();
    	return view('rates.index', compact('rates'));*/


    	 /*$rates = Rate::all();*/
    	 $memberRates = Rate::where('member_ind', 1)->get();
    	 $nonMemberRates = Rate::where('member_ind', 0)->get();
         return view('rates.index', ['memberRates' => $memberRates,'nonMemberRates' => $nonMemberRates]);
    }
}
