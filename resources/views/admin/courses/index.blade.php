@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-top: 15px">
    <div class="card card-primary card-outline">
        <div class="card-header">
        <h3 class="card-title">Data Mata Kuliah</h3>
        </div><!-- /.card-body -->
        <div class="card-body">
        <div class="float-left">
        <button type="button" class="btn btn-block btn-outline-primary" data-toggle="modal" data-target="#addCourse" >+ Tambahkan Data</button>
        </div><!-- /.button -->
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
            <td>{{ $course->course }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $courses->links('pagination::custom') }}
        </div><!-- /.tabel mata kuliah -->
    </div><!-- /.card-body -->
</div><!-- /.container-fluid -->

<div class="modal fade" id="addCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Data Mata Kuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('courses.index') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="col-form-label">Kode Mata Kuliah:</label>
            <input type="text" class="form-control" name="course_code">
        </div>
        <div class="form-group">
            <label for="name" class="col-form-label">Mata Kuliah:</label>
            <input type="text" class="form-control" name="course">
        </div>
        <div class="form-group">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" required>
            <label class="form-check-label">
                Saya setuju dengan syarat dan ketentuan
            </label>
            </div>
        </div>
          <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambahkan</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div><!-- /.modal buat munculin form nambahin mata kuliah -->
@endsection
