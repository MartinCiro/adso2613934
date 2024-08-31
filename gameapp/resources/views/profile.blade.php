@extends('layouts.app')
@section('title', 'GameApp - profile')
@section('classMain', 'my-profile')

@section('content')

    <header>
        <a href="javascript:history.back()">
            <img class="back" src="images/back.svg" alt="menu">
        </a>
        <img class="logo" src="images/logo-profile.svg" alt="Logo">
        <img class="btn-burger" src="images/menu.svg" alt="menu">
    </header>

    <nav class="nav">
        @include('partials.menulogin')
    </nav>

    <section class="scroll">

        <div class="imgUpload">
            {{-- <img src="img/{{ $user->photo }}" class="upload" alt="upload photo"> --}}
        </div>
        <div class="personalDate">
            <div class="name">
                {{ $user->fullname}}
            </div>

            <div class="email">
                {{ $user->email }}
            </div>

            <div class="rol">
                {{ $user->role }}
            </div>
        </div>

        <div class="profileData">
            <div>
                <div>{{ $user->document}}</div>
                <div>{{ $user->phone }}</div>
            </div>
            <div>
                <div>Active</div>
                <div>{{ $user->gender }}</div>
            </div>
            <div>
                <div>{{ $user->birthdate}}</div>
                <div>{{ $user->created_at}}</div>
            </div>
        </div>
    </section>

@endsection

@section('js')

    <script>
        $(document).ready(function() {

            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active');

                if ($(this).attr('src') === 'images/menu.svg') {
                    $(this).attr('src', 'images/icon-x.svg');
                } else {
                    $(this).attr('src', 'images/menu.svg');
                }

                $('.nav').toggleClass('active');
            });
        });
    </script>

@endsection
