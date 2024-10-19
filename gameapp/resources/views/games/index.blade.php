@extends('layouts.app')
@section('title', 'GameApp - Users Module')
@section('class', 'users')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <header>
        <a href="{{ url('dashboard') }}" class="btn-back">
            <img src="../images/btn-back.svg" alt="Back">
        </a>
        <h1>Games</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('menuburger')
    </nav>
    <section>
        <div class="area">
            <a class="add" href="{{ url('games/create') }}">
                <img src="{{ asset('images/content-btn-add.svg') }}" alt="Add">
            </a>           
            <div class="options">
                <a href="{{ url ('export/games/pdf') }}">
                    <img src="{{ asset('images/btn-export-pdf.svg')}}" alt="Pdf">
                </a>
                <a href="{{ url ('export/games/excel') }}">
                    <img src="{{ asset('images/btn-export-excel.svg')}}" alt="Excel">                    
                </a>
                <input type="text" name="qsearch" id="qsearch" placeholder="Search">
            </div>            
            <div class="loader"></div>
            <div id="list">
            @foreach ($games as $game)
                <article class="record">
                    <figure class="avatar">
                        <img class="mask" src="{{ asset('images') . '/' . $game->image }}" alt="Photo">
                        <img class="border" src="{{ asset('images/shape-border-small.svg') }}" alt="Border">
                    </figure>
                    <aside>
                        <h3>{{ $game->title }}</h3>
                        <h4>{{ $game->category->name }}</h4>
                    </aside>
                    <figure class="actions">
                        <a href="{{ url('games/' . $game->id) }}">
                            <img src="../images/ico-search.svg" alt="Show">
                        </a>
                        <a href="{{ url('games/' . $game->id . '/edit') }}">
                            <img src="../images/ico-edit.svg" alt="Edit">
                        </a>
                        <a href="javascript:;" class="delete" data-fullname="{{ $game->title }}">
                            <img src="{{ asset('images/ico-trash.svg') }}" alt="Delete">
                        </a>
                        <form action="{{ url('games/' . $game->id) }}" method="POST" style="display: none">
                            @csrf
                            @method('delete')
                        </form>
                    </figure>
                </article>
            @endforeach
        </div>
        </div>
    </section>
    <div class="paginate">
        <!-- {{ $games->links() }} -->
        {{ $games->links('layouts.paginator') }}
        </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.loader').hide()
            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            })

            //----------
            @if (session('message'))
                Swal.fire({
                    position: "top",
                    title: '{{ session('message') }}',
                    icon: "success",
                    toast: true,
                    timer: 5000
                })
            @endif
            //------------------  

            $('figure').on('click', '.delete', function() {
                $title = $(this).attr('data-fullname')

                Swal.fire({
                    title: "Are you sure?",
                    text: "Desesa eliminar a: " + $title,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#240b34",
                    toast:true,
                    cancelButtonColor: "#891652",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).next().submit()
                }
                });
            })
            //-------------------------------- bloque para el input de buscar
            $('body').on('keyup', '#qsearch', function (e){
                e.preventDefault()
                $query = $(this).val()
                $token = $('input[name=_token]').val()
                $model = 'games'    
                
                $('.loader').show()
                $('#list').hide()

                setTimeout(() => {                 
                    $.post($model + '/search',
                        { q: $query, _token: $token },
                    function (data) {
                        $('#list').html(data)
                        $('.loader').hide()
                        $('#list').fadeIn('slow')
                                                                        
                    }                    
                )
            }, 1000);
            })
            //----------------------------------_
        })
    </script>
@endsection