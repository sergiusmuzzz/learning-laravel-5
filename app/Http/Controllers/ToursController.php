<?php

namespace App\Http\Controllers;

use App\Tour;
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
		$tour = $this->user->publish(
			new Tour($request->all())
		);

		return redirect(tour_path($tour));
	}
	
	public function show($title)
	{
		$tour = Tour::nameOfTour($title);

		return view('tours.show', compact('tour'));
	}
}
