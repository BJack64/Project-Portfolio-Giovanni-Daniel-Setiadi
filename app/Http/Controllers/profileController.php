<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class profileController extends Controller
{
    public function index(){
        return view('dashboard.profile.index');
    }

    public function update(Request $request) {
        $request->validate([
            '_photo' => 'mimes:jpeg,jpg,png,gif',
            '_email' => 'required|email',

        ],[
            '_photo.mimes' => 'Allowed photo extensions are .jpeg, .jpg, .png and .gif',
            '_email.required' => 'Email is required',
            '_email.email' => 'Email format is not valid',
        ]);

        if($request->hasFile('_photo')) {
            $photo_file = $request->file('_photo');
            $photo_ext = $photo_file->extension();
            $photo_new = date('ymdhis').".$photo_ext";
            $photo_file->move(public_path('photo'), $photo_new);
            
            // if photo file is to be changed
            $photo_old = get_meta_value('_photo');
            File::delete(public_path('photo')."/".$photo_old);

            metadata::updateOrCreate(['meta_key'=>'_photo'], ['meta_value'=>$photo_new]);
        }

        metadata::updateOrCreate(['meta_key'=>'_email'], ['meta_value'=>$request->_email]);
        metadata::updateOrCreate(['meta_key'=>'_city'], ['meta_value'=>$request->_city]);
        metadata::updateOrCreate(['meta_key'=>'_prov'], ['meta_value'=>$request->_prov]);
        metadata::updateOrCreate(['meta_key'=>'_phone'], ['meta_value'=>$request->_phone]);
        metadata::updateOrCreate(['meta_key'=>'_ig'], ['meta_value'=>$request->_ig]);
        metadata::updateOrCreate(['meta_key'=>'_dc'], ['meta_value'=>$request->_dc]);
        metadata::updateOrCreate(['meta_key'=>'_lin'], ['meta_value'=>$request->_lin]);
        metadata::updateOrCreate(['meta_key'=>'_gh'], ['meta_value'=>$request->_gh]);

        return redirect()->route('profile.index')->with('success', 'Profile updated');
    }
}
