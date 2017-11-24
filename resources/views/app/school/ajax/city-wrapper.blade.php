<div class="form-group">
    {!! Form::label('city', 'City') !!}
    <div class="selector full-width">
    	{!! Form::select('city', $city, null, ['id' => 'city', 'class' => 'form-control', 'placeholder' => 'Select city...']) !!}
    </div>
</div>