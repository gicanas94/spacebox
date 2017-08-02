@extends('layouts.main')

@section('content')
    @isset($userIsBanned)
        <div class="banned-content">
            <h1>{{ trans('messages.index-banned-h2') }}</h1>
            <br>
            <h2>{{ trans('messages.index-banned-reason')}}<i>{{ $userIsBanned->reason }}</i></h2>
            <hr>
            <p>{{ trans('messages.index-banned-explanation') }}</p>
        </div>
    @endisset
    <section class="spaceboxes">
        @if (Auth::guest())
            <article class="info">
                <a class="spacebox-name" href="{{ route('register') }}"><h2>{{ trans('messages.index-register') }}</h2></a>
                <div class="spacebox-description"><p>{{ trans('messages.index-register-desc-1') . $totalUsers . trans('messages.index-register-desc-2') }}</p></div>
            </article>
            <article class="info">
                <a class="spacebox-name" href="{{ route('login') }}"><h2>{{ trans('messages.index-login') }}</h2></a>
            </article>
        @endif

        @if (Auth::check())
            @if (Auth::user()->isAdmin())
                <article class="info">
                    <a class="spacebox-name" href="{{ route('admin') }}"><h2>{{ trans('messages.index-admin') }}</h2></a>
                </article>
            @endif
            @if (empty(Auth::user()->spacebox) && empty($userIsBanned))
                <article class="info">
                    <a class="spacebox-name" href="{{ route('createspace.index') }}"><h2>{{ trans('messages.index-create-spacebox') }}</h2></a>
                </article>
            @else
                <article class="info">
                    <a class="spacebox-name" href="{{ route('space', Auth::user()->spacebox->slug) }}"><h2>{{ trans('messages.index-go-my-spacebox') }}</h2></a>
                </article>
            @endif
        @endif

        @foreach ($spaceboxes as $spacebox)
            @if (Auth::id() === $spacebox->user_id)
                <article class="loggeduser-spacebox" style="background-color: {{ $spacebox->color }}">
                    <a class="spacebox-name" href="{{ route('space', $spacebox->slug) }}"><h2>#{{ $spacebox->name }}</h2></a>
                    <div class="spacebox-description"><p>{{ $spacebox->description }}</p></div>
                </article>
            @else
                <article style="background-color: {{ $spacebox->color }}">
                    <a class="spacebox-name" href="{{ route('space', $spacebox->slug) }}"><h2>#{{ $spacebox->name }}</h2></a>
                    <div class="spacebox-description"><p>{{ $spacebox->description }}</p></div>
                </article>
            @endif
        @endforeach

        <article class="info">
            <a class="spacebox-name" href="#"><h2>...</h2></a>
        </article>
    </section>
@endsection
