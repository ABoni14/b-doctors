@extends('layouts.app')

@section('content')
<div class="center">

    <h1>{{ __('Login') }}</h1>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="txt_field">
          <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          <span></span>
          <label for="email">Indirizzo email</label>
        </div>
        <div class="txt_field">
          <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
            @enderror
          <span></span>
          <label for="password">Password</label>
        </div>
        <div class="pass">
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                {{ __('Password dimenticata?') }}
            </a>
            @endif
        </div>
        <button type="submit" class="btn-doctors">
            {{ __('Login') }}
        </button>
        <div class="signup_link">
          Non sei registrato? <a href="{{ route('register') }}">Clicca qui!</a>
        </div>
      </form>
</div>
@endsection
