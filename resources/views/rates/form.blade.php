

		<div class="form-group">
			{{ $rate->rate }} for 
			
			@if ($rate->member_ind === 1)
			    Members
			@elseif ($rate->member_ind ===0)
				Non Members
			@endif
			
		</div>

		<div class="form-group">
			{!! Form::label('price','Price (PHP):') !!}
			{!! Form::text('price', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
		</div>

