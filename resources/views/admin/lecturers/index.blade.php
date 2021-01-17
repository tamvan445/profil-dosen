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
            <th>Edit | Delete</th>
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
            <td>
                <a type="button" href="/lecturers/edit/{{ $lecturer->id }}"
                    class="btn btn-info"><i class="fas fa-edit"></i></a>
                <a type="button" href="/lecturers/del/{{ $lecturer->id }}"
                    onclick="return confirm('Anda yakin akan mengapus dosen tersebut?');"
                        class="btn btn-danger"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $lecturers->links('pagination::custom') }}
        </div><!-- /.tabel dosen -->
    </div><!-- /.card-body -->
</div><!-- /.container-fluid -->
@endsection
