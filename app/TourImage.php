<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class TourImage extends Model
{
	protected $table = 'tour_images';

	protected $fillable = ['path', 'img_alt', 'img_title'];

	protected $baseDir = 'tours/photos';

	public function tours()
	{
		return $this->belongsTo('App\Tour');
	}
	
	public static function fromForm(UploadedFile $file)
	{
		$photo = new static;

		$name = time().$file->getClientOriginalName();

		$photo->path = $photo->baseDir . '/' . $name;

		//move file
		$file->move($photo->baseDir, $name);

		return $photo;

	}
}
