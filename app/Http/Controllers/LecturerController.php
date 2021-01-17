<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\College;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::paginate(5);

        return view('admin.lecturers.index', compact('lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colleges = College::select('id', 'name')->get();

        return view('admin.lecturers.create', compact('colleges'));
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
        $nidn = $request->nidn;
        $photo = $request->file('file');
        $imageName = time().'.'.$photo->extension();
        $photo->move(storage_path('app/public'), $imageName);
        $college_id = $request->college_id;
        $studyProgram = $request->studyProgram;
        $gender = $request->gender;
        $lastEducation = $request->lastEducation;

        $lecturer = new Lecturer();
        $lecturer->name = $name;
        $lecturer->nidn = $nidn;
        $lecturer->photo = $imageName;
        $lecturer->college_id = $college_id;
        $lecturer->studyProgram = $studyProgram;
        $lecturer->gender = $gender;
        $lecturer->lastEducation = $lastEducation;
        $lecturer->save();

        return "dosen berhasil di input";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lecturer = Lecturer::find($id);

        return view('admin.lecturers.show', compact('lecturer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturer = Lecturer::find($id);
        $colleges = College::select('id', 'name')->get();

        return view('admin.lecturers.edit', compact('lecturer', 'colleges'));
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
        $nidn = $request->nidn;
        $photo = $request->file('file');
        $imageName = time().'.'.$photo->extension();
        $photo->move(storage_path('app/public'), $imageName);
        $college_id = $request->college_id;
        $studyProgram = $request->studyProgram;
        $gender = $request->gender;
        $lastEducation = $request->lastEducation;

        $lecturer = Lecturer::find($request->id);
        $lecturer->name = $name;
        $lecturer->nidn = $nidn;
        Storage::delete('public/'.$lecturer->photo);
        $lecturer->photo = $imageName;
        $lecturer->college_id = $college_id;
        $lecturer->studyProgram = $studyProgram;
        $lecturer->gender = $gender;
        $lecturer->lastEducation = $lastEducation;
        $lecturer->save();

        return redirect()->route('lecturers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lecturer = Lecturer::find($id);
        Storage::delete('public/'.$lecturer->photo);
        $lecturer->delete();

        return redirect()->route('lecturers.index');
    }
}
