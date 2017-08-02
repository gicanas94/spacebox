@extends('layouts.main')

@section('content')
    @if (isset($spaceboxIsBanned) && Auth::id() === $spacebox->user_id)
        <div class="banned-content">
            <h1>{{ trans('messages.space-banned-h2') }}</h1>
            <br>
            <h2>{{ trans('messages.space-banned-reason')}}<i>{{ $spaceboxIsBanned->reason }}</i></h2>
            <hr>
            <p>{{ trans('messages.space-banned-explanation') }}</p>
        </div>
    @endif
    <div class="content">
        <h1>{{ $title }}</h1>
        <hr>
        <img class="space-user-img" src="{{ asset($image->src) }}" alt="{{ trans('messages.spacebox-image-alt') }}">
        <br>
        <hr>
        <h2 style="margin: 0">{{ $spacebox->description }}</h2>
        <hr>
        @if ($canPublishOrDeletePost)
            <br>
            <div class="space-new-post-cont">
                <form action="{{ route('space.storePost') }}" method="post">
                    {!! csrf_field() !!}
                    <div>
                        <label>{{ trans('messages.space-form-title') }}</label>
                        <input class="{{ $errors->has('title') ? 'form-error-content' : '' }}" type="text" name="title" value="{{ old('title') }}">
                    </div>
                    <br>
                    <div>
                        <label>{{ trans('messages.space-form-content') }}</label>
                        <textarea class="{{ $errors->has('content') ? 'form-error-content' : '' }}" name="content" rows="5">{{ old('content') }}</textarea>
                    </div>
                    <br>

                    @if ($errors->any())
                        <div class="error-content">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>- {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div style="text-align: right">
                        <button type="submit">{{ trans('messages.space-form-submit') }}</button>
                    </div>
                </form>

                @if(session()->has('success'))
                    <div style="text-align: center" class="succeed-content">{{ session()->get('success') }}</div>
                @endif
            </div>
            <hr>
        @endif

        @if (count($posts) === 0)
            <div class="warn-content">{{ trans('messages.space-no-posts') }}</div>
        @else
            @foreach ($posts as $post)
                <div class="space-post-cont">
                    @if ($canPublishOrDeletePost)
                        <form action="{{ route('space.destroyPost', $post->id) }}" method="post">
                            {!! csrf_field() !!}
                            <button type="submit" class="space-delete">
                                <span class="ion-trash-b"></span>
                            </button>
                        </form>
                    @endif
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->content }}</p>
                    <div class="space-post-date">{{ $post->date }}</div>

                    @if (count($post->comments) > 0)
                        <div class="space-comment-cont">
                            @foreach ($post->comments as $comment)
                                <div class="space-comment">
                                    @if ($canDeleteComment)
                                        <form action="{{ route('space.destroyComment', $comment->id) }}" method="post">
                                            {!! csrf_field() !!}
                                            <button type="submit" class="space-delete">
                                                <span class="ion-trash-b"></span>
                                            </button>
                                        </form>
                                    @endif

                                    <div class="space-comment-user">
                                        <img class="space-comment-user-image" src="{{ asset($comment->user->image->src) }}" alt="">
                                        <div class="space-comment-user-username">
                                            {{ $comment->user->username }}
                                            @if ($comment->user->spacebox)
                                                -
                                                <a class="space-comment-user-spacebox"
                                                    href="{{ route('space', $comment->user->spacebox->slug) }}">
                                                    #{{ $comment->user->spacebox->name }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="space-comment-text">
                                        {{ $comment->content }}
                                    </div>
                                    <div class="space-comment-date">{{ $comment->date }}</div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if ($canComment)
                        <hr>
                        <div class="space-new-comment-cont">
                            <form action="{{ route('space.storeComment') }}" method="post">
                                {!! csrf_field() !!}
                                <label>{{ trans('messages.space-new-comment') }}</label>
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <textarea class="textareaComment" name="content" rows="3" required></textarea>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
@endsection
