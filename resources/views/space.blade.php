@extends('layouts.main')

@section('content')
    <div class="content">
        <h1>{{ $title }}</h1>
        <hr>
        <img class="space-user-img" src="" alt="">
        <br>
        <hr>
        <h2 style="margin: 0;">{{ $spacebox->description }}</h2>
        <hr>
        @if (count($posts) == 0)
            <div class="warn-content">{{ trans('messages.space-noposts') }}</div>
        @else
            @foreach ($posts as $post)
                <div class="space-post-cont">
                    @if (Auth::id() == $spacebox->user_id)
                        <a data-method="DELETE" data-token="{{ csrf_token() }}" class="space-delete-post" href="{{ route('space.destroy', $post->id) }}">
                            <span class="ion-trash-b"></span>
                        </a>
                        {{-- {{ Form::open(['route' => 'space.destroy', 'method' => 'delete']) }}
                        {{ Form::submit('Eliminar', ['class' => 'space-delete-post']) }}
                        {{ Form::close() }} --}}
                    @endif
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->content }}</p>
                    <div class="space-postdate">{{ $post->date }}</div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
