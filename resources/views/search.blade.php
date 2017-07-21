@extends('layouts.main')

@section('content')
    <section class="spaceboxes">
        @if (empty($spaceboxes))
            <article class="info">
                <a class="spacebox-name" href="{{ route('index') }}"><h2>{{ trans('messages.search-no-results') }}</h2></a>
            </article>
        @else
            <article class="info">
                <a class="spacebox-name" href="#"><h2>{{ count($spaceboxes) . trans('messages.search-x-results') }}</h2></a>
            </article>
            @foreach ($spaceboxes as $spacebox)
                <article style="background-color: {{ $spacebox->color }}">
                    <a class="spacebox-name" href="{{ route('space.show', [$spacebox->slug]) }}"><h2>#{{ $spacebox->name }}</h2></a>
                    <div class="spacebox-description"><p>{{ $spacebox->description }}</p></div>
                </article>
            @endforeach
        @endif
    </section>
@endsection
