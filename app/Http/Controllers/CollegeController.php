<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

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

        if ($search)
        {
            $colleges = College::where('name', 'LIKE', "%{$search}%")
                ->paginate(5);
        }
        else
        {
            $colleges = College::paginate(5);
        }

        return view('admin.colleges.index', compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $accreditation = $request->accreditation;

        $college = new College();
        $college->name = $name;
        $college->accreditation = $accreditation;
        $college->save();

        return back()->with('college_added', 'Data perguruan tinggi berhasil di masukan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $name = $request->name;
        $accreditation = $request->accreditation;

        $college = College::find($request->id);
        $college->name = $name;
        $college->accreditation = $accreditation;
        $college->save();

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
        $college = College::findOrFail($id);
        $college->delete();

        return redirect()->route('colleges.index');
    }
}
