<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lecturer;
use App\Models\College;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

// Form Requests
use App\Http\Requests\StoreLecturerRequest;
use App\Http\Requests\UpdateLecturerRequest;

class LecturerController extends Controller
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
            $lecturers = Lecturer::where('nidn', 'LIKE', "%{$search}%")->paginate(5);
        } else {
            $lecturers = Lecturer::paginate(5);
        }

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
     * @param  \Illuminate\Http\StoreLecturerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLecturerRequest $request)
    {
        $input = $request->all();

        $photo = $request->file('lecturerPhoto');
        $imageName = time().'.'.$photo->extension();
        $photo->move(storage_path('app/public'), $imageName);

        $input['photo'] = $imageName;

        Lecturer::create($input);

        return redirect()->route('lecturers.index');
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
     * @param  \Illuminate\Http\UpdateLecturerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLecturerRequest $request)
    {
        $input = $request->all();

        $photo = $request->file('file');
        $imageName = time().'.'.$photo->extension();
        $photo->move(storage_path('app/public'), $imageName);

        $input['photo'] = $imageName;

        $lecturer = Lecturer::find($request->id);
        Storage::delete('public/'.$lecturer->photo);
        $lecturer->update($input);

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
