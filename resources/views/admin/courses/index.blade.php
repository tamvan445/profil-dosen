@extends('layouts.app')

@section('content')
<div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-gray-200 shadow-lg px-12">
  <p class="pb-3 text-2xl">Data Mata Kuliah</p>
  <div class="mb-4 flex justify-between items-center">
    <div class="flex-1 pr-4">
      <div class="relative md:w-1/3">
      <form>
        <input type="search"
          class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
          type="text" name="search" placeholder="Kode Matkul" value="">
      </form>
        <div class="absolute top-0 left-0 inline-flex items-center p-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24"
            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
            <circle cx="10" cy="10" r="7" />
            <line x1="21" y1="21" x2="15" y2="15" />
          </svg>
        </div>
      </div>
    </div>
    <div>
      <div class="shadow rounded-lg flex">
        <div class="relative">
        <button onclick="openModal()" class="rounded-lg inline-flex items-center bg-white hover:text-blue-500 focus:outline-none focus:shadow-outline text-gray-500 font-semibold py-2 px-2 md:px-4">
              <i class="fas fa-plus mr-3"></i> Mata Kuliah
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
    <table class="min-w-full">
      <thead>
        <tr>
          <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">No.</th>
          <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Kode Mata Kuliah</th>
          <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider text-center">Mata Kuliah</th>
          <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider text-center">Ubah || Hapus</th>
        </tr>
      </thead>
      <tbody class="bg-white">
      @foreach ($courses as $key => $course)
        <tr>
          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
            <div class="flex items-center">
                <div>
                    <div class="text-sm leading-5 text-gray-800">#{{ $courses->firstItem() + $key }}</div>
                </div>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
              <div class="text-sm leading-5 text-blue-900">{{ $course->course_code }}</div>
          </td>
          <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 text-center">{{ $course->course }}</td>
          <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 text-center">
          <a type="button" href="/courses/edit/{{ $course->id }}"  class="px-2 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Ubah</i></a>    
          <a type="button" href="/courses/destroy/{{ $course->id }}" onclick="return confirm('Are you sure you want to delete this item?');" 
            class="px-2 py-2 border-red-500 border text-red-500 rounded transition duration-300 
                    hover:bg-red-700 hover:text-white focus:outline-none">Hapus</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
      {{ $courses->links('pagination::custom') }}
    </div>
  </div>
</div>

<!--Modal-->
<div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
  style="background: rgba(0,0,0,.7);">
  <div
    class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
    <div class="modal-content py-4 text-left px-6">
      <!--Title-->
      <div class="flex justify-between items-center pb-3">
        <p class="text-2xl font-bold">Form Mata Kuliah</p>
        <div class="modal-close cursor-pointer z-50">
          <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
            viewBox="0 0 18 18">
            <path
              d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
            </path>
          </svg>
        </div>
      </div>
      <!--Body-->
      <div class="bg-white shadow rounded-lg p-6">
    <div class="pb-4">
    <form method="POST" action="{{ route('courses.index') }}" enctype="multipart/form-data">
      @csrf
      <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
          <p>
            <label for="name" class="bg-white text-gray-600 px-1">Kode Mata Kuliah *</label>
          </p>
        </div>
        <p>
          <input name="course_code" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 text-gray-900 outline-none block h-full w-full">
        </p>
      </div>
      </div>
      <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
          <p>
            <label for="name" class="bg-white text-gray-600 px-1">Mata Kuliah *</label>
          </p>
        </div>
        <p>
          <input name="course" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 text-gray-900 outline-none block h-full w-full">
        </p>
      </div>
    </div>
    <div>
    <div class="border-t mt-6 pt-3">
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

<style>
  .animated {
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
  }

  .animated.faster {
    -webkit-animation-duration: 500ms;
    animation-duration: 500ms;
  }

  .fadeIn {
    -webkit-animation-name: fadeIn;
    animation-name: fadeIn;
  }

  .fadeOut {
    -webkit-animation-name: fadeOut;
    animation-name: fadeOut;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
    }

    to {
      opacity: 1;
    }
  }

  @keyframes fadeOut {
    from {
      opacity: 1;
    }

    to {
      opacity: 0;
    }
  }
</style>

<script>
  const modal = document.querySelector('.main-modal');
  const closeButton = document.querySelectorAll('.modal-close');

  const modalClose = () => {
    modal.classList.remove('fadeIn');
    modal.classList.add('fadeOut');
    setTimeout(() => {
      modal.style.display = 'none';
    }, 500);
  }

  const openModal = () => {
    modal.classList.remove('fadeOut');
    modal.classList.add('fadeIn');
    modal.style.display = 'flex';
  }

  for (let i = 0; i < closeButton.length; i++) {

    const elements = closeButton[i];

    elements.onclick = (e) => modalClose();

    modal.style.display = 'none';

    window.onclick = function (event) {
      if (event.target == modal) modalClose();
    }
  }
</script>
@endsection
