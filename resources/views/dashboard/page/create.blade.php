@extends('dashboard.layout')

@section('content')
    <div class="pb-3"><a href="{{ route('page.index') }}" class="btn btn-secondary">
            << Go Back</a>
    </div>
    <form action="{{ route('page.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control form-control-sm" name="title" id="title" aria-describedby="helpId"
                placeholder="Enter Title" value="{{ Session::get('title') }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control summernote" rows="5" name="content">{{ Session::get('content') }}</textarea>
        </div>
        <button class="btn btn-primary" name="save" type="submit">SAVE</button>
    </form>
@endsection