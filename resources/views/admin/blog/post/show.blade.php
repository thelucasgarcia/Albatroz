@extends('adminlte::page')

@section('title', 'Show')

@section('content_header')
    <h1>Post</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>Blog</li>
        <li><a href="{{ route('admin.blog.post.index') }}">Post</a></li>
        <li>{{ $post->title }}</li>
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
              <i class="fa fa-eye"></i>

              <h3 class="box-title">Post Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class="row">
                    <div class="col-md-8">
                        <dl class="dl-horizontal">
                            <dt>Title</dt>
                            <dd>{{ $post->title }}</dd>

                            <dt>Author</dt>
                            <dd>{{ $post->user->name }}</dd>

                            <dt>Category</dt>
                            <dd>{{ $post->category->name }}</dd>

                            <dt>Tags</dt>

                            @forelse($post->tags as $tag)
                                @if ($loop->first)
                                    <dd><span class="label label-info">{{ $tag->name }}</span>
                                @elseif ($loop->last)
                                    <span class="label label-info">{{ $tag->name }}</span></dd>
                                @else
                                    <span class="label label-info">{{ $tag->name }}</span>
                                @endif
                            @empty
                            <dd> - </dd>
                            @endforelse
    
                            <dt>Created in</dt>
                            <dd>{{ $post->created_at }}</dd>

                            <dt>Updated in</dt>
                            <dd>{{ $post->updated_at }}</dd>

                            <dt>Content</dt>
                            <dd>{!! $post->body !!}</dd>
                        </dl>
                    </div>

                    <div class="col-md-4">
                        <dl>
                            <dt>Current Cover</dt>
                            <dd><img src="{{ $post->cover }}" alt="" class="img-responsive"></dd>
                        </dl>
                    </div>
                </div>
              
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.blog.post.destroy', $post->id]]) !!}
                <div class="btn-group-sm">
                    <a href="{{ route('admin.blog.post.index') }}" class="btn btn-info">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                    <a class="btn btn-primary" href="{{ route('admin.blog.post.gallery.show', $post->id) }}">
                        <i class="fa fa-picture-o"></i> Gallery
                    </a>
                    <a class="btn btn-warning" href="{{ route('admin.blog.post.edit', $post->id) }}">
                        <i class="fa fa-pencil"></i> Edit
                    </a>
                    <button type="submit" class="btn btn-danger" onclick='if (confirm("By confirming the registration will be deleted!")) { document.submit(); } event.returnValue = false; return false;' data-type='confirm'>
                        <i class="fa fa-times"></i> Delete
                    </button>
                </div>

                {!! Form::close() !!}
            </div>
          </div>
    </div>

</div>

@stop