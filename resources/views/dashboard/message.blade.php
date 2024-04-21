@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $items)
                <li>{{$items}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('success'))
    <div
        class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif