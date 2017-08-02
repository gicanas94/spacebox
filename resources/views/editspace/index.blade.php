@extends('layouts.main')

@section('content')
    <div class="content editspace-cont">
        <h1>{{ trans('messages.editspace-h1') }}</h1>
        <h2>{!! trans('messages.editspace-h2') !!}</h2>
        <hr>
        <br>
        <div class="spacebox-preview">
            <article style="background-color: {{ $spacebox->color }}" id="colorPreview">
                <a class="spacebox-name"><h2 id="namePreview">#{{ $spacebox->name }}</h2></a>
                <div class="spacebox-description"><p id="descriptionPreview">{{ $spacebox->description }}</p></div>
            </article>
        </div>
        <br>
        <table>
            <tr>
                <td>{{ trans('messages.editspace-index-name') }}</td>
                <td><a href="{{ route('space', $spacebox->slug) }}">#{{ $spacebox->name }}</a></td>
            </tr>
            <tr>
                <td>{{ trans('messages.editspace-index-desc') }}</td>
                <td><i>{{ $spacebox->description }}</i></td>
            </tr>
            <tr>
                <td>Color:</td>
                <td><div class="editspace-actualcolor" style="background-color: {{ $spacebox->color }}" value="{{ $spacebox->color }}"></div></td>
            </tr>
            <tr>
                <td>{{ trans('messages.editspace-category') }}</td>
                <td><i>{{ $category }}</i></td>
            </tr>
            <tr>
                <td>{{ trans('messages.editspace-lang') }}</td>
                <td><i>{{ $spacebox->lang }}</i></td>
            </tr>
            <tr>
                <td>{{ trans('messages.editspace-visible') }}</td>
                <td class="editspace-checkbox">
                    @if ($spacebox->visible === 1)
                        <input type="checkbox" name="visible" checked disabled>
                    @else
                        <input type="checkbox" name="visible" disabled>
                    @endif
                </td>
            </tr>
        </table>
        @if (Auth::user()->ban_id === null && $spacebox->ban_id === null)
            <hr>
            <a href="{{ route('editspace.edit') }}" class="a-button" >{{ trans('messages.editspace-index-button-edit') }}</a>
        @endif

        @if(session()->has('success'))
            <div style="text-align: center;" class="succeed-content">{{ session()->get('success') }}</div>
        @endif
    </div>
@endsection
