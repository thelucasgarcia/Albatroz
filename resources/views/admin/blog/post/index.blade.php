@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
    <h1>Blog</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>Blog</li>
        <li><a href="{{ route('admin.blog.post.index') }}">Post</a></li>
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
                <h4 class="box-title">List Posts</h4>
                <div class="box-tools pull-right">
                    <a href="{{ route('admin.blog.post.create') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> <b>REGISTER NEW</b>
                    </a>
                </div>
            </div>

            <div class="box-body">

                <table class="table table-responsive table-striped table-bordered" width="100%" id="datatable">
                    <thead>
                        <style>thead th {text-align: center}</style>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Created in</th>
                        <th>Actions</th>
                    </thead>

                    <tbody>
                        @inject('posts', 'App\Models\BlogPost')
                        @foreach($posts->all() as $post)
                            <tr>
                                <td scope="row">{{ $post->id }}</td>
                                <td>{{ str_limit($post->title, $limit = 40, $end = '...') }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->created_at }}</td>

                                <td class="text-center">
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.blog.post.destroy', $post->id]]) !!}
                                    <div class="btn-group-sm">
                                        <a class="btn btn-primary" href="{{ route('admin.blog.post.gallery.show', $post->id) }}">
                                            <i class="fa fa-picture-o"></i>
                                        </a>
                                        <a class="btn btn-info" href="{{ route('admin.blog.post.show', $post->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-warning" href="{{ route('admin.blog.post.edit', $post->id) }}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger" onclick='if (confirm("By confirming the registration will be deleted!")) { document.submit(); } event.returnValue = false; return false;' data-type='confirm'>
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>

                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                      
            </div>

        </div>
        <!-- /.box -->
    </div>

</div>

@stop