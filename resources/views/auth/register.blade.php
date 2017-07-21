@extends ('layouts.main')

@section('content')
    <div class="content">
        <h1>{{ trans('messages.register-h1') }}</h1>
        <h2>{{ trans('messages.register-h2') }}</h2>
        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div>
                <label>{{ trans('messages.register-form-username') }}</label>
                <br>
                @if ($errors->has('username'))
                    <input class="form-error-content" type="text" name="username">
                @else
                    <input type="text" name="username" value="{{ old('username') }}">
                @endif
            </div>
            <br>
            <div>
                <label>{{ trans('messages.register-form-password') }}</label>
                <br>
                @if ($errors->has('password'))
                    <input class="form-error-content" type="password" name="password">
                @else
                    <input type="password" name="password">
                @endif
            </div>
            <br>
            <div>
                <label>{{ trans('messages.register-form-confirm') }}</label>
                <br>
                @if ($errors->has('password'))
                    <input class="form-error-content" type="password" name="password_confirmation">
                @else
                    <input type="password" name="password_confirmation">
                @endif
            </div>
            <br>
            <div>
                <label>{{ trans('messages.register-form-email') }}</label>
                <br>
                @if ($errors->has('email'))
                    <input class="form-error-content" type="text" name="email">
                @else
                    <input type="text" name="email" value="{{ old('email') }}">
                @endif
            </div>
            <br>
            <div>
                <label>{{ trans('messages.register-form-question') }}</label>
                <br>
                @if ($errors->has('question'))
                    <input class="form-error-content" type="text" name="question">
                @else
                    <input type="text" name="question" value="{{ old('question') }}">
                @endif
            </div>
            <br>
            <div>
                <label>{{ trans('messages.register-form-answer') }}</label>
                <br>
                @if ($errors->has('answer'))
                    <input class="form-error-content" type="text" name="answer">
                @else
                    <input type="text" name="answer" value="{{ old('answer') }}">
                @endif
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
                <label><input class="register-input-terms" type="checkbox" name="terms"> He leído y acepto los <a href="{{ route('terms') }}">Términos de Uso</a>.</label>
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
