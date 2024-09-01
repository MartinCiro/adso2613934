@extends('layouts.app')
@section('title', 'GameApp - Show User')
@section('class', 'myprofile show')

@section('content')
<header>
    <a href="{{ url('categories') }}" class="btn-back">
        <img src="{{ asset('images/btn-back.svg') }}" alt="Back">
    </a>
    <h1>Show</h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top"
            d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>
@include('menuburger')
<section>
    <div class="myprofile">
        <div class="img">
            <img id="upload" class="mask" src="{{ asset('images') . '/' . $category->image }}" height="160px" alt="Photo">
            <img class="border" src="{{ asset('images/shape-border-small.svg') }}" alt="Border">
        </div>
        <h2>{{ $category->name }}</h2>
        <div class="grid">
            <span >
                <b>{{ $category->manufacturer }}</b>
            </span>
            <span>
                <b>{{ $category->releasedate }}</b>
            </span>
            <span>
                <b>{{ $category->description }}</b>
            </span>
        </div>
</section>
@endsection

@section('js')
    <script>
  
        //-------------------------------------------------
        $('header').on('click','.btn-burger', function(){
            $(this).toggleClass('active')
            $('.nav').toggleClass('active')
        });
        //-------------------------------------------------
        
    </script>
@endsection