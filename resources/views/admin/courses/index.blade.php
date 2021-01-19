@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-top: 15px">
    <div class="card card-primary card-outline">
        <div class="card-header">
        <h3 class="card-title">Data Mata Kuliah</h3>
        </div><!-- /.card-body -->
        <div class="card-body">
        <table class="table table-hover text-nowrap">
        <thead>
        <tr>
            <th>No</th>
            <th>Kode Mata Kuliah</th>
            <th>Mata Kuliah</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($courses as $key => $course)
        <tr>
            <td>{{ $courses->firstItem() + $key }}</td>
            <td>{{ $course->course_code }}</td>
            <td>{{ $course->course_code }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $courses->links('pagination::custom') }}
        </div><!-- /.tabel mata kuliah -->
    </div><!-- /.card-body -->
</div><!-- /.container-fluid -->

@endsection
