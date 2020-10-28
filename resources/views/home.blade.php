@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row my-3 d-flex justify-content-between home-header">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <p class="my-1">{{ Auth::user()->name }}, {{ __(' welcome back!') }} </p>
           
            <svg class="my-2" v-on:click="toggleHide()" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 10.321 10.003">
                <g id="Group_2" data-name="Group 2" transform="translate(-50.611 -51.985)">
                    <path id="Path_3" data-name="Path 3" d="M55.966,52.339l-4.648,4.648,4.648,4.648" fill="none" stroke="#707070" stroke-width="1"/>
                    <path id="Path_4" data-name="Path 4" d="M51.318,56.987h9.614" fill="none" stroke="#707070" stroke-width="1"/>
                </g>
            </svg>
        </div>

        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success w-100" role="alert">
                    {{ $message }}
                </div>
            @endif
        </div>

        <div class="row">
            <product-list></product-list>
            <product-view></product-view>
        </div>
    </div>
    
@endsection
