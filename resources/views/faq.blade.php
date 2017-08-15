@extends('layouts.main')

@section('content')
    <div class="content">
        <h1>{{ trans('messages.faq-h1') }}</h1>
        <br>
        <div class="faq-content">
            <h2>{{ trans('messages.faq-question-1') }}</h2>
            <p>{{ trans('messages.faq-answer-1') }}</p>
            <br>
            <h2>{{ trans('messages.faq-question-2') }}</h2>
            <p>{!! trans('messages.faq-answer-2') !!}</p>
            <br>
            <h2>{{ trans('messages.faq-question-3') }}</h2>
            <p>{{ trans('messages.faq-answer-3') }}</p>
            <br>
            <h2>{{ trans('messages.faq-question-4') }}</h2>
            <p>{{ trans('messages.faq-answer-4') }}</p>
            <br>
            <h2>{{ trans('messages.faq-question-5') }}</h2>
            <p>{!! trans('messages.faq-answer-5') !!}</p>
        </div>
    </div>
@endsection
