@extends('dashboard.layout')

@section('content')
    <div class="pb-3"><a href="{{ route('education.index') }}" class="btn btn-secondary">
            << Go Back</a>
    </div>
    <form action="{{ route('education.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">University</label>
            <input type="text" class="form-control form-control-sm" name="title" id="title" aria-describedby="helpId"
                placeholder="Enter University name" value="{{ Session::get('title') }}">
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Faculty</label>
            <input type="text" class="form-control form-control-sm" name="info1" id="info1" aria-describedby="helpId"
                placeholder="Enter Faculty name" value="{{ Session::get('info1') }}">
        </div>
        <div class="mb-3">
            <label for="info2" class="form-label">Study Program</label>
            <input type="text" class="form-control form-control-sm" name="info2" id="info2" aria-describedby="helpId"
                placeholder="Enter Study Program" value="{{ Session::get('info2') }}">
        </div>
        <div class="mb-3">
            <label for="info3" class="form-label">GPA</label>
            <input type="text" class="form-control form-control-sm" name="info3" id="info3" aria-describedby="helpId"
                placeholder="Enter GPA value" value="{{ Session::get('info3') }}">
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
        <button class="btn btn-primary" name="save" type="submit">SAVE</button>
    </form>
@endsection