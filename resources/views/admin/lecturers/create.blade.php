@extends('layouts.app')

@section('content')
<main class="w-full flex-grow p-6">
    <div class="flex flex-wrap">
        <div class="w-full my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <i class="fas fa-list mr-3"></i> Form Data Dosen
            </p>
            <div class="leading-loose">
            <div>
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                <a href="{{ route('lecturers.index') }}">Tabel Data Dosen</a>
                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                </li>
                <li>
                <a class="text-gray-500" aria-current="page">Form Data Dosen</a>
                </li>
            </ol>
            </div>
            <div class="pt-1 p-1">
                <form class="p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('lecturers.create') }}" enctype="multipart/form-data">
                  @csrf
                    <div class="pb-2 max-w-xs">
                        <label class="block text-sm text-gray-600" for="name">Nama *</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" class="form-control" name="name" >
                    </div>
                    @error('name')
                    <div class="pb-1 pt-1">
                        <div class="w-60 px-4 py-3 text-xs text-red-500 border border-red-500 rounded-lg" role="alert">
                            <p>{{ $message }}</p>
                        </div>
                    </div>
                    @enderror
                    <div class="pb-2 max-w-xs">
                        <label class="block text-sm text-gray-600" for="nidn">NIDN *</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" class="form-control" name="nidn" >
                    </div>
                    @error('nidn')
                    <div class="pb-1 pt-1">
                        <div class="w-60 px-4 py-3 text-xs text-red-500 border border-red-500 rounded-lg" role="alert">
                            <p>{{ $message }}</p>
                        </div>
                    </div>
                    @enderror
                    <div class="pb-2 max-w-xs">
                        <label class="block text-sm text-gray-600" for="file">Foto Terbaru *</label>
                    </label>
                    </div>
                    <div class="p-2 mx-auto bg-white rounded-lg">
                    <div class="" x-data="imageData()">
                        <div x-show="previewUrl == ''">
                        <p class="text-center uppercase text-bold">
                            <label class="w-32 h-18 flex flex-col items-center px-2 py-4 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <span class="text-xs">Pilih Foto</span>
                            <input type="file" name="lecturerPhoto" id="thumbnail" class="hidden" @change="updatePreview()">
                        </p>
                        </div>
                        <div x-show="previewUrl !== ''">
                        <img :src="previewUrl" alt="" class="max-h-44">
                        <div class="">
                            <button type="button" class="" @click="clearPreview()">Ganti Foto</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    @error('lecturerPhoto')
                    <div class="pb-1 pt-1">
                        <div class="w-60 px-4 py-3 text-xs text-red-500 border border-red-500 rounded-lg" role="alert">
                            <p>{{ $message }}</p>
                        </div>
                    </div>
                    @enderror
                    <div class="pb-2">
                    <label class="block text-sm text-gray-600" for="college">Perguruan Tinggi *</label>
                    <svg class="w-2 h-2 absolute right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                    <select name="college_id" class="w-80 border border-gray-300 text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                        <option value="">Pilih Perguruan Tinggi</option>
                        @foreach($colleges as $college)
                        <option value="{{ $college->id }}">{{ $college->name }}</option>
                        @endforeach
                    </select>
                    </div>
                    @error('college_id')
                    <div class="pb-1 pt-1">
                        <div class="w-60 px-4 py-3 text-xs text-red-500 border border-red-500 rounded-lg" role="alert">
                            <p>{{ $message }}</p>
                        </div>
                    </div>
                    @enderror
                    <div class="pb-2 max-w-xs">
                        <label class="block text-sm text-gray-600" for="studyProgram">Program Studi *</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" class="form-control" name="studyProgram" >
                    </div>
                    @error('studyProgram')
                    <div class="pb-1 pt-1">
                        <div class="w-60 px-4 py-3 text-xs text-red-500 border border-red-500 rounded-lg" role="alert">
                            <p>{{ $message }}</p>
                        </div>
                    </div>
                    @enderror
                    <div class="pb-2">
                    <label class="block text-sm text-gray-600" for="gender">Jenis Kelamin *</label>
                    <svg class="w-2 h-2 absolute right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                    <select name="gender" class="w-80 border border-gray-300 text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                        <option value="">Jenis Kelamin</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                    </div>
                    @error('gender')
                    <div class="pb-1 pt-1">
                        <div class="w-60 px-4 py-3 text-xs text-red-500 border border-red-500 rounded-lg" role="alert">
                            <p>{{ $message }}</p>
                        </div>
                    </div>
                    @enderror
                    <div class="pb-2">
                    <label class="block text-sm text-gray-600" for="lastEducation">Pendidikan Terakhir *</label>
                    <svg class="w-2 h-2 absolute right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                    <select name="lastEducation" class="w-80 border border-gray-300 text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                        <option value="">Pendidikan Terakhir</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                    </div>
                    @error('lastEducation')
                    <div class="pb-1 pt-1">
                        <div class="w-60 px-4 py-3 text-xs text-red-500 border border-red-500 rounded-lg" role="alert">
                            <p>{{ $message }}</p>
                        </div>
                    </div>
                    @enderror
                    <div class="pb-1">
                        <input type="checkbox" value="" required>
                        <label>
                            Saya setuju dengan syarat dan ketentuan
                        </label>
                    </div>
                    <div class="mt-6">
                    <button class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
                        Simpan
                    </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
function imageData() {
  return {
    previewUrl: "",
    updatePreview() {
      var reader,
        files = document.getElementById("thumbnail").files;

      reader = new FileReader();

      reader.onload = e => {
        this.previewUrl = e.target.result;
      };

      reader.readAsDataURL(files[0]);
    },
    clearPreview() {
      document.getElementById("thumbnail").value = null;
      this.previewUrl = "";
    }
  };
}
</script>
@endsection
