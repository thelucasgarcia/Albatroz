@extends('app.blog.post.blog')

@section('breadcrumb')
<div class="page-title-container style4">
    <div class="container">
        <div class="page-title pull-left">
            <h2 class="entry-title">Blog</h2>
        </div>
        <ul class="breadcrumbs pull-right">
            <li><a href="{{ route('site.home.index') }}">HOME</a></li>
            <li class="active"><a href="{{ route('site.blog.index') }}">Blog</a></li>
        </ul>
    </div>
</div>
@stop

@section('main')
<div id="main" class="col-sm-8 col-md-9">
        <div class="page">
            <div class="post-content">
                <div class="blog-infinite">


                    @forelse($posts as $post)
                    <div class="post">
                        <div class="post-content-wrapper">
                            <figure class="image-container">
                                <a href="{{ route('site.blog.post.show',[$post->id,$post->slug]) }}" class="hover-effect"><img src="{{ $post->cover }}" alt="" /></a>
                            </figure>
                            <div class="details">
                                <h2 class="entry-title"><a href="{{ route('site.blog.post.show',[$post->id,$post->slug]) }}">{{ $post->title }}</a></h2>
                                <div class="excerpt-container">
                                    <p>{!! str_limit($post->body, $limit = 600, $end = '...') !!}</p>
                                </div>
                                <div class="post-meta">
                                    <div class="entry-date">
                                        <label class="date">{{ $post->created_at->day }}</label>
                                        <label class="month">{{ $post->created_at->format('M') }}</label>
                                    </div>
                                    <div class="entry-author fn">
                                        <i class="icon soap-icon-user"></i> Posted By:
                                        <a href="#" class="author">{{ $post->user->name }}</a>
                                    </div>
                                    <div class="entry-action">
                                        <a href="{{ route('site.blog.post.show',[$post->id,$post->slug.'#comments']) }}" class="button entry-comment btn-small"><i class="soap-icon-comment"></i><span>{{ $post->comments->count() }} Comments</span></a>
                                        {{-- <a href="#" class="button btn-small"><i class="soap-icon-wishlist"></i><span>22 Likes</span></a> --}}
                                        <span class="entry-tags"><i class="soap-icon-features"></i>
                                            <span>
                                                @foreach($post->tags as $tag)
                                                 @if ($loop->first)
                                                   <a href="{{ route('site.blog.tag.show',$tag->slug) }}">{{ $tag->slug }}</a>,
                                                @elseif ($loop->last)
                                                    <a href="{{ route('site.blog.tag.show',$tag->slug) }}">{{ $tag->slug }}</a>.
                                                @else
                                                    <a href="{{ route('site.blog.tag.show',$tag->slug) }}">{{ $tag->slug }}</a>
                                                @endif
                                                @endforeach
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($loop->last)
                    {{-- <a href="#" class="button btn-large full-width">LOAD MORE POSTS</a> --}}
                    @endif

                    @empty
                    <div class="post">
                        No Found Records.
                    </div>
                    
                    @endforelse

                </div>
                
            </div>
        </div>
    </div>
@stop

