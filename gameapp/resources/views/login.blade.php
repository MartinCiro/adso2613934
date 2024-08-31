@extends('layouts.app')
@section('title', 'GameApp - Login')
@section('classMain', 'login')

@section('content')


    <header>
        <a href="javascript:history.back()">
            <img class="back" src="images/back.svg" alt="menu">
        </a>
        <img class="logo" src="images/logo-login.svg" alt="Logo">
        <img class="btn-burger" src="images/menu.svg" alt="menu">
    </header>

    <nav class="nav"></nav>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
<section>
    <form method="POST" class="frmLogin" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <img src="images/icon-email.svg" alt="Login">
            Email:
        </div>
        
        <div>
            <x-input-label for="email" :value="__('')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <img src="images/icon-pass.svg" alt="Login">
            Password:
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</section>
@endsection

@section('js')

    <script>
        $(document).ready(function() {

            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active');
                $(".nav").load("/menu");

                if ($(this).attr('src') === 'images/menu.svg') {
                    $(this).attr('src', 'images/icon-x.svg');
                } else {
                    $(this).attr('src', 'images/menu.svg');
                }

                $('.nav').toggleClass('active')
            })
        });
    </script>
@endsection
