@if (count($errors) > 0)
    <div class="alert alert-danger mt-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::has('success'))
    <div class="alert alert-info mt-4">
        {!! Session::get('success') !!}
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger mt-4">
        {!! Session::get('error') !!}
    </div>
@endif

