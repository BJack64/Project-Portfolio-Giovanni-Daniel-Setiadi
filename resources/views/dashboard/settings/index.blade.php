@extends('dashboard.layout')

@section('content')
    <form action="{{ route('settings.update') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2">About</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_about">
                    <option value="">-Choose-</option>
                    @foreach ($pagedata as $item)
                        <option value="{{$item->id}}" {{get_meta_value('_about') == $item->id?'selected':''}}>{{$item->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Interest</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_interest">
                    <option value="">-Choose-</option>
                    @foreach ($pagedata as $item)
                        <option value="{{$item->id}}" {{get_meta_value('_interest') == $item->id?'selected':''}}>{{$item->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Award</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_award">
                    <option value="">-Choose-</option>
                    @foreach ($pagedata as $item)
                        <option value="{{$item->id}}" {{get_meta_value('_award') == $item->id?'selected':''}}>{{$item->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button class="btn btn-primary" name="save" type="submit">SAVE</button>
    </form>
@endsection