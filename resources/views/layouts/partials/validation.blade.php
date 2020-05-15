@if (count($errors->all()))
    <div class="callout callout-danger">
        <h4>Error!</h4>

        <ul class="errors">
            @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif