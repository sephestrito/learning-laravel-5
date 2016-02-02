@extends('app')



@section('content')
	<h3>Activate Membership</h3>

	<hr/>


	{!! Form::model($customer, ['method' => 'PATCH', 'action'=> ['CustomersController@membership_update', $customer->id]]) !!}
		@include('customers.activation_form',['submitButtonText' => 'Submit'])
	{!! Form::close() !!}

	@include('errors.list')

@stop




@section('footer')
@stop