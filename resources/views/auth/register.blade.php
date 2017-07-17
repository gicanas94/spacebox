@extends ('layouts.main')

@section('content')
    <div class="content">
        <h1>{{ trans('messages.register-h1') }}</h1>
        <h2>{{ trans('messages.register-h2') }}</h2>
        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div>
                <label>Nombre de usuario (30)</label>
                <br>
                @if ($errors->has('username'))
                    <input class="form-error-content" type="text" name="username">
                @else
                    <input type="text" name="username" value="{{ old('username') }}">
                @endif
            </div>
            <br>
            <div>
                <label>Contraseña (25)</label>
                <br>
                @if ($errors->has('password'))
                    <input class="form-error-content" type="password" name="password">
                @else
                    <input type="password" name="password">
                @endif
            </div>
            <br>
            <div>
                <label>Confirma tu contraseña</label>
                <br>
                @if ($errors->has('password'))
                    <input class="form-error-content" type="password" name="password_confirmation">
                @else
                    <input type="password" name="password_confirmation">
                @endif
            </div>
            <br>
            <div>
                <label>Correo electrónico</label>
                <br>
                @if ($errors->has('email'))
                    <input class="form-error-content" type="text" name="email">
                @else
                    <input type="text" name="email" value="{{ old('email') }}">
                @endif
            </div>
            <br>
            <div>
                <label>Pregunta secreta (40)</label>
                <br>
                @if ($errors->has('s_question'))
                    <input class="form-error-content" type="text" name="s_question">
                @else
                    <input type="text" name="s_question" value="{{ old('s_question') }}">
                @endif
            </div>
            <br>
            <div>
                <label>Respuesta secreta (40)</label>
                <br>
                @if ($errors->has('s_answer'))
                    <input class="form-error-content" type="text" name="s_answer">
                @else
                    <input type="text" name="s_answer" value="{{ old('s_answer') }}">
                @endif
            </div>
            <br>
            <div>
                <label>Idioma del sitio</label>
                <br>
                <select name="site_lang">
                    @foreach ($langs as $lang => $largeLang)
                        <option value="{{ $lang }}">{{ $largeLang }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div>
                <label>Imagen (10mb)</label>
                <br>
                <input class="upload-img" type="file" name="user_img">
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
            <button type="submit">LISTO</button>
        </form>
    </div>
@endsection
