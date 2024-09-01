@forelse ($categories as $category)
<article class="record">
    <figure class="avatar">
        <img class="mask" src="{{ asset('images'). '/' . $category->image }}" alt="Photo" />
        <img class="border" src="{{ asset('images/border-small.svg') }}" alt="Border" />
    </figure>
    <aside>
        <h3>{{ $category->name }}</h3>
    </aside>
    <figure class="actions">
        <a href="{{ url('categories/' . $category->id) }}">
            <img src="{{ asset('images/ico-search.svg') }}" alt="Show" />
        </a>
        <a href="{{ url('categories/' . $category->id . '/edit') }}">
            <img src="{{ asset('images/ico-edit.svg') }}" alt="Edit" />
        </a>
        <a href="javascript:;" class="delete" data-fullname="{{ $category->name }}">
            <img src="{{ asset('images/ico-trash.svg') }}" alt="Delete" />
        </a>
        <form action="{{ url('categories/' . $category->id) }}" method="post" style="display: none">
            @csrf
            @method('delete')
        </form>
    </figure>
</article>
@empty
    No found 🥵
@endforelse