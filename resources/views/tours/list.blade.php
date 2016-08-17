@extends('layout')

@section('content')
	<div class="col-md-6">
		<h2>First model</h2>
		{{--{!! Form::open(array('url' => '/tours')) !!}--}}
		<form method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				{!! Form::text('title', null, ['class' => 'form-control','placeholder' => 'Title']) !!}
			</div>
			<div class="form-group">
				{!! Form::text('subtitle', null, ['class' => 'form-control','placeholder' => 'Subtitle']) !!}
			</div>

			{{--<h2>Second model</h2>
			<div>
				{!! Form::text('img_alt', null, ['placeholder' => 'Alt']) !!}
			</div>
			<div>
				{!! Form::text('img_title', null, ['placeholder' => 'Title']) !!}
			</div>--}}
			<br>
			{!! Form::submit('Add new tour', ['class' => 'btn btn-primary']) !!}
		{{--{!! Form::close() !!}--}}
		</form>
	</div>

	<div class="col-md-6">
		<h2>From first model:</h2>

		<h2>From second model:</h2>

	</div>
@stop

