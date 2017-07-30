@extends ('layouts.main')

@section('content')
    <div class="content">
        <h1>{{ trans('messages.login-h1') }}</h1>
        <h2>{!! trans('messages.login-h2') !!}</h2>
        <form action="{{ route('login') }}" method="post">
            {!! csrf_field() !!}
            <div>
                <label>{{ trans('messages.login-form-username') }}</label>
                <br>
                <input class="{{ $errors->has('username') ? 'form-error-content' : '' }}" type="text" name="username" value="{{ old('username') }}">
            </div>
            <br>
            <div>
                <label>{{ trans('messages.login-form-password') }}</label>
                <br>
                <input class="{{ $errors->has('password') ? 'form-error-content' : '' }}" type="password" name="password">
            </div>
            <br>
            <div>
                <label><input class="login-input-remember" type="checkbox" name="remember">{{ trans('messages.login-form-remember') }}</label>
            </div>
            <br>
            <div>
                <a href="{{ route('password.request') }}">{{ trans('messages.login-form-forgot') }}</a>
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
            
            <button type="submit">{{ trans('messages.login-form-submit') }}</button>
        </form>
    </div>
@endsection
