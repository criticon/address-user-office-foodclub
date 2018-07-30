@if(isset($errors) and count($errors) > 0)
    @foreach($errors->all() as $error)
        <div>
            {{ $error }}
        </div>
    @endforeach
@endif
