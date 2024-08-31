@extends('layouts.app')
@section('title', 'GameApp - Welcome')
@section('class', 'welcome')

@section('content')
    <header>
        <img src="images/logo-welcome.svg" alt="Logo">
    </header>
    <section class="slider owl-carousel owl-theme" id="my-list">
        <img src="{{ asset('images/slide01.svg') }}" alt="Slide01">
        <img src="{{ asset('images/slide01.svg') }}" alt="Slide02">
        <img src="{{ asset('images/slide01.svg') }}" alt="Slide03">
    </section>
    <footer>
        <a href="{{ url('catalogue') }}" class="btn btn-explore">
            <img src="images/btn-content.svg" alt="">
        </a>
    </footer>
@endsection

@section('js')
    <script>
         $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                center: true,
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    }
                }
            })
        })
    </script>
@endSection