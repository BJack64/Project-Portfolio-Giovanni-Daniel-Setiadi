@extends('dashboard.layout')

@section('content')
    <form action="{{ route('skill.update') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Programming Languages & Tools</label>
            <input type="text" class="form-control form-control-sm skill" name="_lang" id="title" aria-describedby="helpId"
                placeholder="Enter Programming Languages & Tools" value="{{get_meta_value('_lang')}}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Workflow</label>
            <textarea class="form-control summernote" rows="5" name="_workflow">{{get_meta_value('_workflow')}}</textarea>
        </div>
        <button class="btn btn-primary" name="save" type="submit">SAVE</button>
    </form>
@endsection

@push('child-scripts')
<script>
    $(document).ready(function() {
        $('.skill').tokenfield({
            autocomplete: {
                source: [{!! $skill !!}],
                delay: 100
            },
            showAutocompleteOnFocus: true
        });
    });
  </script>    
@endpush