<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about()
    {
    	/*Simple Variable*/
        $name = 'Joseph <span style="color:red">Estrito</span>';
    	
        /*return view('pages.about')->with('name',$name);
    		One variable passing*/

    	/*
        Not Using a Compact
        return view('pages.about')->with([
    		'first' => 'Jeffrey',
    		'last' => 'Way'
    		]);
        */

        /*Lesson Passing Array Data
        $data = [];
        $data['first'] = 'Joseph';
        $data['second'] = 'Estrito';
        
        return view('pages.about', $data);
        */

        $people = [];

        /*$people = [
            'wew','wiw','test'
        ];*/

        $first = 'Joseph';
        $second = 'Estrito';
        return view('pages.about',compact('people'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
