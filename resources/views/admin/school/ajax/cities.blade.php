<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
    {!! Form::label('city', 'City') !!}
    {!! Form::select('city', $cities, null, ['class' => 'form-control select2', 'required' => 'required','placeholder' => 'Select ...']) !!}
    <small class="text-danger">{{ $errors->first('city') }}</small>
</div>