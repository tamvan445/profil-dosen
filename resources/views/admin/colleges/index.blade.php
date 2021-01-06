@extends('layouts.app')

@section('content')
<p style="font-size: 35px">Data Perguruan Tinggi</p>
<br>
<!-- /.modal buat munculin form nambahin perguruan tinggi -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCollege" >Tambahkan Data</button>

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
</div>
<!-- /. -->

<!-- /.tabel perguruan tinggi -->
<div class="card-body">
    <table class="table table-bordered">
        <thead>
        <tr><th>No</th>
            <th>Perguruan Tinggi</th>
            <th style="width: 10px">Akreditasi</th>
            <th style="width: 8.24em; text-align: center;">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($colleges as $key => $data)
        <tr>
            <td>{{ $colleges->firstItem() + $key }}</td>
            <td>{{ $data->name }}</td>
            <td style="text-align: center;">{{ $data->accreditation }}</td>
            <td>
                <a type="button" href="/colleges/edit/{{$data->id}}" class="btn btn-info">Edit</a>
                <a type="button" href="/colleges/del/{{$data->id}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Del</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $colleges->links('pagination::custom') }}
    </div>
</div>
<!-- /.tabel perguruan tinggi -->
@endsection
