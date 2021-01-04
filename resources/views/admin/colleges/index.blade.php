@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
    <h3 class="card-title">Semua Perguruan Tinggi</h3>
    </div>
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
        <tr>
            <th>Perguruan Tinggi</th>
            <th style="width: 20px">Akreditasi</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($colleges as $data)
        <tr>
            <td>{{ $data->name }}</td>
            <td style="text-align: center;">{{ $data->accreditation }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $colleges->links() }}
    </div>
</div>
<!-- /.tabel perguruan tinggi -->
@endsection
