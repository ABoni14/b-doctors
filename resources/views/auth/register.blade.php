@extends('layouts.app')

@section('content')
<div class="center">
    <h1>Registrati</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="txt_field">
            <input id="first_name" type="text" class=" @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name">

            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          <span></span>
          <label for="first_name">{{ __('Nome') }}</label>
        </div>
        <div class="txt_field">
            <input id="last_name" type="text" class=" @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">

            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          <span></span>
          <label for="last_name">{{ __('Cognome') }}</label>
        </div>
        <div class="txt_field">
            <input id="address" type="text" class=" @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          <span></span>
          <label for="address">{{ __('Indirizzo') }}</label>
        </div>
        <div class="txt_field">
            <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          <span></span>
          <label for="email">{{ __('Email') }}</label>
        </div>
        <div class="txt_field">
            <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          <span></span>
          <label for="password">{{ __('Password') }}</label>
        </div>
        <div class="txt_field">
            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
          <span></span>
          <label for="password-confirm">{{ __('Conferma password') }}</label>
        </div>
    
        <button type="submit" class="btn-doctors">
            {{ __('Registrati') }}
        </button>
    </form>
</div>
@endsection
