@extends('app')



@section('content')
	<h3>Membership Activation</h3>
	<table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Contact Number</th>
        <th>Membership</th>
      </tr>
    </thead>
    <tbody>
	@foreach($customers as $customer)
		<tr>
			<td>{{ $customer->name }}</td>
			<td>{{ $customer->contact_number }}</td>
			<td> <a href="{{ action('CustomersController@membership', $customer->id) }}">Activate</a> </td>
		</tr>
	@endforeach
	</tbody>
	</table>
@stop


@section('footer')
@stop