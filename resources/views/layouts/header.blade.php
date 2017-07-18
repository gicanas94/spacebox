<div class="overlay"></div>
<header class="main-header">
    <a href="{{ route('index') }}" class="logo-query2"><img src="{{ asset('img/logo-2.png') }}" alt="logotipo" width="200px"></a>
    <a href="#" class="toggle-nav"><span class="ion-chevron-down"></span></a>
    <nav class="main-nav">
        <ul>
            <li><a href="{{ route('index') }}"><span class="icon left ion-ios-home"></span>Inicio</a></li>
            <li><a href=""><span class="icon left ion-help-buoy"></span>ADMIN-CP</a></li>

            @if (Auth::guest())
                <li><a href="{{ route('faq') }}"><span class="icon left ion-help-circled"></span>F.A.Q.</a></li>
                <li><a href="{{ route('register') }}"><span class="icon left ion-ios-heart"></span>Registrarse</a></li>
                <li><a href="{{ route('login') }}"><span class="icon left ion-happy"></span>Iniciar sesión</a></li>
            @endif

            @if (Auth::check())
                @if (empty(auth()->user()->spacebox))
                    <li><a href=""><span class="icon left ion-ios-compose"></span>Crear Spacebox</a></li>
                @else
                    <li><a href=""><span class="icon left ion-planet"></span>Mi Spacebox</a></li>
                    <li><a href=""><span class="icon left ion-android-person"></span>Mi cuenta</a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="icon left ion-sad"></span>Cerrar sesión</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="post">
                        {{ csrf_field() }}
                    </form>
                @endif
            @endif

            <li>
                <div class="search-bar-q1">
                    <form action="{{ route('search') }}" method="get">
                        <input type="text" name="search" placeholder="buscar..." required>
                	</form>
                </div>
            </li>
        </ul>
    </nav>

    <div class="search-bar-q2">
        <form action="{{ route('search') }}" method="get">
            <input type="text" name="name" placeholder="Buscar..." required>
  		    <button type="submit"><span class="ion-search"></span></button>
        </form>
    </div>

    <a href="{{ route('index') }}"><img src="{{ asset('img/logo-2.png') }}" alt="logotipo" class="logo-query1" width="300px"></a>
</header>
