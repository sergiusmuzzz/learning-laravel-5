@extends('layout')

@section('content')
	<h1>Create new tour</h1>
	<div class="col-md-6">
		<h2>First model</h2>
		@include('tours.form-create')
	</div>

	<div class="col-md-6">
		<h2>From first model:</h2>

		<h2>From second model:</h2>

	</div>
@stop