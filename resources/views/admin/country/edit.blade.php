<div class="col-md-4">
  <div class="box box-warning pad">
      <div class="box-header with-border">
          <i class="fa fa-list"></i>
          <h4 class="box-title">Edit Country</h4>
      </div>

      <div class="box-body">
          {!! Form::model($country, ['route' => ['admin.country.update', $country->id], 'method' => 'PUT', 'files' => 'true']) !!}

              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  {!! Form::label('name', 'Name Country') !!}
                  {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('name') }}</small>
              </div>

              <div class="form-group">
                  {{ Form::label(null,'Current Country Cover') }}
                <img src="{{ asset('storage/country/'.$country->slug.'/'.$country->image) }}" alt="">
              </div>

              <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                  {!! Form::label('image', 'Cover Country') !!}
                  {!! Form::file('image', ['class' => 'form-control']) !!}
                  <p class="help-block">Help block text</p>
                  <small class="text-danger">{{ $errors->first('image') }}</small>
              </div>

          
              <div class="btn-group pull-right">
                  <a href="{{ route('admin.country.index') }}" class="btn btn-default"> Cancel</a>
                  {!! Form::submit("Publish", ['class' => 'btn btn-success']) !!}
              </div>
          
          {!! Form::close() !!}
      </div>
  </div>
</div>