@extends('app')



@section('content')
	<h1>Add New Customer</h1>

	<hr/>

	{!! Form::model($article = new \App\Customer, ['url' => 'customers']) !!}
		@include('customers.form',['submitButtonText' => 'Add Customer'])
	{!! Form::close() !!}

	@include('errors.list')

@stop




@section('footer')
@stop