@extends('app')



@section('content')
	<h1>Motherboards</h1>

	<hr/>

	@foreach($motherboards as $motherboard)
		<article>
			<h2>
				<a href="{{ url('/motherboards', $motherboard->id) }}">{{ $motherboard->title }}</h2></a>
			<div class="name">
				{{$motherboard->name}}
			</div>
		</article>


	@endforeach
@stop


@section('footer')
@stop