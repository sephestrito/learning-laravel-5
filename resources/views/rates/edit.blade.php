@extends('app')

@section('content')
	<h3>Edit Rates</h3>

	{!! Form::model($rate, ['method' => 'PATCH', 'action'=> ['RatesController@update', $rate->id]]) !!}
		@include('rates.form',['submitButtonText' => 'Submit'])
	{!! Form::close() !!}

	@include('errors.list')

@stop