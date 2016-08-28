<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
	protected $fillable = [
		'title',
		'subtitle'
	];

	public static function nameOfTour($title)
	{
		$title = str_replace('-', ' ', $title);
		return static::where(compact('title'))->firstOrFail();
	}
	
	public function addPhoto(TourImage $photo)
	{
		return $this->images()->save($photo);
	}

	public function images()
	{
		return $this->hasMany('App\TourImage');
    }
	
	public function owner()
	{
		return $this->belongsTo('App\User', 'user_id');
	}
	
	public function ownedBy(User $user)
	{
		return $this->user_id == $user->id;
	}

}
