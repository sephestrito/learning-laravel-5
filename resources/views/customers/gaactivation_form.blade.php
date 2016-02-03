<table class="table table-borderless">
    <tbody>
	<tr>
		<td style="width: 15%">Customer No. :</td>
		<td style="width: 30%">{{ $customer->id }}</td>
		<td style="width: 15%">Gym Access :</td>
		<td style="width: 30%">{!! Form::select('gymaccess[]', $rates, null, ['id'=>'gymaccess','class' => 'form-control','id'=> 'rates']) !!}</td>
	</tr>
	<tr>
		<td>Name :</td>
		<td>{{ $customer->name }}</td>
		<td>Activation Date :</td>
		<td>{{ $activationDate }}</td>
	</tr>

	<tr>
		<td>Member :</td>
		<td>{{ $customer->membership_ind }}</td>
		<td>Expiration Date :</td>
		<td><span id="expDate"></span></td>
	</tr>

	<tr>
		<td></td>
		<td></td>
		<td>Payment :</td>
		<td><span class="price" id="price"> </td>
	</td>

	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}</td>
	</td>
	</tbody>
</table>

@section('footer')
	<script>
		$('#rates').on('change',function(e){
			console.log(e);
			var rate_id = e.target.value;

			//ajax
			$.get('/ajax-rateInfo?rate_id=' + rate_id, function(data){
				
				/*$('#price').text(data[0].price);


				$('#test').text(data[0].expirationDate);
*/	
				$('#price').text(data.price);
				$('#expDate').text(data.expirationDate);
				/*$.each(data, function(index,rateObj){
					$('#price').text(rateObj.price);
					$('#test').text(rateObj.expirationDate);
				});*/
			});
		});

	</script>

@stop
