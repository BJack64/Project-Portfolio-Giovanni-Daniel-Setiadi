<?php

namespace App\Http\Controllers;

use App\Models\history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class expController extends Controller
{
    function __construct() {
        $this->_type='exp';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = history::where('type', $this->_type)->orderBy('finish_date', 'desc')->get();
        return view('dashboard.experience.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('info1', $request->info1);
        Session::flash('start_date', $request->start_date);
        Session::flash('finish_date', $request->finish_date);
        Session::flash('content', $request->content);

        $data = $request->validate(
            [
                'title' => 'required',
                'info1' => 'required',
                'start_date' => 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'Position must be filled',
                'info1.required' => 'Company name must be filled',
                'start_date.required' => 'Start date must be filled',
                'content.required' => 'Content must be filled',
            ]
        );

        $data = [
            'title' => $request->title,
            'type' => $this->_type,
            'info1' => $request->info1,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
            'content' => $request->content
        ];
        history::create($data);

        return redirect()->route('experience.index')->with('success', 'Experience added');
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
        return view('dashboard.experience.edit')->with('data', $data);
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
                'content' => 'required'
            ],
            [
                'title.required' => 'Title must be filled',
                'info1.required' => 'Company name must be filled',
                'start_date.required' => 'Start date must be filled',
                'content.required' => 'Content must be filled',
            ]
        );

        $data = [
            'title' => $request->title,
            'type' => $this->_type,
            'info1' => $request->info1,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
            'content' => $request->content
        ];
        history::where('id', $id)->where('type', $this->_type)->update($data);

        return redirect()->route('experience.index')->with('success', 'Experience updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        history::where('id', $id)->where('type', $this->_type)->delete();
        return redirect()->route('experience.index')->with('success', 'Experience deleted');
    }
}
