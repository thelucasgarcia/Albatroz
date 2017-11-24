<div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
    {!! Form::label('country', 'Country') !!}
    {!! Form::select('country', $countries, null, ['id' => 'country', 'class' => 'form-control select2', 'required' => 'required', 'placeholder' => 'Select...']) !!}
    <small class="text-danger">{{ $errors->first('country') }}</small>
</div>