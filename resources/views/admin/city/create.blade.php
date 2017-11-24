<div class="col-md-4">
  <div class="box box-success pad">
      <div class="box-header with-border">
          <i class="fa fa-list"></i>
          <h4 class="box-title">Create City</h4>
      </div>

      <div class="box-body">
          {!! Form::open(['method' => 'POST', 'route' => 'admin.city.store', 'files' => 'true']) !!}
          
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  {!! Form::label('name', 'Name City') !!}
                  {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('name') }}</small>
              </div>
              
              @inject('countries', 'App\\Models\\Country')
              <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                  {!! Form::label('country', 'Country') !!}
                  {!! Form::select('country', $countries->pluck('name','id'), null, ['id' => 'country', 'class' => 'form-control select2', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('country') }}</small>
              </div>

              <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                  {!! Form::label('image', 'Cover City') !!}
                  {!! Form::file('image', ['required' => 'required','class' => 'form-control']) !!}
                  <p class="help-block">Help block text</p>
                  <small class="text-danger">{{ $errors->first('image') }}</small>
              </div>
          
              <div class="btn-group pull-right">
                  <a href="{{ route('admin.city.index') }}" class="btn btn-default"> Cancel</a>
                  {!! Form::submit("Publish", ['class' => 'btn btn-success']) !!}
              </div>
          
          {!! Form::close() !!}
      </div>
  </div>
</div>