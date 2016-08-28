<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourImage extends Model
{
	protected $table = 'tour_images';

	protected $fillable = ['path', 'thumbnail_path', 'img_alt', 'img_title'];

	public function tour()
	{
		return $this->belongsTo('App\Tour');
	}

	public function setImgAltAttribute($name)
	{
		$this->attributes['img_alt'] = $name;

		$this->path = $this->baseDir() . '/' . $name;

		$this->thumbnail_path = $this->baseDir() . '/tn-' . $name;
	}

	public function baseDir()
	{
		return "i/tours";
	}

}