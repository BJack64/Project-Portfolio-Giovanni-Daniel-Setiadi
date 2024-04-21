@extends('dashboard.layout')

@section('content')
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between">
            <div class="col-5">
                <h3>Profile</h3>
                @if (get_meta_value('_photo'))
                <img style="max-width:100px;max-heightL100px" src={{asset('photo')."/".get_meta_value('_photo')}}>
                @endif
                <div class="mb-3">
                    <label for="_photo" class="form-label">Photo</label>
                    <input type="file" class="form-control form-control-sm" name="_photo" id="_photo">
                </div>
                <div class="mb-3">
                    <label for="_city" class="form-label">City</label>
                    <input type="text" class="form-control form-control-sm" name="_city" id="_city" value="{{get_meta_value('_city')}}">
                </div>
                <div class="mb-3">
                    <label for="_prov" class="form-label">Province</label>
                    <input type="text" class="form-control form-control-sm" name="_prov" id="_prov" value="{{get_meta_value('_prov')}}">
                </div>
                <div class="mb-3">
                    <label for="_phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control form-control-sm" name="_phone" id="_phone" value="{{get_meta_value('_phone')}}">
                </div>
                <div class="mb-3">
                    <label for="_email" class="form-label">Email</label>
                    <input type="text" class="form-control form-control-sm" name="_email" id="_email" value="{{get_meta_value('_email')}}">
                </div>
            </div>
            <div class="col-5">
                <h3>Media Social</h3>
                <div class="mb-3">
                    <label for="_ig" class="form-label">Instagram</label>
                    <input type="text" class="form-control form-control-sm" name="_ig" id="_ig" value="{{get_meta_value('_ig')}}">
                </div>
                <div class="mb-3">
                    <label for="_dc" class="form-label">Discord</label>
                    <input type="text" class="form-control form-control-sm" name="_dc" id="_dc" value="{{get_meta_value('_dc')}}">
                </div>
                <div class="mb-3">
                    <label for="_lin" class="form-label">LinkedIn</label>
                    <input type="text" class="form-control form-control-sm" name="_lin" id="_lin" value="{{get_meta_value('_lin')}}">
                </div>
                <div class="mb-3">
                    <label for="_gh" class="form-label">GitHub</label>
                    <input type="text" class="form-control form-control-sm" name="_gh" id="_gh" value="{{get_meta_value('_gh')}}">
                </div>
            </div>
        </div>
        <button class="btn btn-primary" name="save" type="submit">SAVE</button>
    </form>
@endsection