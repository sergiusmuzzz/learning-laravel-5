<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TourImage;

use App\Http\Requests\TourRequest;
use App\Tour;

class ToursController extends Controller
{
	public function create()
	{
		return view('tours.create');
    }

	public function store(TourRequest $request)
	{
		Tour::create($request->all());
		return back();

	}
	
	public function show($title)
	{
		$tour = Tour::nameOfTour($title);

		return view('tours.show', compact('tour'));
	}

	public function addPhoto($title, Request $request)
	{
		/*$this->validate($request,[
			'photo' => 'required|mimes:jpg, jpeg, png, bpm'
		]);*/

		$photo = TourImage::fromForm($request->file('photo'));

		Tour::nameOfTour($title)->addPhoto($photo);

		return 'Done!';
	}
}
