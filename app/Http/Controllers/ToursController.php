<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPhotoRequest;
use App\Tour;
use App\TourImage;
use Illuminate\Http\Request;
use App\Http\Requests\TourRequest;

class ToursController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth', ['except' => ['show']]);
		parent::__construct();
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

	public function addPhoto($title, AddPhotoRequest $request)
	{

		$photo = TourImage::fromFile($request->file('photo'));


		Tour::nameOfTour($title)->addPhoto($photo);

		return 'Done!';
	}



	protected function makePhoto(UploadedFile $file){
		return TourImage::named($file->getClientOriginalName())->move($file);
	}
}
