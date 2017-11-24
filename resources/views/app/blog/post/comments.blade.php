<div class="comments-container block" id="comments">
    <h2>{{ $post->comments->count() }} Comments</h2>
    <ul class="comment-list travelo-box">
        @foreach($post->comments as $comment)
        <li class="comment depth-1">
            <div class="the-comment">
                <div class="avatar">
                    <img src="{{ asset('app/images/icon/avatar-comments/avatar-default.png') }}" width="72" height="72" alt="">
                </div>
                <div class="comment-box">
                    <div class="comment-author">
                        {{-- <a href="#" class="button btn-mini pull-right">REPLY</a> --}}
                        <h4 class="box-title"><a href="#">{{ $comment->name }}</a>
                            <small>{{ $comment->created_at->format('M, d, Y') }}</small>
                        </h4>
                    </div>
                    <div class="comment-text">
                        <p>{{ $comment->text }}</p>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>