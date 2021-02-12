@extends('layouts.app')

@section('content')
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col pb-24">
<main class="w-full flex-grow p-6">
<div class="flex flex-wrap">
    <div class="w-full my-2 pr-0 lg:pr-2">
        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-list mr-3"></i> Profil Dosen
        </p>
        <div class="leading-loose">
        <ol class="list-none p-0 inline-flex">
            <li class="flex items-center">
            <a href="{{ route('lecturers.index') }}">Tabel Dosen</a>
            <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                <path 
                    d="M285.476 272.971L91.132 
                    467.314c-9.373 9.373-24.569 
                    9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 
                    256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 
                    24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                />
            </svg>
            </li>
            <li>
            <a class="text-gray-500" aria-current="page">{{ $lecturer->name }}</a>
            </li>
        </ol>
    </div>
<div class="container mx-auto pt-1 p-1">
    <div class="md:flex no-wrap md:-mx-2 ">
        <!-- Left Side -->
        <div class="w-full md:w-3/12 md:mx-2">
            <!-- Profile Card -->
            <div class="bg-white p-3 border-t-4 border-blue-400">
                <div class="image overflow-hidden">
                    <img class="w-72 max-h-56"
                        src="{{ asset('storage/' . $lecturer->photo) }}"
                        alt="">
                </div>
                <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ $lecturer->name }}</h1>
                <h3 class="text-gray-600 font-lg text-semibold leading-6">{{ $lecturer->college->name }}</h3>
            </div>
            <!-- End of profile card -->
        </div>
<!-- Right Side -->
<div class="w-full md:w-9/12 mx-2 h-64">
<!-- Profile tab -->
<!-- About Section -->
<div class="bg-white p-3 shadow-sm rounded-sm">
    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
        <span clas="text-green-500">
            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </span>
        <span class="tracking-wide">Biodata Dosen</span>
    </div>
<div class="text-gray-700">
    <div class="grid md:grid-cols-2 text-sm">
        <div class="grid grid-cols-2">
            <div class="px-4 py-2 font-semibold">Program Studi</div>
            <div class="px-4 py-2">{{ $lecturer->studyProgram }}</div>
        </div>
        <div class="grid grid-cols-2">
            <div class="px-4 py-2 font-semibold">NIDN</div>
            <div class="px-4 py-2">{{ $lecturer->nidn }}</div>
        </div>
        <div class="grid grid-cols-2">
            <div class="px-4 py-2 font-semibold">Jenis Kelamin</div>
            <div class="px-4 py-2">{{ $lecturer->gender }}</div>
        </div>
        <div class="grid grid-cols-2">
            <div class="px-4 py-2 font-semibold">Pendidikan</div>
            <div class="px-4 py-2">{{ $lecturer->lastEducation }}</div>
        </div>
    </div>
</div>
<!-- End of about section -->

<br>

<!-- Riwayat Mengajar -->
<div class="bg-white shadow-sm rounded-sm">
    <div class="grid grid-cols-2">
        <div>
            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                <span clas="text-green-500">
                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </span>
                <span class="tracking-wide">Riwayat Mengajar</span>
            </div>
            <ul class="list-inside space-y-2">
                <li>
                    <div class="text-teal-600">MATKUL</div>
                    <div class="text-gray-500 text-xs">KODE: Kode_MATKUL</div>
                </li>
            </ul>
        </div>
    </div>
    <!-- End of Riwayat Mengajar -->
    </div>
</main>
@endsection
