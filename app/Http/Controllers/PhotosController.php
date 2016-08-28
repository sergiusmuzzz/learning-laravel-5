<?php

namespace App\Http\Controllers;

use App\Tour;
use App\AddPhotoToTour;
use App\Http\Requests\AddPhotoRequest;


class PhotosController extends Controller
{
	public function store($title, AddPhotoRequest $request)
	{

		$tour = Tour::nameOfTour($title);
		$photo = $request->file('photo');

		(new AddPhotoToTour($tour, $photo))->save();


		return 'Done!';
	}
}
