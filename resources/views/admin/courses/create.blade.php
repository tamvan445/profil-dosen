@extends('layouts.app')

@section('content')
<main class="w-full flex-grow p-6">
    <div class="flex flex-wrap">
        <div class="w-full my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <i class="fas fa-list mr-3"></i> Form Edit Mata Kuliah
            </p>
            <div class="leading-loose">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                <a href="{{ route('courses.index') }}">Tabel Perguruan Tinggi</a>
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
                <a class="text-gray-500" aria-current="page">Form Mata Kuliah</a>
                </li>
            </ol>
            </div>
            <div class="pt-1 p-1">
                <form class="p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                @csrf
                    <div class="pb-2 max-w-xs">
                        <label class="block text-sm text-gray-600" for="course_code">Kode Mata Kuliah *</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" name="course_code" type="text" required="" >
                    </div>
                    @error('course_code')
                    <div class="pb-1 pt-1">
                        <div class="w-60 px-4 py-3 text-xs text-red-500 border border-red-500 rounded-lg" role="alert">
                            <p>{{ $message }}</p>
                        </div>
                    </div>
                    @enderror
                    <div class="pb-2 max-w-xs">
                        <label class="block text-sm text-gray-600" for="course">Mata Kuliah *</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" name="course" type="text" required="" >
                    </div>
                    @error('course')
                    <div class="pb-1 pt-1">
                        <div class="w-60 px-4 py-3 text-xs text-red-500 border border-red-500 rounded-lg" role="alert">
                            <p>{{ $message }}</p>
                        </div>
                    </div>
                    @enderror
                    <div class="mt-2">
                    <div class="pb-5">
                    <input type="checkbox" value="" required>
                        <label >
                            Saya setuju dengan syarat dan ketentuan
                        </label>
                    </div>
                    <button class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
                        Simpan
                    </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
