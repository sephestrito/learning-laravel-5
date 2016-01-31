<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
    	'rate',
    	'member_ind',
        'price' //all;
    ];

}
