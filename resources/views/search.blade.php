@extends('layouts.main')

@section('content')
    {{-- Resultados de la búsqueda. --}}
    <section class="spaceboxes">
        @if (count($spaceboxes) > 0)
            <article class="info">
                <a class="spacebox-name" href="#"><h2>{{ count($spaceboxes) }} RESULTADOS</h2></a>
            </article>
            @foreach ($spaceboxes as $spacebox)
                <article style="background-color: {{ $spacebox->color }}">
                    <a class="spacebox-name" href="space.php?id={{ $spacebox->user_id }}"><h2>#{{ $spacebox->name }}</h2></a>
                    <div class="spacebox-description"><p>{{ $spacebox->description }}</p></div>
                </article>
            @endforeach
        @else
            <article class="info">
                <a class="spacebox-name" href="{{ route('index') }}"><h2>SIN RESULTADOS.</h2></a>
            </article>
        @endif
    </section>
@endsection
