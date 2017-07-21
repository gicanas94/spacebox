@extends('layouts.main')

@section('content')
    <div class="content">
        <h1>{{ trans('messages.admin-h1') }}</h1>
        <h2>{{ trans('messages.admin-h2') }}</h2>
        <hr>
        <form action="" method="post">
            {{ csrf_field() }}
            <h3>{{ trans('messages.admin-form-ban-user-h3') }}</h3>
            <div>
                <label>{{ trans('messages.admin-form-ban-user-username') }}</label>
                <br>
                @if ($errors->has('username'))
                    <input class="form-error-content" type="text" name="username">
                @else
                    <input type="text" name="username" value="{{ old('username') }}">
                @endif
            </div>
            <br>
            <div>
                <label>{{ trans('messages.admin-form-ban-reason') }}</label>
                <br>
                @if ($errors->has('reason'))
                    <input class="form-error-content" type="text" name="reason">
                @else
                    <input type="text" name="reason" value="{{ old('reason') }}">
                @endif
            </div>
            <button type="submit">{{ trans('messages.admin-form-ban-submit') }}</button>
        </form>
        <hr>
        <form action="" method="post">
            {{ csrf_field() }}
            <h3>{{ trans('messages.admin-form-ban-spacebox-h3') }}</h3>
            <div>
                <label>{{ trans('messages.admin-form-ban-spacebox-name') }}</label>
                <br>
                @if ($errors->has('name'))
                    <input class="form-error-content" type="text" name="name">
                @else
                    <input type="text" name="name" value="{{ old('name') }}">
                @endif
            </div>
            <br>
            <div>
                <label>{{ trans('messages.admin-form-ban-reason') }}</label>
                <br>
                @if ($errors->has('reason'))
                    <input class="form-error-content" type="text" name="reason">
                @else
                    <input type="text" name="reason" value="{{ old('reason') }}">
                @endif
            </div>
            <button type="submit">{{ trans('messages.admin-form-ban-submit') }}</button>
        </form>
        <hr>
        <form action="" method="post">
            {{ csrf_field() }}
            <h3>{{ trans('messages.admin-form-make-admin-h3') }}</h3>
            <div>
                <label>{{ trans('messages.admin-form-make-admin-username') }}</label>
                <br>
                @if ($errors->has('username'))
                    <input class="form-error-content" type="text" name="username">
                @else
                    <input type="text" name="username" value="{{ old('username') }}">
                @endif
            </div>
            <button type="submit">{{ trans('messages.admin-form-make-admin-submit') }}</button>
        </form>

        @if(session()->has('success'))
            <div style="text-align: center;" class="succeed-content">{{ session()->get('success') }}    </div>
        @endif
    </div>
@endsection
