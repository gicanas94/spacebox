@extends('layouts.main')

@section('content')
    <div class="content account-cont">
        <h1>{{ trans('messages.account-h1') }}</h1>
        <h2>{!! trans('messages.account-h2') !!}</h2>
        <hr>
        <div class="account-user-img">
            <img src="{{ asset(Auth::user()->image->src) }}" alt="{{ trans('messages.account-image-alt') }}">
        </div>
        <br><br>
        <form id="editAccount" action="{{ route('account.update') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <table>
                <tr>
                    <td><label>{{ trans('messages.account-edit-username') }}</label></td>
                    <td>
                        <input class="{{ $errors->has('username') ? 'form-error-content' : '' }}" type="text" name="username" value="{{ old('username', Auth::user()->username) }}">
                    </td>
                </tr>
                <tr>
                    <td><label>{{ trans('messages.account-email') }}</label></td>
                    <td>
                        <input class="{{ $errors->has('email') ? 'form-error-content' : '' }}" type="email" name="email" value="{{ old('email', Auth::user()->email) }}">
                    </td>
                </tr>
                <tr>
                    <td><label>{{ trans('messages.account-question') }}</label></td>
                    <td>"<i>{{ Auth::user()->question }}</i>"</td>
                </tr>
                <tr>
                    <td><label>{{ trans('messages.account-lang') }}</label></td>
                    <td>
                        <select name="lang">
                            @foreach ($langs as $lang => $largeLang)
                                @if ($lang === Auth::user()->lang)
                                    <option value="{{ $lang }}" selected>{{ $largeLang }}</option>
                                @else
                                    <option value="{{ $lang }}">{{ $largeLang }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Spacebox:</label></td>
                    <td>
                        @if (Auth::user()->spacebox != null)
                            <a href="{{ route('space', Auth::user()->spacebox->slug) }}">#{{ Auth::user()->spacebox->name }}</a>
                        @else
                            @if (Auth::user()->ban_id === null)
                                    {{ trans('messages.account-nospace-created-1') }}
                                <a href="{{ route('createspace.index') }}">
                                    {{ trans('messages.account-nospace-created-2') }}
                                </a>
                            @else
                                -
                            @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><label>{{ trans('messages.account-edit-image') }}</label></td>
                    <td><input class="upload-img" type="file" name="img"></td>
                </tr>
                <tr></tr>
                <tr>
                    <td><label>{{ trans('messages.account-edit-password') }}</label></td>
                    <td>
                        @if ($errors->has('password'))
                            <input class="form-error-content" type="password" name="password">
                        @else
                            <input type="password" name="password">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><label>{{ trans('messages.account-edit-confirm-password') }}</label></td>
                    <td>
                        @if ($errors->has('password'))
                            <input class="form-error-content" type="password" name="password_confirmation">
                        @else
                            <input type="password" name="password_confirmation">
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

            <a href="{{ route('account') }}" class="a-button">{{ trans('messages.account-edit-cancel') }}</a>
            <a href="#" class="a-button" onclick="document.getElementById('editAccount').submit()">{{ trans('messages.account-edit-save') }}</a>
        </form>
    </div>
@endsection
