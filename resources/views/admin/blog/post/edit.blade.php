@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1>Blog</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>Blog</li>
        <li><a href="{{ route('admin.blog.post.index') }}">Post</a></li>
        <li>{{ $post->title }}</li>
        <li>Edit</li>
    </ol>
@stop

@section('content')
<div class="row">
    
    <div class="col-md-12">
         @include('flash::message')
    </div>
    
    {!! Form::model($post, ['route' => ['admin.blog.post.update', $post->id], 'method' => 'PUT', 'files' => 'true']) !!}

    <div class="col-md-8">
        <div class="box box-warning pad">
            <div class="box-header with-border">
                <i class="fa fa-info"></i>
                <h4 class="box-title">Info Post</h4>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>

            <div class="box-body">
                
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>

                <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                    {!! Form::label('body', 'Body') !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control','id' => 'ckeditor', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('body') }}</small>
                </div>
                    
            </div>

        </div>
        <!-- /.box -->

        <div class="box box-warning pad">
            <div class="box-header with-border">
                <i class="fa fa-info"></i>
                <h4 class="box-title">Video</h4>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>

            <div class="box-body">
                
                <div class="form-group{{ $errors->has('video') ? ' has-error' : '' }}">
                    {!! Form::label('video', 'Youtube Video') !!}
                    {!! Form::text('video', null, ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('video') }}</small>
                </div>
                    
            </div>

        </div>
        <!-- /.box -->
        
    </div>

    <div class="col-md-4">
        <div class="box box-warning pad">
            <div class="box-header with-border">
                <i class="fa fa-plus"></i>
                <h4 class="box-title">Publish</h4>
            </div>

            <div class="box-footer">
                <div class="btn-group pull-right">
                    <a href="{{ route('admin.blog.post.index') }}" class="btn btn-default">Cancel</a>
                    {!! Form::submit('Update', ['class' => 'btn btn-warning']) !!}
                </div>
            </div>

        </div>
        <!-- /.box -->

        <div class="box box-warning pad">
            <div class="box-header with-border">
                <i class="fa fa-globe"></i>
                <h4 class="box-title">Categories</h4>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>

            <div class="box-body">
                
                <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                    {!! Form::label('category', 'Categories') !!}
                    {!! Form::select('category', $categories, $post->category->id, ['id' => 'category', 'class' => 'form-control select2', 'required' => 'required','placeholder' => 'Select a category']) !!}
                    <small class="text-danger">{{ $errors->first('category') }}</small>
                </div>
                <button type="button" class="btn-link" onclick="addCategory()">+ Add new Category</button>

                <div id="block-newcategory"></div>
            </div>

        </div>
        <!-- /.box -->

        <div class="box box-warning pad">
            <div class="box-header with-border">
                <i class="fa fa-globe"></i>
                <h4 class="box-title">Tags</h4>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>

            <div class="box-body">
                
                <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                    {!! Form::label('tags', 'Tags') !!}
                    {!! Form::select('tags[]', $tags, null, ['id' => 'tags', 'class' => 'form-control select2', 'required' => 'required','multiple']) !!}
                    <small class="text-danger">{{ $errors->first('tags') }}</small>
                </div>
                <button type="button" class="btn-link" onclick="addTag()">+ Add new Tag</button>

                <div id="block-newtag"></div>

            </div>

        </div>
        <!-- /.box -->

        <div class="box box-warning pad">
            <div class="box-header with-border">
                <i class="fa fa-photo"></i>
                <h4 class="box-title">School Image</h4>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="box-body">

                <div class="form-group">
                    {{ Form::label(null,'Cover Current') }}
                    <img src="{{ asset($post->cover) }}" class="img-responsive" alt="">
                </div>
                
                <div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
                    {!! Form::label('cover', 'Image Cover') !!}
                    {!! Form::file('cover', ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('cover') }}</small>
                </div>
                    
            </div>

        </div>
        <!-- /.box -->
        
    </div>


    {!! Form::close() !!}
</div>
                
@stop

@section('js')
<script>

    function addCategory() {

        $.get( "{{ route('admin.blog.ajax.getFormNewCategory') }}", function( data ) {
            $("#block-newcategory").empty().html(data);
        });

    }

    function addTag() {

        $.get( "{{ route('admin.blog.ajax.getFormNewTag') }}", function( data ) {
            $("#block-newtag").empty().html(data);
        });
    }

</script>
@stop