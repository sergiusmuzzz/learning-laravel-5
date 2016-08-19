<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TourImage;

use App\Http\Requests\TourRequest;
use App\Tour;
use Illuminate\Http\UploadedFile;

class ToursController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['show']]);
	}


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


		$photo = $this->makePhoto($request->file('photo'));

		Tour::nameOfTour($title)->addPhoto($photo);

		return 'Done!';
	}

	protected function makePhoto(UploadedFile $file){
		return TourImage::named($file->getClientOriginalName())->move($file);
	}
}
