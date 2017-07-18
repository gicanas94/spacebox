@extends('layouts.main')

@section('content')
    <div class="content">
        <h1>{{ trans('messages.faq-h1') }}</h1>
        <br>
        <div class="faq-cont">
            <h2>{{ trans('messages.faq-question1') }}</h2>
            <p>{{ trans('messages.faq-answer1') }}</p>
            <br>
            <h2>{{ trans('messages.faq-question2') }}</h2>
            <p>{!! trans('messages.faq-answer2') !!}</p>
            <br>
            <h2>{{ trans('messages.faq-question3') }}</h2>
            <p>{{ trans('messages.faq-answer3') }}</p>
            <br>
            <h2>{{ trans('messages.faq-question4') }}</h2>
            <p>{{ trans('messages.faq-answer4') }}</p>
            <br>
            <h2>{{ trans('messages.faq-question5') }}</h2>
            <p>{!! trans('messages.faq-answer5') !!}</p>
        </div>
    </div>
@endsection
