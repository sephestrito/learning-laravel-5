<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\MotherboardRequest;
use App\Motherboard;
use Caffeinated\Flash\Facades\Flash;
use Illuminate\Http\Request;

class MotherboardsController extends Controller
{
    public function index()
    {
    	$motherboards = Motherboard::get();
    	return view('motherboards.index',compact('motherboards'));
    }

    public function create()
    {
    	return view('motherboards.create');
    }

    public function store(MotherboardRequest $request)
    {
    	$motherboards = new Motherboard($request->all());
        $motherboards->save();


    	Flash::info('Your motherboard has been added');
    	return redirect('motherboards');
    }
}
