@extends('layouts.app')
@section('title', 'GameApp - Show User')
@section('class', 'myprofile show')

@section('content')
<header>
    <a href="{{ url('users') }}" class="btn-back">
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
            <img id="upload" class="mask" src="{{ asset('images') . '/' . $user->photo }}" height="160px" alt="Photo">
            <img class="border" src="{{ asset('images/shape-border-small.svg') }}" alt="Border">
        </div>
        <div class="nombre-email">
            <h2>
                {{ $user->fullname }}
            </h2>
            <span class="role">
                {{ $user->role }}
            </span>
            <b>
                {{ $user->email }}
            </b>
        </div>
        <div class="ico-admin-profile">
            <img src="{{ asset('images/ico-myprofile.svg') }}" alt="Login">
            <h1 color=black> {{ $user->role }} </h1>
            {{-- <img src="images/ico-admin-profile.svg" alt="Login"> --}}
        </div>
        <div class="datos">
            <div class="cedula">
                <img src="{{ asset('images/ico-profile.svg') }}" alt="Login">
                <h1>
                    {{ $user->document }}
                </h1>
            </div>
            <div class="telefono">
                <img src="{{ asset('images/ico-profile.svg') }}" alt="Login">
                <h1>
                    {{ $user->phone }}
                </h1>
            </div>
            <div class="estado">
                <img src="{{ asset('images/ico-profile.svg') }}" alt="Login">
                <h1>
                    ACTIVE
                </h1>
            </div>
            <div class="sexo">
                <img src="{{ asset('images/icon-profile.svg') }}" alt="Login">
                <h1>
                    {{ $user->gender }}
                </h1>
            </div>
            <div class="fecha-nac">
                <img src="{{ asset('images/ico-profile.svg') }}" alt="Login">
                <h1>
                    {{ $user->birthdate }}
                </h1>
            </div>
            <div class="direccion">
                <img src="{{ asset('images/ico-profile.svg') }}" alt="Login">
                <h1>
                    STR 23-45
                </h1>
            </div>
        </div>
    </div>
</section>
<section>
    <figure class="avatar" >
       <img src="{{ asset('images/photo.jpg') }}" alt="">
    </figure>
    <h2>{{ $user->fullname }}</h2>
    <span class="email"><b>{{ $user->email }}</b></span>
    <span class="role">
        <img src="{{ asset('images/ico-role.svg') }}" alt="role">
        <b>{{ $user->role }}</b>
    </span>
    <div class="grid">
        <span class="data data-id">
        <img src="{{ asset('images/ico-data-id.svg') }}" alt="Id">
        <b>{{ $user->document }}</b>
        </span>
        <span class="data data-address">
            <img src="{{ asset('images/ico-data-address.svg') }}" alt="Address">
            <b>Str 16A # 3-64</b>
        </span>
        <span class="data data-phone-number">
            <img src="{{ asset('images/ico-data-phone-number.svg') }}" alt="Phone Number">
            <b>3147348430</b>
        </span>
        <span class="data data-birth-date">
            <img src="{{ asset('images/data-birth-date.svg') }}" alt="Birth Date">
            <b>14/06/1989</b>
        </span>
        <span class="data data-gender">
            <img src="{{ asset('images/ico-data-gender.svg') }}" alt="Gender">
            <b>Female</b>
        </span>
        <span class="data data-status">
            <img src="{{ asset('images/ico-data-status.svg') }}" alt="Status">
            <b>Active</b>
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
            //este sirve para el ojito de la contraseña
        //-------------------------------------------------
        $togglePass = false
        $('section').on('click','.ico-eye', function(){

            !$togglePass ? $(this).next().attr('type', 'text')
                         : $(this).next().attr('type', 'password')

            !$togglePass ? $(this).attr('src', "{{ asset('images/ico-eye-close.svg') }}")
                         : $(this).attr('src', "{{ asset('images/ico-eye.svg') }}")
            
            $togglePass = !$togglePass     
        });
        //--------------------------------------------
    </script>
@endsection