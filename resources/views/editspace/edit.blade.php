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
        <form id="editSpacebox" action="{{ route('editspace.update') }}" method="post">
            {!! csrf_field() !!}
            <table>
                <tr>
                    <td><label>{{ trans('messages.editspace-edit-name') }}</label></td>
                    <td>
                        @if ($errors->has('name'))
                            <input id="nameInput" class="form-error-content" type="text" name="name">
                        @else
                            <input id="nameInput" type="text" name="name" value="{{ old('name') }}">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><label>{{ trans('messages.editspace-edit-desc') }}</label></td>
                    <td>
                        @if ($errors->has('description'))
                            <textarea id="descriptionTextarea" class="form-error-content" rows="5" name="description" type="text"></textarea>
                        @else
                            <textarea id="descriptionTextarea" rows="5" name="description">{{ old('description') }}</textarea>
                        @endif
                    </td>
                </tr>
            </table>
            <br>
            <div class="editspace-colors-cont">
                <input id="selectedColor" type="hidden" name="color">
                @foreach ($colors as $color)
                    <div class="color" style="background-color: {{ $color }}" value="{{ $color }}"></div>
                @endforeach
            </div>
            <br>
            <table>
                <tr>
                    <td><label>{{ trans('messages.editspace-lang') }}</label></td>
                    <td>
                        <select name="lang">
                            @foreach ($langs as $lang => $largeLang)
                                @if ($lang === $spacebox->lang)
                                    <option value="{{ $lang }}" selected>{{ $largeLang }}</option>
                                @else
                                    <option value="{{ $lang }}">{{ $largeLang }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>{{ trans('messages.editspace-visible') }}</label></td>
                    <td class="editspace-checkbox">
                        @if ($spacebox->visible === 1)
                            <input type="checkbox" name="visible" checked>
                        @else
                            <input type="checkbox" name="visible">
                        @endif
                    </td>
                </tr>
                <tr></tr>
                <tr>
                    <td><label>{{ trans('messages.account-edit-current-password') }}</label></td>
                    <td>
                        @if ($errors->has('current_password'))
                            <input class="form-error-content" type="password" name="current_password">
                        @else
                            <input type="password" name="current_password">
                        @endif
                    </td>
                </tr>
            </table>
            <hr>
            @if ($errors->any())
                <div class="error-content">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <a href="{{ route('editspace') }}" class="a-button">{{ trans('messages.editspace-edit-cancel') }}</a>
            <a href="#" class="a-button" onclick="document.getElementById('editSpacebox').submit()">{{ trans('messages.editspace-edit-save') }}</a>
        </form>
    </div>
@endsection
