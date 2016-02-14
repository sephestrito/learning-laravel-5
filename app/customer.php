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

    public function scopeMembers($query)
    {
        $query->where('membership_ind', '=', 0);
    }

    public function scopeWithGymAccess($query)
    {
        $query->where('gymaccess_ind', '=', 0);
    }

    public function memberships()
    {
        return $this->hasMany('App\Membership');
    }


}
