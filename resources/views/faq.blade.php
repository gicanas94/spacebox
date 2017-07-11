@extends('layouts.main')

@section('content')
    <h1>F.A.Q.</h1>
    <br>
    <div class="faq-cont">
        <h2>¿De qué se trata todo esto?</h2>
        <p>Spacebox es una plataforma desarrollada para todos aquellos que disfrutan escribir, brindándoles la posibilidad de disponer de un espacio único personal en el cual puedan hacerlo.</p>
        <br>
        <h2>Bien, ¿y puedo escribir sobre lo que yo quiera?</h2>
        <p>Claro que sí, siempre y cuando el contenido no infrinja nuestros <a href="{{ route('terms') }}">términos de uso</a>, el límite es tu imaginación.</p>
        <br>
        <h2>Suena muy bien pero... ¿cuánto cuesta?</h2>
        <p>¡Nada de nada!, Spacebox brinda un servicio 100% gratuito.</p>
        <br>
        <h2>Y si no quiero escribir, pero quiero ver lo que otras personas escriben, ¿puedo hacerlo?</h2>
        <p>Por supuesto, el sitio cuenta con un buscador de espacios, y por si esto fuera poco, es posible filtrar por categoría e idioma de cada uno.</p>
        <br>
        <h2>No más preguntas, ¿cómo me registro?</h2>
        <p>Para crear tu cuenta, haz <a href="{{ route('register') }}">click aquí</a>.</p>
    </div>
@endsection
