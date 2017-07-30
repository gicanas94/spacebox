@extends ('layouts.main')

@section('content')
    <div class="content">
        <h1>{{ trans('messages.register-h1') }}</h1>
        <h2>{{ trans('messages.register-h2') }}</h2>
        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div>
                <label>{{ trans('messages.register-form-username') }}</label>
                <br>
                <input class="{{ $errors->has('username') ? 'form-error-content' : '' }}" type="text" name="username" value="{{ old('username') }}">
            </div>
            <br>
            <div>
                <label>{{ trans('messages.register-form-password') }}</label>
                <br>
                <input class="{{ $errors->has('password') ? 'form-error-content' : '' }}" type="password" name="password">
            </div>
            <br>
            <div>
                <label>{{ trans('messages.register-form-confirm') }}</label>
                <br>
                <input class="{{ $errors->has('password') ? 'form-error-content' : '' }}" type="password" name="password_confirmation">
            </div>
            <br>
            <div>
                <label>{{ trans('messages.register-form-email') }}</label>
                <br>
                <input class="{{ $errors->has('email') ? 'form-error-content' : '' }}" type="email" name="email" value="{{ old('email') }}">
            </div>
            <br>
            <div>
                <label>{{ trans('messages.register-form-question') }}</label>
                <br>
                <input class="{{ $errors->has('question') ? 'form-error-content' : '' }}" type="text" name="question" value="{{ old('question') }}">
            </div>
            <br>
            <div>
                <label>{{ trans('messages.register-form-answer') }}</label>
                <br>
                <input class="{{ $errors->has('answer') ? 'form-error-content' : '' }}" type="text" name="answer" value="{{ old('answer') }}">
            </div>
            <br>
            <div>
                <label>{{ trans('messages.register-form-lang') }}</label>
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
            <div>
                <label>{{ trans('messages.register-form-image') }}</label>
                <br>
                <input class="upload-img" type="file" name="img">
            </div>
            <br>
            <div>
                <label><input class="register-input-terms" type="checkbox" name="terms">{!! trans('messages.register-form-terms') !!}</label>
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

            <button type="submit">{{ trans('messages.register-form-submit') }}</button>
        </form>
    </div>
@endsection
