@extends('layouts.app')

@section('breadcrumb')
@yield('breadcrumb')
@stop

@section('content')

@inject('categories','App\Models\BlogCategory')
@inject('posts','App\Models\BlogPost')

<div class="row">
    
    @yield('main')

    <div class="sidebar col-sm-4 col-md-3">
        <div class="travelo-box">
            <h5 class="box-title">Search Stories</h5>
            <div class="with-icon full-width">
                {!! Form::open(['method' => 'GET', 'route' => 'site.blog.search', 'class' => 'form-horizontal']) !!}
                
                    {!! Form::text('s', null, ['class' => 'input-text full-width','placeholder' => 'Search Keywords']) !!}
                    
                    <button class="icon green-bg white-color"><i class="soap-icon-search"></i></button>
                
                {!! Form::close() !!}                
            </div>
        </div>
        <div class="travelo-box">
            <h5 class="box-title">About Travelo</h5>
            <p>Phasellus vehicula justo eget  sollicitudin eu tincidu ncurabitur ele sollicitu tincidu nulla curabitur magna ined and posuere lorem sollicitudin eu tin.</p>
        </div>
        <div class="tab-container box">
            <ul class="tabs full-width">
                <li class="active"><a data-toggle="tab" href="#recent-posts">Recent</a></li>
                <li><a data-toggle="tab" href="#new-posts">New</a></li>
            </ul>
            <div class="tab-content">
                <div id="recent-posts" class="tab-pane fade in active">
                    <div class="image-box style14">
                    @foreach($posts->latest()->take(5)->get() as $post)
                        <article class="box">
                            <figure>
                                <a href="{{ route('site.blog.post.show',[$post->id,$post->slug]) }}" title="">
                                    <div class="cover" style="background-image: url('{{ $post->cover }}'); width: 60px;height: 60px;background-size: cover;background-position: center center";></div>
                                </a>
                            </figure>
                            <div class="details">
                                <h5 class="box-title">
                                    <a href="{{ route('site.blog.post.show',[$post->id,$post->slug]) }}">{{ str_limit($post->title, $limit = 30, $end = '...') }}</a>
                                </h5>
                                <label class="price-wrapper">{{ $post->category->name }}</label>
                            </div>
                        </article>
                    @endforeach
                    </div>
                </div>
                <div id="new-posts" class="tab-pane fade">
                    
                </div>
            </div>
        </div>

        <div class="travelo-box filters-container">
            <h4 class="box-title">All Categories</h4>
            <ul class="triangle box hover blog-categories-filter">
                <li><a href="{{ route('site.blog.index') }}">All<small class="badge blue-bg">{{ $posts->count() }}</small></a></li>
                @foreach($categories->all() as $category)
                <li>
                    <a href="{{ route('site.blog.category.show',$category->slug) }}">
                        {{ $category->name }} <small class="badge blue-bg">{{ $category->posts->count() }}</small>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        @include('app.modules.need-a-help')

    </div>
</div>
@stop

