<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class TourImage extends Model
{
	protected $table = 'tour_images';

	protected $fillable = ['path', 'thumbnail_path', 'img_alt', 'img_title'];

	protected $baseDir = 'i/photos';

	public function tours()
	{
		return $this->belongsTo('App\Tour');
	}
	
	public static function named($name)
	{
		return (new static)->saveAs($name);
	}

	protected function saveAs($name){
		$this->img_alt = sprintf("%s-%s", time(), $name);
		$this->path = sprintf("%s/%s", $this->baseDir, $this->img_alt);

		$this->thumbnail_path = sprintf("%s/tn-%s", $this->baseDir, $this->img_alt);

		return $this;
	}
	
	public function move(UploadedFile $file)
	{
		$file->move($this->baseDir, $this->img_alt);
		$this->makeThumbnail();

		return $this;
	}

	public function makeThumbnail()
	{
		Image::make($this->path)
			->fit(200)
			->save($this->thumbnail_path);
	}
}
