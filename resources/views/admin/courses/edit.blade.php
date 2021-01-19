@extends('layouts.app')

@section('content')
<div class="container" style="padding-top:10px;">
    <div class="row">
    <div class="col-sm-6">
<p style="font-size: 20px;">Ubah Data Mata Kuliah</p>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a  href="{{ route('courses.index') }}">Data Mata Kuliah</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
</div>
<div class="col-md-6 offset-md-3">
    <form method="POST" action="{{ route('courses.update') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$course->id}}" />
    <div class="form-group">
        <label for="name" class="col-form-label">Kode Mata Kuliah:</label>
        <input type="text" class="form-control" name="course_code" value="{{ $course->course_code }}">
    </div>
    <div class="form-group">
        <label for="name" class="col-form-label">Mata Kuliah:</label>
        <input type="text" class="form-control" name="course" value="{{ $course->course }}">
    </div>
    <div class="form-group">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" required>
        <label class="form-check-label">
            Saya setuju dengan syarat dan ketentuan
        </label>
        </div>
    </div>
        <button type="submit" class="btn btn-primary">Perbarharui</button>
    </form>
</div>
@endsection
