<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
    	'title',
    	'body',
    	'published_at',
        'user_id' //all;
    ];

    protected $dates = ['published_at'];


    public function scopePublished($query)
    {
    	$query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query)
    {
    	$query->where('published_at', '>=', Carbon::now());
    }

    public function setPublishedAtAttribute($date)
    {
    	/*$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);*/
    	$this->attributes['published_at'] = Carbon::parse($date);
    }


    /**
     * get the published at attribute
     * @param  Date Object $date 
     * @return ---       Carbon instance of a date;
     */
    public function getPublishedAtAttribute($date)
    {
        /*return new Carbon($date);*/
        return Carbon::parse($date)->format('Y-m-d');

    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the tags associated with the given article.
     * @return Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }


    /**
     * Get a list of tag ids associated with this article.
     * @return [array] [description]
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->all();
    }
}
