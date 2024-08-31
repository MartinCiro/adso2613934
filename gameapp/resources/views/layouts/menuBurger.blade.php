@auth


@endauth

@guest
@if (count($errors->all())>0)
    @php $error = '' @endphp
    @foreach ($errors->all() as $message)
        @php $errors = '<li>' . $message . $error; 
    @endforeach 
@endif

@if (count($errors->all())>0)
    @php $error = '' @endphp
    @foreach ($errors->all() as $message)
        @php $errors = '<li>' . $message . $error; 
    @endforeach 
@endif

@endguest