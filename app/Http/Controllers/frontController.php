<?php

namespace App\Http\Controllers;

use App\Models\page;
use App\Models\history;
use Illuminate\Http\Request;

class frontController extends Controller
{
    public function index() {
        $about_id = get_meta_value('_about');
        $about_data = page::where('id', $about_id)->first();

        $interest_id = get_meta_value('_interest');
        $interest_data = page::where('id', $interest_id)->first();

        $award_id = get_meta_value('_award');
        $award_data = page::where('id', $award_id)->first();

        $exp_data = history::where('type', 'exp')->get();
        $edu_data = history::where('type', 'edu')->get();

        return view('front.index')->with([
            'about' => $about_data,
            'interest' => $interest_data,
            'award' => $award_data,
            'exp' => $exp_data,
            'edu' => $edu_data,
        ]);
    }
}
