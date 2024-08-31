@if ($paginator->hasPages())

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="btn-prev" href="javascript:;">
                    <img src="{{asset('images/btn-prev.svg')}}" alt="Prev">
                </a>
            @else
                <a class="btn-prev" href="{{ $paginator->previousPageUrl() }}">
                    <img src="{{ asset('images/btn-prev.svg')}}" alt="Prev">
                </a>                
            @endif
            <span>{{ $paginator->currentPage() .'/'. $paginator->LastPage() }}</span>
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="btn-next" href="{{ $paginator->nextPageUrl() }}">
                    <img src="{{ asset('images/btn-next.svg')}}" alt="Next">
                </a>
            @else
                <a class="btn-next" href="javascript:;">
                    <img src="{{ asset('images/btn-next.svg') }}" alt="Next">
                </a>
            @endif
@endif