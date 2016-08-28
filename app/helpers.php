<?php

function flash($message)
{
	return session()->flash('flash_message', $message);
}

function tour_path(App\Tour $tour)
{
	return str_replace(' ', '-', $tour->title);
}