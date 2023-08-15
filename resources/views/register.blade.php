@extends('template')

@section('main')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            @error('name')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div>
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div>
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div>
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" name="password_confirmation" required>
        </div>

        <div>
            <button type="submit">
                {{ __('Register') }}
            </button>
        </div>
    </form>
@endsection
