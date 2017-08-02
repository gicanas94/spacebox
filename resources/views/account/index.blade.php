@extends('layouts.main')

@section('content')
    <div class="content account-cont">
        <h1>{{ trans('messages.account-h1') }}</h1>
        <h2>{!! trans('messages.account-h2') !!}</h2>
        <hr>
        <br>
        <div class="account-user-img">
            <img src="{{ asset($image->src) }}" alt="{{ trans('messages.account-image-alt') }}">
        </div>
        <br><br>
        <table>
            <tr>
                <td>{{ trans('messages.account-index-username') }}</td>
                <td><i>{{ Auth::user()->username }}</i></td>
            </tr>
            <tr>
                <td>{{ trans('messages.account-email') }}</td>
                <td><i>{{ Auth::user()->email }}</i></td>
            </tr>
            <tr>
                <td>{{ trans('messages.account-question') }}</td>
                <td>"<i>{{ Auth::user()->question }}</i>"</td>
            </tr>
            <tr>
                <td>{{ trans('messages.account-lang') }}</td>
                <td><i>{{ Auth::user()->lang }}</i></td>
            </tr>
            <tr>
                <td>Spacebox:</td>
                <td>
                    @if (Auth::user()->spacebox != null)
                        <a href="{{ route('space', Auth::user()->spacebox->slug) }}">#{{ Auth::user()->spacebox->name }}</a>
                    @else
                        @if (Auth::user()->ban_id === null)
                                {{ trans('messages.account-nospace-created-1') }}
                            <a href="{{ route('createspace.index') }}">
                                {{ trans('messages.account-nospace-created-2') }}
                            </a>
                        @else
                            -
                        @endif
                    @endif
                </td>
            </tr>
        </table>
        @if (Auth::user()->ban_id === null)
            <hr>
            <a href="{{ route('account.edit') }}" class="a-button" >{{ trans('messages.account-index-button-edit') }}</a>
        @endif

        @if(session()->has('success'))
            <div style="text-align: center" class="succeed-content">{{ session()->get('success') }}</div>
        @endif
    </div>
@endsection
