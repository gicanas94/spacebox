@extends('layouts.main')

@section('content')
    <section class="spaceboxes">
        {{-- Recuadros únicamente visibles para usuarios no registrados o que no iniciaron sesión. --}}
        @if (! Auth::check())
            <article class="info">
                <a class="spacebox-name" href="{{ route('register') }}"><h2>REGISTRATE</h2></a>
                <div class="spacebox-description"><p>¡Ya somos {{ $totalUsers }} usuario/s!</p></div>
            </article>
            <article class="info">
                <a class="spacebox-name" href="{{ route('login') }}"><h2>INICIA SESIÓN</h2></a>
            </article>
        @endif

        {{-- Recuadro únicamente visible para usuarios que no tengan un Spacebox creado.
        # --}}

        {{-- Spacebox del usuario, en caso de tener uno.
        # --}}

        {{-- Spaceboxes de usuarios. --}}
        @foreach ($spaceboxes as $spacebox)
            @if (Auth::id() == $spacebox->user_id)
                <article class="loggeduser-spacebox" style="background-color: {{ $spacebox->color }}">
                    <a class="spacebox-name" href="{{ route('space', [$spacebox->slug]) }}"><h2>#{{ $spacebox->name }}</h2></a>
                    <div class="spacebox-description"><p>{{ $spacebox->description }}</p></div>
                </article>
            @endif
            <article style="background-color: {{ $spacebox->color }}">
                <a class="spacebox-name" href="{{ route('space', [$spacebox->slug]) }}"><h2>#{{ $spacebox->name }}</h2></a>
                <div class="spacebox-description"><p>{{ $spacebox->description }}</p></div>
            </article>
        @endforeach

        {{-- Cargar más Spaceboxes en pantalla. --}}
        <article class="info">
            <a class="spacebox-name" href="#"><h2>...</h2></a>
        </article>
    </section>
@endsection
