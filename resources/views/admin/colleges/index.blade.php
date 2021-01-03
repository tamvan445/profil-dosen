@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
    <h3 class="card-title">Semua Perguruan Tinggi</h3>
    </div>
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
