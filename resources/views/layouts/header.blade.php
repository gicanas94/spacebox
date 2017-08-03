<div class="overlay"></div>
<header class="main-header">
    <a href="{{ route('index') }}" class="logo-query2"><img src="{{ asset('img/logo-2.png') }}" alt="logotipo" width="200px"></a>
    <a href="#" class="toggle-nav"><span class="ion-chevron-down"></span></a>
    <nav class="main-nav">
        <ul>
            {{-- Filter --}}
            <li><a id="filterButton" href="#" onclick="javascipt:return false;"><span class="ion-ios-settings-strong"></span></a></li>

            <li><a href="{{ route('index') }}"><span class="icon left ion-ios-home"></span>{{ trans('messages.header-index') }}</a></li>

            {{-- Guest --}}
            @if (Auth::guest())
                <li><a href="{{ route('faq') }}"><span class="icon left ion-help-circled"></span>{{ trans('messages.header-faq') }}</a></li>
                <li><a href="{{ route('register') }}"><span class="icon left ion-ios-heart"></span>{{ trans('messages.header-register') }}</a></li>
                <li><a href="{{ route('login') }}"><span class="icon left ion-happy"></span>{{ trans('messages.header-login') }}</a></li>
            @endif

            {{-- Logged user --}}
            @if (Auth::check())
                {{-- Admin --}}
                @if (Auth::user()->isAdmin())
                    <li><a href={{ route('admin') }}><span class="icon left ion-help-buoy"></span>{{ trans('messages.header-admin') }}</a></li>
                @endif

                @if (empty(Auth::user()->spacebox) && Auth::user()->ban_id === null)
                    <li><a href="{{ route('createspace.index') }}"><span class="icon left ion-ios-compose"></span>{{ trans('messages.header-create-spacebox') }}</a></li>
                @else
                    <li><a href="{{ route('editspace') }}"><span class="icon left ion-planet"></span>{{ trans('messages.header-edit-spacebox') }}</a></li>
                @endif

                <li><a href="{{ route('account') }}"><span class="icon left ion-android-person"></span>{{ trans('messages.header-my-account') }}</a></li>
            @endif

            {{-- Logout --}}
            @if (Auth::check())
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="icon left ion-sad"></span>{{ trans('messages.header-logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="post">
                        {!! csrf_field() !!}
                    </form>
                </li>
            @endif

            {{-- Search --}}
            <li>
                <div class="search-bar-q1">
                    <form action="{{ route('search') }}" method="get">
                        <input type="text" name="search" placeholder="{{ trans('messages.header-search') }}" required>
                	</form>
                </div>
            </li>
        </ul>
    </nav>

    {{-- Search --}}
    <div class="search-bar-q2">
        <form action="{{ route('search') }}" method="get">
            <input type="text" name="name" placeholder="{{ trans('messages.header-search') }}" required>
  		    <button type="submit"><span class="ion-search"></span></button>
        </form>
    </div>

    <a href="{{ route('index') }}"><img src="{{ asset('img/logo-2.png') }}" alt="logotipo" class="logo-query1" width="300px"></a>
</header>

{{-- Filter by category and language --}}
<div class="filter-content">
    @foreach (App\Category::getCategories() as $category)
        <a class="filter-option" href="{{ route('filter', ['option' => $category['id']]) }}">
            {{ $category['name'] }}
        </a>
    @endforeach

    <a class="filter-option" href="{{ route('filter', ['option' => 'en']) }}">EN</a>
    <a class="filter-option" href="{{ route('filter', ['option' => 'es']) }}">ES</a>
</div>
