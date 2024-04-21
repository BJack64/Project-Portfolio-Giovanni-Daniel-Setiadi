<?php

namespace App\Http\Controllers;

use App\Models\page;
use App\Models\metadata;
use Illuminate\Http\Request;

class settingsController extends Controller
{
    public function index(){
        $pagedata = page::orderBy('title', 'asc')->get();
        return view("dashboard.settings.index")->with('pagedata', $pagedata);
    }

    public function update(Request $request){
        metadata::updateOrCreate(['meta_key'=>'_about'], ['meta_value'=>$request->_about]);
        metadata::updateOrCreate(['meta_key'=>'_interest'], ['meta_value'=>$request->_interest]);
        metadata::updateOrCreate(['meta_key'=>'_award'], ['meta_value'=>$request->_award]);

        return redirect()->route('settings.index')->with('success', 'Settings updated');
    }
}
