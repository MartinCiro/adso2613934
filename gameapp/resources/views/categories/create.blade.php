@extends('layouts.app')
@section('title', 'GameApp - Create User')
@section('class', 'add register addUsers')

@section('content')

<header>
    <a href="javascript:;" class="btn-back">
        <img src="{{asset('images/btn-back.svg')}}" alt="Back">
    </a>
    <h1>Add</h1>
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
@include('menuburger')
<section class="scroll">
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <img id="upload" class="mask" src="{{asset('images/bg-upload-photo.svg')}}" alt="photo">
            <img class="border" src="{{asset('images/borde.svg')}}" alt="border">
            <input id="photo" type="file" name="image" accept="image/*">
        </div>
        <div class="form-group">
            <label>
                <img src="{{asset('images/ico-document.svg')}}" alt="name">
                Name:
            </label>
            <input type="text" name="name" placeholder="gameBox" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label>
                <img src="{{asset('images/ico-name.svg')}}" alt="document">
                Manufacturer:
            </label>
            <input type="text" name="manufacturer" placeholder="Microsoft" value="{{old('manufacturer')}}">
        </div>
        <div class="form-group">
            <label>
                <img src="{{asset('images/ico-name.svg')}}" alt="document">
                Description:
            </label>
            <input type="text" name="description" placeholder="Microsoft" value="{{old('description')}}">
        </div>
        <div class="form-group">
            <label>
                <img src="{{asset('images/ico-name.svg')}}" alt="document">
                Releasedate:
            </label>
            <input type="date" name="releasedate" value="{{old('releasedate')}}">
        </div>
        <div class="form-group">
            <button type="submit">
                <img src="{{asset('images/content-btn-register.svg')}}" alt="login">
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

        @if (session('message'))
            Swal.fire({
                position: 'top',
                icon: 'success',
                title: '{{ session('message') }}',
                toast: true,
                timer: 5000
            })
        @endif
        
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