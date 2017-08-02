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
                        <input id="nameInput" class="{{ $errors->has('name') ? 'form-error-content' : '' }}" type="text" name="name" value="{{ old('name', $spacebox->name) }}">
                    </td>
                </tr>
                <tr>
                    <td><label>{{ trans('messages.editspace-edit-desc') }}</label></td>
                    <td>
                        <textarea class="{{ $errors->has('description') ? 'form-error-content' : '' }}" id="descriptionTextarea" rows="5" name="description">{{ old('description', $spacebox->description) }}</textarea>
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
                    <td><label>{{ trans('messages.editspace-category') }}</label></td>
                    <td>
                        <select name="category_id">
                            @foreach ($categories as $category)
                                @if ($category['id'] == $spacebox->category_id))
                                    <option value="{{ $category['id'] }}" selected>{{ $category['name'] }}</option>
                                @else
                                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
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
                        <input class="{{ $errors->has('current_password') ? 'form-error-content' : '' }}" type="password" name="current_password">
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
