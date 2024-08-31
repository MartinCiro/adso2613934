@extends('layouts.app')
@section('title', 'GameApp - Catalogue')
@section('class', 'dashboard')

@section('content')
    <header>
        <img src="images/logo-dashboard.png" alt="">
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('menuburger')
    <section>
    <article class="module module-users">
                <aside>
                    <img src="images/ico-users.svg" alt="Users Module">
                    <span class="count-rows">{{ App\Models\User::count() }} Rows</span>
                    
                </aside>
                <aside>
                    <h2>Users</h2>
                    <a href="{{ url ('users') }}" class="btn-more">                        
                        view
                    </a>
                </aside>
            </article>
            <article class="module module-cats">
                <aside>
                    <img src="images/ico-cats.svg" alt="Categories Module">
                    <span class="count-rows">{{ App\Models\Category::count() }} Rows</span>
                </aside>
                <aside>
                    <h2>Categories</h2>
                    <a href="{{ url ('categories') }}" class="btn-more">                        
                        view
                    </a>
                </aside>
            </article>
            <article class="module module-games">
                <aside>
                    <img src="images/ico-games.svg" alt="Games Module">
                    <span class="count-rows">{{ App\Models\Game::count() }} Rows</span>
                </aside>
                <aside>
                    <h2>Games</h2>
                    <a class="btn-more"  href="/07-layout/games/games.html">
                    view
                    </a>
                </aside>
            </article>
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