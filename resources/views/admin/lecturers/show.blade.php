@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-sm-6">
<p style="font-size: 30px;">Detail Data Dosen</p>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a  href="{{ route('lecturers.index') }}">Data Dosen</a></li>
        <li class="breadcrumb-item active">Detail Data Dosen</li>
    </ol>
</div>

<!-- Main content -->
<div class="container-fluid">
<div class="row">
    <div class="col-md-3">

    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle"
                src="{{ asset('storage/' . $lecturer->photo) }}"
                alt="User profile picture">
        </div>

        <h3 class="profile-username text-center">{{ $lecturer->name }}</h3>

        <p class="text-muted text-center">{{ $lecturer->college->name }}</p>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- Biodata -->
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Biodata</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <strong><i class="fas fa-address-card mr-1"></i> NIDN</strong>

        <p class="text-muted">
           {{ $lecturer->nidn }}
        </p>

        <hr>

        <strong><i class="fas fa-book mr-1"></i> Program Studi</strong>

        <p class="text-muted">
           {{ $lecturer->studyProgram }}
        </p>

        <hr>

        <strong><i class="fas fa-graduation-cap mr-1"></i> Pendidikan Tertinggi</strong>

        <p class="text-muted">{{ $lecturer->lastEducation }}</p>

        <hr>

        <strong><i class="fas fa-venus-mars mr-1"></i> Jenis Kelamin</strong>

        <p class="text-muted">{{ $lecturer->gender }}</p>

        <hr>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
    <div class="card">
        <div class="card-header p-2">
        <p style="font-size: 30px;">Riwayat Mengajar</p>
        </div><!-- /.card-header -->
        <div class="card-body">
        <div class="tab-content">
            <div class="active tab-pane" id="activity">
            <!-- Post -->
            <div class="post">
                <p>
                Lorem ipsum represents a long-held tradition for designers,
                typographers and the like. Some people hate it and argue for
                its demise, but others ignore the hate as they create awesome
                tools to help create filler text for everyone from bacon lovers
                to Charlie Sheen fans.
                </p>
            </div>
        <!-- /.content -->
        </div><!-- /.card-body -->
    </div>
    <!-- /.nav -->
</div>
@endsection
