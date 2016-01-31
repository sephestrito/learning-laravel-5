@extends('app')



@section('content')
	<h3>Member Rates</h3>
	<table class="table table-bordered">
    <thead>
      <tr>
        <th>Rates</th>
        <th>Prices (PHP)</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
	@foreach($memberRates as $rate)
		<tr>
			<td>{{ $rate->rate }}</td>
			<td style="text-align:right">{{ number_format($rate->price, 2) }}</td>
			<td> <a href="{{ url('/rates', $rate->id) }}">Edit</a> </td>
		</tr>
	@endforeach
	</tbody>
	</table>

	<h3>Non Member Rates</h3>
	<table class="table table-bordered">
    <thead>
      <tr>
        <th>Rates</th>
        <th>Prices (PHP)</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
	@foreach($nonMemberRates as $rate)
		<tr>
			<td>{{ $rate->rate }}</td>
			<td style="text-align:right">{{ number_format($rate->price, 2) }}</td>
			<td> <a href="{{ url('/rates', $rate->id) }}">Edit</a> </td>
		</tr>
	@endforeach
	</tbody>
	</table>

@stop


@section('footer')
@stop