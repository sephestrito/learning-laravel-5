<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $fillable = [
    	'name',
    	'address',
    	'contact_number',
    	'emergency_name',
    	'emergency_contact_number',
    	'membership_ind',
    	'gymaccess_ind'
    ];


    public function memberships()
    {
        return $this->hasMany('App\Membership');
    }


}
