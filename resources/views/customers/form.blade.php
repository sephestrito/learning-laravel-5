

		<div class="form-group">
			{!! Form::label('name','Name:') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
		    {!! Form::label('address', 'Address:') !!}
		    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('contact_number','Contact Number:') !!}
			{!! Form::text('contact_number', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('emergency_name','Name:') !!}
			{!! Form::text('emergency_name', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('emergency_contact_number','Contact Number:') !!}
			{!! Form::text('emergency_contact_number', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
		</div>

