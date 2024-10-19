@extends('layouts.app')
@section('title', 'GameApp - Show User')
@section('class', 'my-profile')

@section('content')
    <header>
        <a href="{{ url ('games') }}" class="btn-back">
            <img src="../images/btn-back.svg" alt="Back">
        </a>
        <img src="{{ asset ('images/logo-dashboard.png') }}" alt="">
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('menuburger')
    <section>
    <figure class="avatar">          
            <img class="mask" src="{{asset ('images') . '/' . $game->image }}" alt="Photo">
            <img class="border" src="{{ asset ('images/borde2.svg') }}" alt="border">
        </figure>
        <h2>{{ $game->title }}</h2>
        <span class="email"><b>{{ $game->developer }}</b></span>
        <span class="role">
        <img src="{{ asset ('images/ico-role.svg') }}" alt="role">
        <h4>{{ $game->price }}</h4>
        </span>
        <div class="grid">
                <span class="data data-id">
                <img src="{{ asset ('images/ico-data-id.svg')}}" alt="Id">
                <b>{{ $game->title }}</b>
                </span>
                <span class="data data-address">
                    <img src="{{ asset ('images/ico-data-address.svg') }}" alt="Address">
                    <b>{{ $game->genre }}</b>
                </span>                
                <span class="data data-birth-date">
                    <img src="{{asset ('images/data-birth-date.svg') }}" alt="Birth Date">
                    <b>{{ $game->releasedate }}</b>
                </span>
                <span class="data data-slider">
                    <img src="{{ asset ('images/ico-data-status.svg')}}" alt="Status">
                    @if ($game->slider = 1)
                        <b>Active</b>
                    @else
                        <b>Inactive</b>
                    @endif
                </span>
                <span class="data data-gender">
                    <img src="{{ asset('images/ico-data-gender.svg') }}" alt="Gender" class="inline-block mr-2">
                    <div class="w-full max-w-md p-4 border border-gray-300 bg-gray-100 rounded-md">
                    <b>{{ $game->description }}</b>
                    </div>
                </span>
              
                
            </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            })          
        })
    </script>
@endsection