@extends ('layouts.main')

@section('content')
    <h1>INGRESO</h1>
    <h2>¡Bienvenido nuevamente!,<br>ingresa los datos a continuación.</h2>
    <form action="{{ route('login') }}" method="post">
        {{ csrf_field() }}
        <div>
            <label>Usuario</label>
            <br>
            @if ($errors->has('username'))
                <input class="form-error-content" type="text" name="username">
            @else
                <input type="text" name="username" value="{{ old('username') }}">
            @endif
        </div>
        <br>
        <div>
            <label>Contraseña</label>
            <br>
            @if ($errors->has('email'))
                <input class="form-error-content" type="password" name="password">
            @else
                <input type="password" name="password">
            @endif
        </div>
        <br>
        <div>
            <label><input class="login-input-remember" type="checkbox" name="remember"> Recordar mi contraseña</label>
        </div>
        <br>
        <div>
            <a href="{{ route('password.request') }}">¿Olvidaste tu usuario o contraseña?</a>
        </div>
        @if (count($errors) > 0)
            <div class="error-content">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit">LOGIN</button>
    </form>
@endsection
