@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-top: 15px">
    <div class="card card-primary card-outline">
        <div class="card-header">
        <h3 class="card-title">Data Perguruan Tinggi</h3>
        </div><!-- /.card-body -->
        <div class="card-body">
        <div class="float-left">
        <button type="button" class="btn btn-block btn-outline-primary" data-toggle="modal" data-target="#addCollege" >+ Tambahkan Data</button>
        </div><!-- /.button -->
        <div class="float-right">
        <form class="form-inline" style="margin-top: 15px;" method="GET" action="{{route('colleges.index')}}">
            <input class="form-control mr-sm-2" type="text" name="search" placeholder="Cari Perguruan Tinggi" value="{{ request()->query('search') }}">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Cari</button>
        </form>
        </div><!-- /.search perguruan tinggi -->
        <table class="table table-hover text-nowrap">
        <thead>
        <tr>
            <th style="width: 5px">No</th>
            <th>Perguruan Tinggi</th>
            <th style="width: 15px">Akreditasi</th>
            <th style="width: 7.8em; text-align: center;">Edit | Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($colleges as $key => $college)
        <tr>
            <td>{{ $colleges->firstItem() + $key }}</td>
            <td>{{ $college->name }}</td>
            <td style="text-align: center;">{{ $college->accreditation }}</td>
            <td>
                <a type="button" href="/colleges/edit/{{$college->id}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                <a type="button" href="/colleges/del/{{$college->id}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $colleges->links('pagination::custom') }}
        </div><!-- /.tabel perguruan tinggi -->
    </div><!-- /.card-body -->
</div><!-- /.container-fluid -->

<div class="modal fade" id="addCollege" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Data Perguruan Tinggi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('colleges.index') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="col-form-label">Perguruan Tinggi:</label>
            <input type="text" class="form-control" name="name">
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
          <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambahkan</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div><!-- /.modal buat munculin form nambahin perguruan tinggi -->
@endsection
