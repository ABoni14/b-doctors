@extends('layouts.app')

@section('content')
<div class="center">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="login">
                <h1 class="">{{ __('Login') }}</h1>

                <div class="">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="">
                            <label for="email" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="">
                                <input placeholder="enter email" id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="">
                                <input placeholder="enter password" id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="my-3">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="f">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

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
          <label for="email">Email address</label>
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
                {{ __('Forgot Password?') }}
            </a>
            @endif
        </div>
        <button type="submit">
            {{ __('Login') }}
        </button>
        <div class="signup_link">
          Not a member? <a href="{{ route('register') }}">Signup</a>
        </div>
      </form>
</div>
@endsection
