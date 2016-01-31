@extends('app')



@section('content')
	<h1>Create a new Motherboard</h1>

	<hr/>

	{!! Form::model($motherboard = new \App\Motherboard, ['url' => 'motherboards']) !!}
		@include('motherboards.form',['submitButtonText' => 'Add Motherboard'])
	{!! Form::close() !!}

	@include('errors.list')

@stop




@section('footer')
@stop