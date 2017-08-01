@extends('layouts.main')

@section('content')
    <div class="content createspace-cont">
        <h1>{{ trans('messages.create-h1') }}</h1>
        <h2>{{ trans('messages.create-h2') }}</h2>
        <hr>
        <br>
        <div class="spacebox-preview">
            <article style="background-color: #B9264F" id="colorPreview">
                <a class="spacebox-name"><h2 id="namePreview">{{ trans('messages.create-preview-name') }}</h2></a>
                <div class="spacebox-description"><p id="descriptionPreview">{{ trans('messages.create-preview-desc') }}</p></div>
            </article>
        </div>
        <br>
        <form action="{{ route('createspace.store') }}" method="post">
            {!! csrf_field() !!}
            <div>
                <label>{{ trans('messages.create-form-name') }}</label>
                <br>
                <input id="nameInput" class="{{ $errors->has('name') ? 'form-error-content' : '' }}" type="text" name="name" value="{{ old('name') }}">
            </div>
            <div>
                <br>
                <label>{{ trans('messages.create-form-desc') }}</label>
                <br>
                <textarea class="{{ $errors->has('description') ? 'form-error-content' : '' }}" id="descriptionTextarea" rows="5" name="description">{{ old('description') }}</textarea>
            </div>
            <br>
            <div>
                <label>{{ trans('messages.create-form-category') }}</label>
                <br>
                <select name="category">
                    @foreach ($categories as $xCategory => $nameCategory)
                        @if ($xCategory == old('category'))
                            <option value="{{ $xCategory }}" selected>{{ $nameCategory }}</option>
                        @else
                            <option value="{{ $xCategory }}">{{ $nameCategory }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <br>
            <div>
                <label>{{ trans('messages.create-form-lang') }}</label>
                <br>
                <select name="lang">
                    @foreach ($langs as $lang => $largeLang)
                        @if ($lang === old('lang'))
                            <option value="{{ $lang }}" selected>{{ $largeLang }}</option>
                        @else
                            <option value="{{ $lang }}">{{ $largeLang }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <br>
            <div class="colors-cont">
                <label>{{ trans('messages.create-form-color') }}</label>
                <input id="selectedColor" type="hidden" name="color">
                <br><br>
                @foreach ($colors as $color)
                    <div class="color" style="background-color: {{ $color }}" value="{{ $color }}"></div>
                @endforeach
            </div>

            @if ($errors->any())
                <div class="error-content">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit">{{ trans('messages.create-form-submit') }}</button>
        </form>
    </div>
@endsection
