@extends('layouts.app')
@section('title', 'GameApp - Category Module')
@section('class', 'categories')

@section('content')
    
    <header>
        <a href="{{ url('dashboard') }}" class="btn-back">
            <img src="../images/btn-back.svg" alt="Back">
        </a>
        <h1>Users</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    <section>
        <div class="area">
            @include('menuburger')
            </nav>
            <a class="add" href="{{ url('categories/create') }}">
                <img src="../images/content-btn-add.svg" alt="Add">
            </a>

            <div class="options">
                <input type="text" name="qsearch" id="qsearch">   
            </div>
            <div class="loader"></div>
            <div id="list">            
            @foreach ($categories as $category)
                <article class="record">
                    <figure class="avatar">
                        <img class="mask" src="{{ asset('images') . '/' . $category->photo }}" alt="Photo">
                        <img class="border" src="../images/shape-border-small.svg" alt="Border">
                    </figure>
                    <aside>
                        <h3>{{ $category->fullname }}</h3>
                        <h4>{{ $category->role }}</h4>
                    </aside>
                    <figure class="actions">
                        <a href="{{ url('categories/' . $category->id) }}">
                            <img src="{{ asset('images/ico-search.svg') }}" alt="Show">
                        </a>
                        <a href="{{ url('categories/' . $category->id . '/edit') }}">
                            <img src="{{ asset('images/ico-edit.svg') }}" alt="Edit">
                        </a>


                        <a href="javascript:;" class="delete" data-fullname="{{ $category->fullname }}">
                            <img src="{{ asset('images/ico-trash.svg') }}" alt="Delete">
                        </a>
                        <form action="{{ url('categories/' . $category->id) }}" method="POST" style="display: none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </figure>
                </article>
            @endforeach
            </div>
        </div>
    </section>
    <div class="paginate">
        {{ $categories->links() }}
        <a class="btn-prev" href="javascript:;">
            <img src="{{ asset('images/btn-prev.svg') }}" alt="prev">
        </a>
        <span>01/03</span>
        <a class="btn-prev" href="javascript:;">
            <img src="{{ asset('images/btn-next.svg') }}" alt="next">
        </a>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.loader').hide()

            $('header').on('click', '.btn-burger', function() {
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

                
            });

            $('figure').on('click', '.delete', function() {
                    $fullname = $(this).data('data-fullname')

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!" + $fullname,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        toast: true,
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(this).next().submit()
                        }
                    })
                });
            
            $('body').on('keyup', '#qsearch', function(e) {
                e.preventDefault()
                $query = $(this).val()
                $token = $('input[name=_token]').val()
                $model = 'categories'
                $('.loader').show()
                $('.area').hide()

                setTimeout(() => {
                    $.post($model + '/search', {
                        q: $query,
                        _token: $token
                    },
                    function(data) {
                        $('#list').html(data)
                        $('.loader').hide()
                        $('#list').fadeIn('slow')
                    }
                )
                }, 2000);

                
            });            
        })
    </script>
@endsection
