@extends('app')



@section('content')
	<h3>Activate Membership</h3>

	<hr/>


	{!! Form::model($customer, ['method' => 'PATCH', 'action'=> ['CustomersController@gymaccess_update', $customer->id]]) !!}
		@include('customers.gaactivation_form',['submitButtonText' => 'Submit'])
	{!! Form::close() !!}

	@include('errors.list')

@stop




@section('footer')
@stop