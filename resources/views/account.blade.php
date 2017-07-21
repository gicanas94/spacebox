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
                <td>{{ trans('messages.account-username') }}</td>
                <td><i>{{ Auth::user()->username }}</i></td>
            </tr>
            <tr>
                <td>{{ trans('messages.account-email') }}</td>
                <td><i>{{ Auth::user()->email }}</i></td>
            </tr>
            <tr>
                <td>{{ trans('messages.account-question') }}</td>
                <td><i>{{ Auth::user()->question }}</i></td>
            </tr>
            <tr>
                <td>{{ trans('messages.account-lang') }}</td>
                <td><i>{{ Auth::user()->lang }}</i></td>
            </tr>
            <tr>
                <td>Spacebox:</td>
                <td>
                    @if (Auth::user()->spacebox != null)
                        <a href="{{ route('space.show', Auth::user()->spacebox->slug) }}">#{{ Auth::user()->spacebox->name }}</a>
                    @else
                        @if (Auth::user()->ban_id === null)
                            {!! trans('messages.account-nospace-created') !!}
                        @else
                            -
                        @endif
                    @endif
                </td>
            </tr>
        </table>
        @if (Auth::user()->ban_id === null)
            <hr>
            <button type="submit" name="edit">{{ trans('messages.account-button-edit') }}</button>
        @endif
    </div>
@endsection
