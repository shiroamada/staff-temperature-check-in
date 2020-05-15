@if (Session::has('errors'))
    <div class="callout callout-danger">
        <h4>Error!</h4>
        <ul>
        @foreach ($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
        </ul>
    </div>
@endif

@if (Session::has('error'))
    <div class="callout callout-danger">
        <h4>Error!</h4>
        {{ Session::get('error') }}
    </div>
@endif

@if (Session::has('success'))
    <div class="callout callout-success">
        <h4>Success!</h4>

        {{ Session::get('success') }}
    </div>
@endif