@extends('app.blog.post.blog')

@section('breadcrumb')
<div class="page-title-container style4">
    <div class="container">
        <div class="page-title pull-left">
            <h2 class="entry-title">Blog</h2>
        </div>
        <ul class="breadcrumbs pull-right">
            <li><a href="{{ route('site.home.index') }}">HOME</a></li>
            <li><a href="{{ route('site.blog.index') }}">Blog</a></li>
            <li class="active">{{ $post->title }}</li>
        </ul>
    </div>
</div>
@stop

@section('main')
<div id="main" class="single col-sm-8 col-md-9">
    <div class="post">
        <figure class="image-container">
            <img src="{{ $post->cover }}" alt="{{ $post->title }}"/>
        </figure>
        <div class="details">
            <h1 class="entry-title">{{ $post->title }}</h1>
            <div class="post-content">
                {!! $post->body !!}
            </div>
            
            
            @if($post->gallery->count() > 0)
                <div id="gallery_post" class="flexslider photo-gallery style1" data-animation="slide" data-sync="#carousel_post">
                    <ul class="slides">
                        <!-- slideshow -->

                        @foreach($post->gallery as $gallery)
                            <li><img src="{{ $gallery->photo }}" class="img-responsive"></li>
                        @endforeach
                        
                    </ul>
                </div>
                <div id="carousel_post" class="flexslider image-carousel style1" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#gallery_post">
                    <ul class="slides">
                        <!-- thumbnail navigation -->
                        @foreach($post->gallery as $gallery)
                            <li><img src="{{ $gallery->photo }}" class="img-responsive"></li>
                        @endforeach
                    </ul>
                </div>
            @endif

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

                    @if($post->tags->count() > 0)
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
                    @endif

                </div>
            </div>
        </div>


        <div class="single-navigation block">
            <div class="row">
                <div class="col-xs-6">

                    @if($prev)
                        <a rel="prev" href="{{ route('site.blog.post.show',[$prev->id,$prev->slug]) }}" class="button btn-large prev full-width">
                            <i class="soap-icon-longarrow-left"></i>
                            <span>Previous Post</span>
                        </a>
                    @endif

                </div>
                <div class="col-xs-6">

                    @if($next)
                        <a rel="next" href="{{ route('site.blog.post.show',[$next->id,$next->slug]) }}" class="button btn-large next full-width">
                            <span>Next Post</span>
                            <i class="soap-icon-longarrow-right"></i>
                        </a>
                    @endif

                </div>
            </div>
        </div>

        {{-- <div class="about-author block">
            <h2>About Author</h2>
            <div class="about-author-container">
                <div class="about-author-content">
                    <div class="avatar">
                        <img src="http://placehold.it/270x270" width="96" height="96" alt="">
                    </div>
                    <div class="description">
                        <h4><a href="#">Jessica Brown</a></h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stand dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                    </div>
                </div>
                <div class="about-author-meta clearfix">
                    <ul class="social-icons">
                        <li><a href="#"><i class="soap-icon-twitter"></i></a></li>
                        <li><a href="#"><i class="soap-icon-googleplus"></i></a></li>
                        <li><a href="#"><i class="soap-icon-facebook"></i></a></li>
                        <li><a href="#"><i class="soap-icon-linkedin"></i></a></li>
                    </ul>
                    <a href="#" class="wrote-posts-count"><i class="soap-icon-slider"></i><span><b>30</b> Posts</span></a>
                </div>
            </div>
        </div> --}}

        {{-- <h2>You Might Also Like This</h2>
        <div class="travelo-box">
            <div class="suggestions image-carousel style2" data-animation="slide" data-item-width="150" data-item-margin="22">
                <ul class="slides">
                    <li>
                        <a href="#" class="hover-effect">
                            <img src="http://placehold.it/170x170" alt="" class="middle-item" />
                        </a>
                        <h5 class="caption">Adventure</h5>
                    </li>
                    <li>
                        <a href="#" class="hover-effect">
                            <img src="http://placehold.it/170x170" alt="" class="middle-item" />
                        </a>
                        <h5 class="caption">Beaches &amp; Sun</h5>
                    </li>
                    <li>
                        <a href="#" class="hover-effect">
                            <img src="http://placehold.it/170x170" alt="" class="middle-item" />
                        </a>
                        <h5 class="caption">Casinos</h5>
                    </li>
                </ul>
            </div>
        </div> --}}
        
        {{-- Post Comments --}}
        @include('app.blog.post.comments')

        <div class="post-comment block">
            <h2 class="reply-title">Post a Comment</h2>
            <div class="travelo-box">

                {!! Form::open(['method' => 'POST', 'route' => ['site.blog.comment.add', $post->id], 'class' => 'comment-form']) !!}
                
                    <div class="form-group row">
                        <div class="col-xs-6">
                            {!! Form::label('name', 'Your Name') !!}
                            {!! Form::text('name', null, ['class' => 'input-text full-width','required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>

                        <div class="col-xs-6">
                            {!! Form::label('email', 'Your Email') !!}
                            {!! Form::email('email', null, ['class' => 'input-text full-width', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                        {!! Form::label('text', 'Your Comment') !!}
                        {!! Form::textarea('text', null, ['class' => 'input-text full-width','required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('text') }}</small>
                    </div>

                    <button type="submit" class="btn-large full-width">SEND COMMENT</button>
                
                {!! Form::close() !!}

            </div>
        </div>

    </div>
</div>
@stop

