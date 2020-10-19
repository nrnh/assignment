@extends('layouts.app')

@section('content')

    <div class="flex justify-between">
        <h3 class="text-gray-700 text-center px-4 py-2 m-2">{{ __('Dashboard') }}</h3>
        <div class="text-gray-700 text-center px-4 py-2 m-2">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            {{ Auth::user()->name }}, {{ __('you are logged in!') }} 
        </div>
        <button v-on:click="toggleHide()" class="text-white bg-gray-700 text-center px-10 py-2 m-2 rounded">Back</button>
    </div>
    <div class="container p-10 mx-auto bg-white">
         
            <product-list></product-list>
            <product-view></product-view>
        
    </div>


@endsection
