@extends('layouts.app')

@section('content')
<section style="padding-top:10px;">
<div class="container">
    <div class="row">
    <div class="col-sm-6">
<p style="font-size: 20px;">Ubah Data Perguruan Tinggi</p>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a  href="{{ route('colleges.index') }}">Data Peguruan Tinggi</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
</div>
<div class="col-md-6 offset-md-3">
    <form method="POST" action="{{route('college.update')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$college->id}}" />
    <div class="form-group">
        <label for="name" class="col-form-label">Perguruan Tinggi:</label>
        <input type="text" class="form-control" name="name" value="{{ $college->name }}">
    </div>
    <div class="form-group">
        <label for="accreditation" class="col-form-label">Akreditasi:</label>
        <select name="accreditation" class="custom-select" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
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
        <button type="submit" class="btn btn-primary">Perbarharui</button>
    </form>
</div>
</section>
@endsection
