@extends('layouts.app')
@section('title', 'GameApp - Catalogue')
@section('class', 'catalogue')

@section('content')
    <header>
        <a href="{{ url('/') }}" class="btn-back">
            <img src="images/btn-back.svg" alt="Back">
        </a>
        <img src="images/logo-welcome.svg" alt="Logo" class="logo-top">
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>


    <nav class="nav">
        <h2 class="tt">Menu</h2>
        <menu>
            <a href="{{ route('login') }}" >
                <img src="images/icon-login.svg" alt="Login">Login
            </a>
            <a href="{{ url('register') }}" >
                <img src="images/icon-register.svg" alt="Register">Register
            </a>
            <a href="{{ url('catalogue') }}">
                <img src="images/icon-catalogue.svg" alt="Catalogue">Catalogue
            </a>
        </menu>
    </nav>
    <section class="scroll">
        <form action="" method="post">
            <input type="text">
            <div class="search"></div>
        </form>
        <article id="carousel-container">
            <h2>
                <img src="images/icon-category.svg" alt="Category">Play station
            </h2>
            <div class="owl-carousel owl-theme">
                <figure>
                    <img src="images/slide-c1-01.svg" id="slide" alt="" class="slide">
                    <figcaption>Candy Crush</figcaption>
                    <a href="view-game.html" class="btn-more">
                        view
                    </a>
                </figure>
                <figure>
                    <img src="images/slide-c1-02.svg" alt="" class="slide">
                    <figcaption>Pokemon Go</figcaption>
                    <a href="view-game.html" class="btn-more">
                        <img src="" alt="">view
                    </a>
                </figure>
                <figure>
                    <img src="images/slide-c1-03.svg" alt="" class="slide">
                    <figcaption>FIFA</figcaption>
                    <a href="view-game.html" class="btn-more">
                        <img src="" alt="">view
                    </a>
                </figure>
            </div>
        </article>
        <article id="carousel-container">
            <h2>
                <img src="images/icon-category.svg" alt="Category">Xbox
            </h2>
            <div class="owl-carousel owl-theme">
                <figure>
                    <img src="images/slide-c1-01.svg" id="slide" alt="" class="slide">
                    <figcaption>Candy Crush</figcaption>
                    <a href="view-game.html" class="btn-more">
                        view
                    </a>
                </figure>
                <figure>
                    <img src="images/slide-c1-02.svg" alt="" class="slide">
                    <figcaption>Pokemon Go</figcaption>
                    <a href="view-game.html" class="btn-more">
                        <img src="" alt="">view
                    </a>
                </figure>
                <figure>
                    <img src="images/slide-c1-03.svg" alt="" class="slide">
                    <figcaption>FIFA</figcaption>
                    <a href="view-game.html" class="btn-more">
                        <img src="" alt="">view
                    </a>
                </figure>
            </div>
        </article>
        <article id="carousel-container">
            <h2>
                <img src="images/icon-category.svg" alt="Category">Playstation 4
            </h2>
            <div class="owl-carousel owl-theme">
                <figure>
                    <img src="images/slide-c1-01.svg" id="slide" alt="" class="slide">
                    <figcaption>Candy Crush</figcaption>
                    <a href="view-game.html" class="btn-more">
                        view
                    </a>
                </figure>
                <figure>
                    <img src="images/slide-c1-02.svg" alt="" class="slide">
                    <figcaption>Pokemon Go</figcaption>
                    <a href="view-game.html" class="btn-more">
                        <img src="" alt="">view
                    </a>
                </figure>
                <figure>
                    <img src="images/slide-c1-03.svg" alt="" class="slide">
                    <figcaption>FIFA</figcaption>
                    <a href="view-game.html" class="btn-more">
                        <img src="" alt="">view
                    </a>
                </figure>
            </div>
        </article>
    </section>
@endsection

@section('js')
<script>
    $(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        responsive: {
            0: {
                items: 2
            }/* ,
            600: {
                items: 3
            },
            1000: { //resolucion de 1000 maneja 5 items
                items: 1
            } */
        }
    })
    $('header').on('click', '.btn-burger', function () {
        $(this).toggleClass('active')
        $('.nav').toggleClass('active')
    })
})
</script>
@endSection
