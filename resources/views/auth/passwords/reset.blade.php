@extends ('layouts.main')

@section('content')
    <div class="content">
        <h1>{{ trans('passwords.h1') }}</h1>
        <h2>{!! trans('passwords.reset-h2') !!}</h2>
        <form action="{{ route('password.request') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">
            <div>
                <label>{{ trans('passwords.reset-form-email') }}</label>
                <br>
                <input class="{{ $errors->has('email') ? 'form-error-content' : '' }}" type="email" name="email" value="{{ old('email') }}">
            </div>
            <br>
            <div>
                <label>{{ trans('passwords.reset-form-password') }}</label>
                <br>
                <input class="{{ $errors->has('password') ? 'form-error-content' : '' }}" type="password" name="password">
            </div>
            <br>
            <div>
                <label>{{ trans('passwords.reset-form-confirm') }}</label>
                <br>
                <input class="{{ $errors->has('password') ? 'form-error-content' : '' }}" type="password" name="password_confirmation">
            </div>
            <button type="submit" name="button">{{ trans('passwords.reset-form-submit') }}</button>
        </form>

        @if (session('status'))
            <div style="text-align: center" class="succeed-content">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="error-content">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
