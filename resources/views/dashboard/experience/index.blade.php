@extends('dashboard.layout')

@section('content')
    <p class="card-title">Experience</p>
    <div class="pb-3"><a href="{{route('experience.create')}}" class="btn btn-primary">+ Add New Experience</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Position</th>
                    <th>Company Name</th>
                    <th>Start Date</th>
                    <th>Finish Date</th>
                    <th class="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->info1}}</td>
                        <td>{{$item->start_date_indo}}</td>
                        <td>{{$item->finish_date_indo}}</td>
                        <td>
                            <a href='{{route('experience.edit', $item->id)}}' class="btn btn-sm btn-warning">Edit</a>
                            <form onsubmit="return confirm('Are you sure?')"action="{{route('experience.destroy', $item->id)}}"
                            class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                                <button class="btn btn-danger" type="submit" name ="submit">Del</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++?>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection