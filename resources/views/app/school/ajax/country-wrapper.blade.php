<div class="form-group">
	    {!! Form::label('country', 'Country') !!}
	    <div class="selector full-width">
	    	{!! Form::select('country', $country, null, ['id' => 'country', 'class' => 'form-control', 'placeholder' => 'Select country ...']) !!}
	    </div>
</div>