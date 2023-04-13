@extends('layouts.app')

@section('css-optional')
    <style>
        body {
            background-image: url('./build/images/cover.jpg') !important;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: bottom;

            
            /* Add an overlay on top of the background image */
            &::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5); /* Change the color and opacity as needed */
            }
        }

        .login{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-card{
            color: white;
            width: 25em;
            background: rgba(42, 63, 84, 0.75);
            padding: 1rem;
            border-radius: 0.5rem;
        }

        
    </style>
@endsection

@section('content')
    {{-- <div class="animate form login_form"> --}}

    <section class="login-card">
        <h1 class="text-center"> <i class="fa-solid fa-ship mr-3"></i>{{env('APP_NAME')}}</h1>
        <hr>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class=" mb-3 w-100">
                <p for="username" class="text-md-end text-left">{{ __('Username') }}</p>

                <div class="w-100">
                    <input id="username" type="text"
                        class="form-control @error('username') is-invalid pl-5 @enderror " name="username"
                        value="{{ old('username') }}" required autocomplete="off" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class=" mb-3 w-100">
                <p for="password" class="text-md-end text-left">{{ __('Password') }}</p>

                <div class="w-100">
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid pl-5 @enderror " name="password" required
                        autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3 text-left">
                <div class="">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class=" mb-0">
                <div class="w-100">
                    <button type="submit" class="btn btn-primary w-100" >
                        {{ __('Login') }}
                    </button>

                    {{-- @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif --}}
                </div>
            </div>
        </form>
    </section>
    {{-- </div> --}}
@endsection
