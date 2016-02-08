<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$rate_data = array(
	    	array('Per session',1,80,1,'day',1),
			array('Monthly',1,1200,1,'month',0),
			array('Annually',1,12000,1,'year',0),
			array('Per session',0,100,1,'day',1),
			array('Monthly',0,1500,1,'month',0),
			array('Annually',0,15000,1,'year',0),
			array('Membership',2,500,1,'year',0)
		);
		
		$timestamp = Carbon::now();

		foreach ($rate_data as $rdata) {
			  DB::table('rates')->insert([
			 	'rate' => $rdata[0],
			 	'member_ind' => $rdata[1],
			 	'price' => $rdata[2],
			 	'period_count' => $rdata[3],
			 	'period' => $rdata[4],
			 	'per_session_ind' => $rdata[5],
			 	'created_at' => $timestamp,
			 	'updated_at' => $timestamp
        	]);
		}
       
    }
}
