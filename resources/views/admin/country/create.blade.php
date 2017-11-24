<div class="col-md-4">
  <div class="box box-success pad">
      <div class="box-header with-border">
          <i class="fa fa-list"></i>
          <h4 class="box-title">Create Country</h4>
      </div>

      <div class="box-body">
          {!! Form::open(['method' => 'POST', 'route' => 'admin.country.store', 'files' => 'true', 'id' => 'create-country']) !!}
          
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  {!! Form::label('name', 'Name Country') !!}
                  {!! Form::text('name', null, ['class' => 'form-control', ]) !!}
                  <small class="text-danger">{{ $errors->first('name') }}</small>
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