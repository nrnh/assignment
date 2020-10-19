@extends('layouts.app')

@section('content')

    <div class="container justify-center flex h-full bg-white m-12 p-5">
        <div class="w-1/2 bg-white">
            <h3 class="flex justify-center text-xl my-4 relative">{{ __('Login') }}</h3>
            <form class="grid grid-flow-row auto-rows-max md:auto-rows-min" method="POST" action="{{ route('login') }}">
                <div class="my-4 grid grid-flow-row auto-rows-max md:auto-rows-min">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input class="h-10 p-3" id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                <div class="my-4 grid grid-flow-row auto-rows-max md:auto-rows-min">
                    <label for="password">{{ __('Password') }}</label>
                    <input class="h-10 p-3" id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                <div class="my-4">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                            {{ __('Remember Me') }}
                        </label>
                </div>
                <div>
                
                </div>
                <button class="bg-blue-400 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded" type="submit">
                    {{ __('Login') }}
                </button>
                @if (Route::has('password.request'))
                <a class="my-4" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </form>
        </div>
    </div>

@endsection
