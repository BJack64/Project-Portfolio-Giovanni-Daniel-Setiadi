@extends('dashboard.layout')

@section('content')
    <div class="pb-3"><a href="{{ route('experience.index') }}" class="btn btn-secondary">
            << Go Back</a>
    </div>
    <form action="{{ route('experience.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Position</label>
            <input type="text" class="form-control form-control-sm" name="title" id="title" aria-describedby="helpId"
                placeholder="Enter Position" value="{{ Session::get('title') }}">
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Company</label>
            <input type="text" class="form-control form-control-sm" name="info1" id="info1" aria-describedby="helpId"
                placeholder="Enter Company name" value="{{ Session::get('info1') }}">
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Start Date</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" 
                    name="start_date" placeholder="dd/mm/yy" value="{{Session::get('start_date')}}"></div>
                <div class="col-auto">Finish Date</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" 
                    name="finish_date" placeholder="dd/mm/yy" value="{{Session::get('finish_date')}}"></div>
            </div>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Description</label>
            <textarea class="form-control summernote" rows="5" name="content">{{ Session::get('content') }}</textarea>
        </div>
        <button class="btn btn-primary" name="save" type="submit">SAVE</button>
    </form>
@endsection