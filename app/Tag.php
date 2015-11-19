<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

	/**
	 * Fillable fiels for a Tag.
	 * @var [type]
	 */
	protected $fillable = [
		'name'
	];

	/**
	 * get the articles associated with the given tag.
	 * @return Eloquent\Relations\BelongsToMany 
	 */
    public function articles()
    {
    	return $this->belongsToMany('App\Article');
    }
}
