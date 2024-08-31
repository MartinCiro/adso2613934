@extends('layouts.app')
@section('title', 'GameApp - register')
@section('class', 'register')

@section('content')

<header>
    <a href="javascript:;" class="btn-back">
        <img src="images/btn-back.svg" alt="Back">
    </a>
    <h1>Register</h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path
            class="line top"
            d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path
            class="line middle"
            d="m 70,50 h -40" />
        <path
            class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>
<nav class="nav">
    <img src="images/title-menu.svg" alt="Menu" class="title-menu" >
    <menu>
        <a href="{{url('login')}}">
            <img src="images/ico-login.svg" alt="Login">
            Login
        </a>
        <a href="{{url('register')}}">
            <img src="images/ico-register.svg" alt="Register">
            Register
        </a>
        <a href={{url('catalogue')}}>
            <img src="images/ico-catalogue.svg" alt="Catalogue">
            Catalogue
        </a>
    </menu>
</nav>
<section class="scroll">
    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <img id="upload" class="mask" src="images/bg-upload-photo.svg" alt="photo">
            <img class="border" src="images/borde.svg" alt="border">
            <input id="photo" type="file" name="photo" accept="image/*">
        </div>
        <div class="form-group">
            <label>
                <img src="images/ico-document.svg" alt="document">
                Document:
            </label>
            <input type="text" name="document" placeholder="12323456" value="{{old('document')}}">
        </div>
        <div class="form-group">
            <label>
                <img src="images/ico-name.svg" alt="document">
                Fullname:
            </label>
            <input type="text" name="fullname" placeholder="Rosa Perez" value="{{old('fullname')}}">
        </div>
        <div class="form-group">
            <label>
                <img src="images/ico-gender.svg" alt="gender">
                Gender:
            </label>
            <input type="text" name="gender" placeholder="Female" value="{{old('gender')}}">
        </div>
        <div class="form-group">
            <label>
                <img src="images/ico-email-register.svg" alt="Email">
                Email:
            </label>
            <input type="email" name="email" value="{{old('email')}}" placeholder="dirlortr@gmail.com">
        </div>
        <div class="form-group">
            <label>
                <img src="images/ico-phone.svg" alt="phone">
                Phone Number:
            </label>
            <input type="text" value="{{old('phone')}}" name="phone" placeholder="320XXXXXXXX">
        </div>
        <div class="form-group">
            <label>
                <img src="images/ico-birthday.svg" alt="text">
                Birth Date:
            </label>
            <input type="text" value="{{old('birthdate')}}" name="birthdate" placeholder="1980-10-10">
        </div>
        <div class="form-group">
            <label>
                <img src="images/ico-password-register.svg" alt="password">
                Password:
            </label>
            <img class="ico-eye" src="images/ico-eye-open.svg" alt=" ">
            <input type="password" name="password" placeholder="dontmesswithmydog">
        </div>
        <div class="form-group">
            <label>
                <img src="images/ico-password-register.svg" alt="password">
                Confirm Password:
            </label>
            <img class="ico-eye" src="images/ico-eye-open.svg" alt=" ">
            <input type="password" name="password_confirmation" placeholder="dontmesswithmydog">
        </div>
        <div class="form-group">
            <button type="submit">
                <img src="images/content-btn-register.svg" alt="login">
            </button>
        </div>
    </form>
</section>
@endsection

@section('js')
<script>
    $(document).ready(function () {

        $('header').on('click', '.btn-burger', function(){
        $(this).toggleClass('active')
        $('.nav').toggleClass('active')
    })
    //----------------------------
    $togglePass = false
    $('section').on('click', '.ico-eye', function(){
        !$togglePass ? $(this).next().attr('type', 'text')
                    : $(this).next().attr('type', 'password')

        !$togglePass ? $(this).attr('src', 'images/ico-eye.svg')
                    : $(this).attr('src', 'images/ico-eye-open.svg')

        $togglePass = !$togglePass

    })
     //----------------------------
    $('.border').click(function(e) {
        $('#photo').click()
    })
    $('#photo').change(function(e){
        e.preventDefault()
        let reader = new FileReader()
        reader.onload = function(evt) {
            $('#upload').attr('src', event.target.result)
        }
        reader.readAsDataURL(this.files[0])
    })
     //----------------------------
    })
</script>
@if ($errors->any())
    @php $error = '' @endphp
    @foreach ($errors->all() as $message)
        @php $error .= '<li>' . $message . '</li>' @endphp
    @endforeach

    <script>
    $(document).ready(function(){
        Swal.fire({
            position: 'top',
            title: 'Ops !',
            html: '<ul>{!! $error !!}</ul>',
            icon: 'error',
            toast: true,
            showConfirmButton: false,
            timer: 5000
        })
    })
    </script>


@endif
@endsection