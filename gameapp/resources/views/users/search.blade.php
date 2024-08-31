@forelse ($users as $user)
@foreach ( $users as $user )
    

<article class="record">
    <figure class="avatar">
        <img class="mask" src="{{ asset('images') . '/' . $user->photo }}" alt="Photo">
        <img class="border" src="../images/shape-border-small.svg" alt="Border">
    </figure>
    <aside>
        <h3>{{ $user->fullname }}</h3>
        <h4>{{ $user->role }}</h4>
    </aside>
    <figure class="actions">
        <a href="{{ url('users/' . $user->id) }}">
            <img src="{{ asset('images/ico-search.svg') }}" alt="Show">
        </a>
        <a href="{{ url('users/' . $user->id . '/edit') }}">
            <img src="{{ asset('images/ico-edit.svg') }}" alt="Edit">
        </a>


        <a href="javascript:;" class="delete" data-fullname="{{ $user->fullname }}">
            <img src="{{ asset('images/ico-trash.svg') }}" alt="Delete">
        </a>
        <form action="{{ url('users/' . $user->id) }}" method="POST" style="display: none">
            @csrf
            @method('DELETE')
        </form>
    </figure>
</article>
@endforeach
@empty
    No found
@endforelse