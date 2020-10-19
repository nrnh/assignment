@extends('layouts.app')

@section('content')

    <div class="m-12">
        <div class="flex justify-center my-4">
            <p class="text-lg">Log in to purchase</p><br>
        </div>
        <div class="flex justify-center">
            <a class="bg-blue-400 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded" href="{{ route('login') }}">{{ __('Login') }}</a>
        </div>
    </div>
    
    
@endsection