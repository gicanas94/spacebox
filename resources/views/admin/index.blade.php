@extends('layouts.main')

@section('content')
    <div class="content">
        <h1>{{ trans('messages.admin-h1') }}</h1>
        <h2>{{ trans('messages.admin-h2') }}</h2>
        <hr>
        <form action="{{ route('admin.banUser') }}" method="post">
            {!! csrf_field() !!}
            <h3>{{ trans('messages.admin-form-ban-user-h3') }}</h3>
            <div>
                <label>{{ trans('messages.admin-form-ban-user-username') }}</label>
                <br>
                <input class="{{ $errors->has('ban-user-username') ? 'form-error-content' : '' }}" type="text" name="ban-user-username" value="{{ old('ban-user-username') }}">
            </div>
            <br>
            <div>
                <label>{{ trans('messages.admin-form-ban-reason') }}</label>
                <br>
                <input class="{{ $errors->has('ban-user-reason') ? 'form-error-content' : '' }}" type="text" name="ban-user-reason" value="{{ old('ban-user-reason') }}">
            </div>
            <button type="submit">{{ trans('messages.admin-form-ban-submit') }}</button>
        </form>
        <hr>
        <form action="{{ route('admin.unbanUser') }}" method="post">
            {!! csrf_field() !!}
            <h3>{{ trans('messages.admin-form-unban-user-h3') }}</h3>
            <div>
                <label>{{ trans('messages.admin-form-unban-user-username') }}</label>
                <br>
                <input class="{{ $errors->has('unban-user-username') ? 'form-error-content' : '' }}" type="text" name="unban-user-username" value="{{ old('unban-user-username') }}">
            </div>
            <button type="submit">{{ trans('messages.admin-form-unban-submit') }}</button>
        </form>
        <hr>
        <form action="{{ route('admin.banSpacebox') }}" method="post">
            {!! csrf_field() !!}
            <h3>{{ trans('messages.admin-form-ban-spacebox-h3') }}</h3>
            <div>
                <label>{{ trans('messages.admin-form-ban-spacebox-name') }}</label>
                <br>
                <input class="{{ $errors->has('ban-spacebox-name') ? 'form-error-content' : '' }}" type="text" name="ban-spacebox-name" value="{{ old('ban-spacebox-name') }}">
            </div>
            <br>
            <div>
                <label>{{ trans('messages.admin-form-ban-reason') }}</label>
                <br>
                <input class="{{ $errors->has('ban-spacebox-reason') ? 'form-error-content' : '' }}" type="text" name="ban-spacebox-reason" value="{{ old('ban-spacebox-reason') }}">
            </div>
            <button type="submit">{{ trans('messages.admin-form-ban-submit') }}</button>
        </form>
        <hr>
        <form action="{{ route('admin.unbanSpacebox') }}" method="post">
            {!! csrf_field() !!}
            <h3>{{ trans('messages.admin-form-unban-spacebox-h3') }}</h3>
            <div>
                <label>{{ trans('messages.admin-form-unban-spacebox-name') }}</label>
                <br>
                <input class="{{ $errors->has('unban-spacebox-name') ? 'form-error-content' : '' }}" type="text" name="unban-spacebox-name" value="{{ old('unban-spacebox-name') }}">
            </div>
            <button type="submit">{{ trans('messages.admin-form-unban-submit') }}</button>
        </form>
        <hr>
        <form action="{{ route('admin.makeAdmin') }}" method="post">
            {!! csrf_field() !!}
            <h3>{{ trans('messages.admin-form-make-admin-h3') }}</h3>
            <div>
                <label>{{ trans('messages.admin-form-make-admin-username') }}</label>
                <br>
                <input class="{{ $errors->has('make-admin-username') ? 'form-error-content' : '' }}" type="text" name="make-admin-username" value="{{ old('make-admin-username') }}">
            </div>
            <button type="submit">{{ trans('messages.admin-form-make-admin-submit') }}</button>
        </form>

        @if ($errors->any())
            <div class="error-content">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('success'))
            <div style="text-align: center" class="succeed-content">{{ session()->get('success') }}</div>
        @endif
    </div>
@endsection
