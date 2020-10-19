@extends('layouts.app')

@section('content')
        <div class="container m-10 flex justify-center">
            <div class=" bg-white w-6/12 bg-white flex justify-center p-12">
                
                    <form class="w-full" method="POST" action="{{ route('register') }}">
                        <div class="flex text-xl justify-center my-2">{{ __('Register') }}</div>
                        @csrf
                        <div class="my-4">
                            <label for="name">{{ __('Name') }}</label>
                            <div>
                                <input  id="name" type="text" class="my-1 h-10 p-3 w-full bg-blue-100 rounded @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="my-4">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <div>
                                <input id="email" type="email" class="my-1 h-10 p-3 w-full bg-blue-100 rounded @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="my-4">
                            <label for="address">{{ __('Address') }}</label>
                            <div>
                                <textarea id="address" class="my-1 h-20 p-3 w-full bg-blue-100 rounded @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" row="3"></textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="my-4">
                            <label for="phone">{{ __('Phone number') }}</label>

                            <div>
                                <input id="phone" type="phone" class="my-1 h-10 p-3 w-full bg-blue-100 rounded @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="my-4">
                            <label for="password">{{ __('Password') }}</label>

                            <div>
                                <input id="password" type="password" class="my-1 h-10 p-3 w-full bg-blue-100 rounded @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="my-4">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="my-1 h-10 p-3 w-full bg-blue-100 rounded" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="my-4">
                            <div>
                                <button type="submit" class="bg-blue-400 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
@endsection
