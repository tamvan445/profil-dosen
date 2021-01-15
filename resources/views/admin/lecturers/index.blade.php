@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-top: 15px">
    <div class="card card-primary card-outline">
        <div class="card-header">
        <h3 class="card-title">Data Dosen</h3>
        </div><!-- /.card-body -->
        <div class="card-body">
        <table class="table table-hover text-nowrap">
        <thead>
        <tr>
            <th style="width: 1px">No</th>
            <th>Nama</th>
            <th>NIDN</th>
            <th>Program Studi</th>
            <th>Jenis Kelamin</th>
            <th>Pendidikan Terakhir</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($lecturers as $key => $lecturer)
        <tr>
            <td>{{ $lecturers->firstItem() + $key }}</td>
            <td>{{ $lecturer->name }}</td>
            <td>{{ $lecturer->nidn }}</td>
            <td>{{ $lecturer->studyProgram }}</td>
            <td>{{ $lecturer->gender }}</td>
            <td>{{ $lecturer->lastEducation }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $lecturers->links('pagination::custom') }}
        </div><!-- /.tabel dosen -->
    </div><!-- /.card-body -->
</div><!-- /.container-fluid -->
@endsection
