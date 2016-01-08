@extends('app')

@section('content')
    <h1>
        About
    </h1>
    @if(count($people))
        <h3>People I like:</h3>
        <ul>
            @foreach($people as $person)
                <li>{{ $person }}</li>
            @endforeach
        </ul>
    @endif
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi architecto asperiores commodi eaque impedit libero nesciunt nulla perspiciatis, quas ratione. Et incidunt nemo similique. Accusamus doloribus incidunt ipsa mollitia odio?
    </p>
@stop