@extends('adminlte::page')

@section('title', 'Gallery')

@section('content_header')
    <h1>Blog</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>Blog</li>
        <li><a href="{{ route('admin.blog.post.index') }}">Post</a></li>
        <li><a href="{{ route('admin.blog.post.show',$post->id) }}">{{ $post->title }}</a></li>
        <li>Gallery</li>
    </ol>
@stop

@section('content')
<div class="row">
    
    <div class="col-md-12">
         @include('flash::message')
    </div>
   
    <div class="col-md-12">
        <div class="box box-info pad">
            <div class="box-header with-border">
                <i class="fa fa-list"></i>
                <h4 class="box-title">List Gallery</h4>
                <div class="box-tools pull-right">
                    <a href="{{ route('admin.blog.post.index') }}" class="btn btn-default btn-sm">
                        <i class="fa fa-arrow-left"></i> <b>BACK</b>
                    </a>
                    <a href="{{ route('admin.blog.post.gallery.edit',$post->id) }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> <b>REGISTER NEW IMAGES</b>
                    </a>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    @forelse($post->gallery as $image)
                    <div class="col-md-3">
                      <div class="box box-primary">

                        <!-- /.box-header -->
                        <div class="box-body">
                          <img src="{{ $image->photo }}" class="img-responsive" alt="">

                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.blog.post.gallery.destroy', $image->id]]) !!}
                                <button type="submit" class="btn btn-block btn-danger" onclick='if (confirm("By confirming the registration will be deleted!")) { document.submit(); } event.returnValue = false; return false;' data-type='confirm'>
                                    <i class="fa fa-trash"></i>
                                </button>
                            {!! Form::close() !!}
                          
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>
                    @empty
                    <div class="col-md-12">
                       No records found.
                    </div>
                    @endforelse
                </div>
                      
            </div>

        </div>
        <!-- /.box -->
    </div>

</div>

@stop