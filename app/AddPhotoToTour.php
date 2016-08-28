<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 8/27/16
 * Time: 9:19 PM
 */

namespace App;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class AddPhotoToTour
{
	protected $tour;
	protected $file;
	
	public function __construct(Tour $tour, UploadedFile $file, Thumbnail $thumbnail = null)
	{
		$this->tour = $tour;
		$this->file = $file;
		$this->thumbnail = $thumbnail ?: new Thumbnail;
	}
	
	public function save()
	{
		// Attach the photo to the tour
		$photo = $this->tour->addPhoto($this->makePhoto());

		// Move the photo to the images folder
		$this->file->move($photo->baseDir(), $photo->img_alt);

		// Generate a thumbnail
		$this->thumbnail->make($photo->path, $photo->thumbnail_path);

	}
	
	public function makePhoto()
	{
		return new TourImage(['img_alt' => $this->makeFileName()]);
	}

	protected function makeFileName()
	{
		$name = sha1(
			time() . $this->file->getClientOriginalName()
		);

		$extension = $this->file->getClientOriginalExtension();

		return "{$name}.{$extension}";
	}
}
