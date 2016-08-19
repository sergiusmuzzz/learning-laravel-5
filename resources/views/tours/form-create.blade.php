<form action="/tours" method="post">
{{--{!! Form::open(array('url' => '/tours')) !!}--}}

	<div class="form-group">
		{!! Form::text('title', null, ['class' => 'form-control','placeholder' => 'Title']) !!}
	</div>
	<div class="form-group">
		{!! Form::textarea('subtitle', null, ['class' => 'form-control','placeholder' => 'Subtitle']) !!}
	</div>

	{{--<h2>Second model</h2>
	<div>
		{!! Form::text('img_alt', null, ['placeholder' => 'Alt']) !!}
	</div>
	<div>
		{!! Form::text('img_title', null, ['placeholder' => 'Title']) !!}
	</div>--}}
	<br>
<br>
{{--{!! Form::submit('Add new tour', ['class' => 'btn btn-primary']) !!}--}}
	<input type="submit" class="btn btn-primary">
{{--{!! Form::close() !!}--}}
</form>
	<br>
	@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
</form>