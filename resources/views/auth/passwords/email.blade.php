@extends ('layouts.main')

@section('content')
    <div class="content">
        <h1>{{ trans('passwords.h1') }}</h1>
        <h2>{!! trans('passwords.email-h2') !!}</h2>
        <hr>
        <form action="{{ route('password.email') }}" method="post">
            {{ csrf_field() }}
            <div>
                <label><p>{!! trans('passwords.email-form-email') !!}</p></label>
                <input class="{{ $errors->has('email') ? 'form-error-content' : '' }}" type="email" name="email" value="{{ old('email') }}">
            </div>
            <button type="submit" name="button">{{ trans('passwords.email-form-submit') }}</button>
        </form>

        @if (session('status'))
            <div style="text-align: center" class="succeed-content">{!! session('status') !!}</div>
        @endif

        @if ($errors->any())
            <div class="small-error-content">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
