<table class="table table-borderless">
    <tbody>
	<tr>
		<td style="width: 15%">Customer No. :</td>
		<td style="width: 30%">{{ $customer->id }}</td>
		<td style="width: 15%">Activation Date :</td>
		<td style="width: 30%">{{ $activationDate }}</td>
	</tr>
	<tr>
		<td>Name :</td>
		<td>{{ $customer->name }}</td>
		<td>Expiration Date :</td>
		<td style="width: 30%">{{ $expirationDate }}</td>
	</tr>

	<tr>
		<td></td>
		<td></td>
		<td style="vertical-align: middle;">Payment :</td>
		<td><span class="price">{{ $price }}</span></td>
	</td>

	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}</td>
	</td>
	</tbody>
</table>