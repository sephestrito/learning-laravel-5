<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Motherboard extends Model
{
    protected $fillable = [
    	'name',
    	'brand',
    	'chipset',
    	'cpu_socket',
    	'memory_type',
    	'form_factor',
    	'ethernet',
    	'sata',
    	'sata_speed',
    	'io_ports',
    	'release_date'
    ];


    /**
     * get the Release Date Attribute
     * @param  Date Object $date
     * @return Carbon instance of date
     */
    public function getReleaseDateAttribute($date)
    {
    	return Carbon::parse($date)->format('Y-m-d');
    }

    public function setReleaseDateAttribute($date)
    {
    	$this->attributes['release_date'] = Carbon::parse($date);
    }
}
