@extends('layouts.app')
@section('title', 'GameApp - login')
@section('class', 'login')

@section('content')
    <header>
        <a href="javascript:;" class="btn-back">
            <img src="{{asset('btn-back.svg')}}" alt="Back">
        </a>
        <h2 class="titleLogin">Login</h2>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20">
            </path>
            <path class="line middle" d="m 70,50 h -40"></path>
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20"></path>
        </svg>
    </header>
    <nav class="nav">
        <img src="images/title-menu.svg" alt="Menu" class="title-menu">
        <menu>
            <a href={{ url('login') }}>
                <img src="images/ico-login.svg" alt="Login">
                Login
            </a>
            <a href={{ url('register') }}>
                <img src="images/ico-register.svg" alt="Register">
                Register
            </a>
            <a href={{ url('catalogue') }}>
                <img src="images/ico-catalogue.svg" alt="Catalogue">
                Catalogue
            </a>
        </menu>
    </nav>
    <section>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>
                    <img src="images/ico-email.svg" alt="Email">
                    Email:
                </label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="johnwick@gmail.com"
                    maxlength="30">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="form-group">
                <label>
                    <img src="images/ico-password.svg" alt="Password">
                    Password:
                </label>
                <img class="ico-eye" src="images/ico-eye-open.svg" alt="Eye">
                <input type="password" name="password" placeholder="dontmesswithmydog">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="form-group">
                <button>
                    <img src="images/content-btn-login.svg" alt="login">
                </button>
                <a href="">Forgot your password ?</a>
            </div>
        </form>
    </section>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            })
            // -------------------------------------
            $togglePass = false
            $('section').on('click', '.ico-eye', function() {
                !$togglePass ? $(this).next().attr('type', 'text') :
                    $(this).next().attr('type', 'password')

                    !$togglePass ? $(this).attr('src', 'images/ico-eye.svg') :
                    $(this).attr('src', 'images/ico-eye-open.svg')
                $togglePass = !$togglePass
            })
        })
    </script>
@endSection
