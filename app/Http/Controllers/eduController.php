<?php

namespace App\Http\Controllers;

use App\Models\history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class eduController extends Controller
{
    function __construct() {
        $this->_type = 'edu';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = history::where('type', $this->_type)->orderBy('finish_date', 'desc')->get();
        return view('dashboard.education.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('info1', $request->info1);
        Session::flash('info2', $request->info2);
        Session::flash('info3', $request->info3);
        Session::flash('start_date', $request->start_date);
        Session::flash('finish_date', $request->finish_date);

        $data = $request->validate(
            [
                'title' => 'required',
                'info1' => 'required',
                'start_date' => 'required',
            ],
            [
                'title.required' => 'University name must be filled',
                'info1.required' => 'Faculty name must be filled',
                'start_date.required' => 'Start date must be filled',
            ]
        );

        $data = [
            'title' => $request->title,
            'type' => $this->_type,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
        ];
        history::create($data);

        return redirect()->route('education.index')->with('success', 'Education added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = history::where('id', $id)->where('type', $this->_type)->first();
        return view('dashboard.education.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'title' => 'required',
                'info1' => 'required',
                'start_date' => 'required',
            ],
            [
                'title.required' => 'University name must be filled',
                'info1.required' => 'Faculty name must be filled',
                'start_date.required' => 'Start date must be filled',
            ]
        );

        $data = [
            'title' => $request->title,
            'type' => $this->_type,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
        ];
        history::where('id', $id)->where('type', $this->_type)->update($data);

        return redirect()->route('education.index')->with('success', 'education added');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        history::where('id', $id)->where('type', $this->_type)->delete();
        return redirect()->route('education.index')->with('success', 'education deleted');
    }
}
