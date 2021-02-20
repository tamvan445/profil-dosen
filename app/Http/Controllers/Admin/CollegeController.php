<?php

namespace App\Http\Controllers\Admin;

use App\Models\College;
use App\Http\Controllers\Controller;

// Form Request
use App\Http\Requests\College\CollegeRequest;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request()->query('search');

        if ($search) {
            $colleges = College::where('name', 'LIKE', "%{$search}%")->paginate(5);
        } else {
            $colleges = College::paginate(5);
        }

        return view('admin.colleges.index', compact('colleges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CollegeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollegeRequest $request)
    {
        College::create($request->all());

        return redirect()->route('colleges.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $college = College::find($id);

        return view('admin.colleges.edit', compact('college'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CollegeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CollegeRequest $request)
    {
        $college = College::find($request->id)->update($request->all());

        return redirect()->route('colleges.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $college = College::find($id)->delete();

        return redirect()->route('colleges.index');
    }
}
