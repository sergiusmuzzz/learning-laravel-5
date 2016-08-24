@extends('layout')


@section('content')

	<div class="row">
		<div class="col-md-4">
			<h1>{!! $tour->title !!}</h1>
			<h2>{!! nl2br($tour->subtitle) !!}</h2>
		</div>

		<div class="col-md-8 gallery">
			@foreach($tour->images->chunk(4) as $set)
				<div class="row">
					@foreach($set as $image)
						<div class="col-md-3 gallery-item">
							<a href="{{ $image->path }}">
								<img src="{{ $image->thumbnail_path }}" alt="">
							</a>
						</div>
					@endforeach
				</div>
			@endforeach
		</div>
	</div>


	<hr>

	<h2>Add your photos</h2>

	{{ Form::open(
		[
			'url' => route('store_photo_path', $tour->title),
			'id' => 'addPhotosForm',
			'class' => 'dropzone'
		]
	)}}

	{{ Form::close() }}
@stop

@section('scripts.footer')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
	<script>
		Dropzone.options.addPhotosForm = {
			paramName: 'photo',
			acceptedFiles: '.jpg, .jpeg, .png, .bmp'
		};
	</script>
@stop
