@extends('layouts.main')

@section('content')
    <section class="spaceboxes">
        @if (count($spaceboxes) === 0)
            <article class="info">
                <a class="spacebox-name" href="{{ route('index') }}"><h2>{{ trans('messages.no-results') }}</h2></a>
            </article>
        @else
            <article class="info">
                <a class="spacebox-name" href="#"><h2>{{ count($spaceboxes) . trans('messages.x-results') }}</h2></a>
            </article>
            @foreach ($spaceboxes as $spacebox)
                <article style="background-color: {{ $spacebox->color }}">
                    <a class="spacebox-name" href="{{ route('space', $spacebox->slug) }}"><h2>#{{ $spacebox->name }}</h2></a>
                    <div class="spacebox-description"><p>{{ $spacebox->description }}</p></div>
                </article>
            @endforeach
        @endif
    </section>
@endsection
