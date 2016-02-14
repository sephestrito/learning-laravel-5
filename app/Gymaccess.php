<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gymaccess extends Model
{
    protected $fillable = [
    	'customer_id',
    	'active_ind',
    	'activation_date',
        'expiration_date' //all;
    ];

    public function setActivation_dateAttribute($date)
    {
    	$this->attributes['activation_date'] = Carbon::parse($date);
    }

     public function setExpiration_dateAttribute($date)
    {
    	$this->attributes['expiration_date'] = Carbon::parse($date);
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

}