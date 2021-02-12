@extends('layouts.app')

@section('content')
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
<main class="w-full flex-grow p-6">
    <div class="flex flex-wrap">
        <div class="w-full my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <i class="fas fa-list mr-3"></i> Form Edit Perguruan Tinggi
            </p>
            <div class="leading-loose">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                <a href="{{ route('colleges.index') }}">Tabel Perguruan Tinggi</a>
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
                <a class="text-gray-500" aria-current="page">{{ $college->name }}</a>
                </li>
            </ol>
            </div>
            <div class="pt-1 p-1">
                <form class="p-10 bg-white rounded shadow-xl " method="POST" action="{{ route('colleges.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$college->id}}" />
                    <div class="pb-2 max-w-xs">
                        <label class="block text-sm text-gray-600" for="name">Perguruan Tinggi *</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" name="name" type="text" required="" placeholder="Perguruan Tinggi" value="{{ $college->name }}">
                    </div>
                    <div class="pb-2">
                    <label class="block text-sm text-gray-600" for="accreditation">Akreditasi *</label>
                    <svg class="w-2 h-2 absolute right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                    <select name="accreditation" class="border border-gray-300 text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                        <option value="">Pilih Akreditasi</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                    </div>
                    <div class="mt-1">
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
