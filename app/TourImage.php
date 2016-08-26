<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class TourImage extends Model
{
	protected $table = 'tour_images';

	protected $fillable = ['path', 'thumbnail_path', 'img_alt', 'img_title'];

	protected $file;

	protected static function boot()
	{
		static::creating(function($photo){
			return $photo->upload();
		});
	}

	public function tour()
	{
		return $this->belongsTo('App\Tour');
	}

	public static function fromFile(UploadedFile $file){
		$photo = new static;

		$photo->file = $file;

		return $photo->fill([
			'img_title' => $photo->fileName(),
			'path' => $photo->filePath(),
			'thumbnail_path' => $photo->thumbnailPath()
		]);
	}
	
	public function fileName()
	{
		$name = sha1(
			time() . $this->file->getClientOriginalName()
		);

		$extension = $this->file->getClientOriginalExtension();

		return "{$name}.{$extension}";
	}

	public function filePath(){
		return $this->baseDir() . "/" . $this->fileName();
	}

	public function thumbnailPath(){
		return $this->baseDir() . "/tn-" . $this->fileName();
	}

	public function baseDir()
	{
		return "i/tours";
	}

	/*protected function saveAs($name){
		$this->img_alt = sprintf("%s-%s", time(), $name);
		$this->path = sprintf("%s/%s", $this->baseDir, $this->img_alt);

		$this->thumbnail_path = sprintf("%s/tn-%s", $this->baseDir, $this->img_alt);

		return $this;
	}*/
	
	public function upload()
	{
		$this->file->move($this->baseDir(), $this->fileName());
		$this->makeThumbnail();

		return $this;
	}

	public function makeThumbnail()
	{
		Image::make($this->filePath())
			->fit(200)
			->save($this->thumbnailPath());
	}
}
