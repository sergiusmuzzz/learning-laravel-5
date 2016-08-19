<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class TourImage extends Model
{
	protected $table = 'tour_images';

	protected $fillable = ['path', 'thumbnail_path', 'img_alt', 'img_title'];

	protected $baseDir = 'tours/photos';

	public function tours()
	{
		return $this->belongsTo('App\Tour');
	}
	
	public static function named($name)
	{
		$photo = new static;

		return (new static)->$photo->saveAs($name);

	}

	protected function saveAs($name){
		$this->name = sprintf("%s-%s", time(), $name);
		$this->path = sprintf("%s/%s", $this->baseDir, $this->name);
		$this->thumbnail_path = sprintf("%s/tn-%s", $this->baseDir, $this->name);

		return $this;
	}
	
	public function move(UploadedFile $file)
	{
		//move file
		$file->move($this->baseDir, $this->name);

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
