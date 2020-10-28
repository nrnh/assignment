@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h3>{{ __('Dashboard') }}</h3>
            </div>
            <div class="col">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                    {{ Auth::user()->name }}, {{ __('you are logged in!') }} 
            </div>
            <div class="col">
                <button v-on:click="toggleHide()" class="btn">Back</button>
            </div>
        </div>
        <div class="row">
            <product-list></product-list>
            <product-view></product-view>
        </div>
    </div>

@endsection
