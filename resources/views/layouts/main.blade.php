<html lang="{{ Auth::check() ? Auth::user()->lang : app()->getLocale() }}">
    <head>
        <meta name="viewport" content="width=device-width">
        <meta charset="utf-8">
        <title>{{ $title }} - Spacebox</title>
        <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.png') }}"/>
    </head>
    <body>
        <div class="container">

            {{-- HEADER --}}
            @include('layouts.header')

            @yield('content')

            {{-- FOOTER --}}
            @include('layouts.footer')

        </div>
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>

        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/jquery.lazyload.js') }}"></script>
        <script>
            $(function() {
                $("article.lazy").lazyload({
                    container: $(".spaceboxes"),
                });
            });
        </script>
    </body>
</html>
