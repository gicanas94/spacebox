@extends('layouts.main')

@section('content')
    <section class="spaceboxes">
        @if (Auth::guest())
            <article class="info">
                <a class="spacebox-name" href="{{ route('register') }}"><h2>REGISTRATE</h2></a>
                <div class="spacebox-description"><p>¡Ya somos {{ $totalUsers }} usuario/s!</p></div>
            </article>
            <article class="info">
                <a class="spacebox-name" href="{{ route('login') }}"><h2>INICIA SESIÓN</h2></a>
            </article>
        @endif

        @if (Auth::check())
            @if (empty(auth()->user()->spacebox))
                <article class="info">
                    <a class="spacebox-name" href="{{ route('createspace') }}"><h2>CREA TU SPACEBOX</h2></a>
                </article>
            @else
                <article class="info">
                    <a class="spacebox-name" href="{{ route('space', [auth()->user()->spacebox->slug]) }}"><h2>MI SPACEBOX</h2></a>
                </article>
            @endif
        @endif

        @foreach ($spaceboxes as $spacebox)
            @if (Auth::id() == $spacebox->user_id)
                <article class="loggeduser-spacebox" style="background-color: {{ $spacebox->color }}">
                    <a class="spacebox-name" href="{{ route('space', [$spacebox->slug]) }}"><h2>#{{ $spacebox->name }}</h2></a>
                    <div class="spacebox-description"><p>{{ $spacebox->description }}</p></div>
                </article>
            @else
                <article style="background-color: {{ $spacebox->color }}">
                    <a class="spacebox-name" href="{{ route('space', [$spacebox->slug]) }}"><h2>#{{ $spacebox->name }}</h2></a>
                    <div class="spacebox-description"><p>{{ $spacebox->description }}</p></div>
                </article>
            @endif
        @endforeach

        <article class="info">
            <a class="spacebox-name" href="#"><h2>...</h2></a>
        </article>
    </section>
@endsection
