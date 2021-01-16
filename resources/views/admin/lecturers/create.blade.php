@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-sm-6">
<p style="font-size: 20px;">Tambah Data Dosen</p>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a  href="{{ route('lecturers.index') }}">Data Dosen</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
</div>
<div class="col-md-6 offset-md-3">
    <form method="POST" action="{{ route('lecturers.create') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="" />
    <div class="form-group">
        <label for="name" class="col-form-label">Nama Dosen:</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label for="name" class="col-form-label">NIDN:</label>
        <input type="text" class="form-control" name="nidn">
    </div>
    <div class="form-group">
        <label for="file">Foto Terbaru:</label>
        <input type="file" name="file" class="form-control" />
    </div>
    <div class="form-group">
    <label>Perguruan Tinggi:</label>
    <select class="form-control" name="college_id">
        <option value="">Pilih Perguruan Tinggi</option>
        @foreach($colleges as $college)
        <option value="{{ $college->id }}">{{ $college->name }}</option>
        @endforeach
    </select>
    </div>
    <div class="form-group">
        <label for="name" class="col-form-label">Program Studi:</label>
        <input type="text" class="form-control" name="studyProgram">
    </div>
    <div class="form-group">
        <label for="name" class="col-form-label">Jenis Kelamin:</label>
        <select name="gender" class="custom-select" required>
            <option value="">Jenis Kelamin</option>
            <option value="pria">Pria</option>
            <option value="wanita">Wanita</option>
        </select>
    </div>
    <div class="form-group">
        <label for="name" class="col-form-label">Pendidikan Terakhir:</label>
        <select name="lastEducation" class="custom-select" required>
            <option value="">Pendidikan Terakhir</option>
            <option value="S2">S2</option>
            <option value="S3">S3</option>
        </select>
    </div>
    <div class="form-group">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" required>
        <label class="form-check-label">
            Saya setuju dengan syarat dan ketentuan
        </label>
        </div>
    </div>
        <button type="submit" class="btn btn-primary">Tambahkan</button>
    </form>
    <br>
</div>
@endsection
