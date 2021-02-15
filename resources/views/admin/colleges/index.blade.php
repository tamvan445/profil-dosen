@extends('layouts.app')

@section('content')
<div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-gray-200 shadow-lg px-12">
  <p class="pb-3 text-2xl">Data Perguruan Tinggi</p>
  <div class="mb-4 flex justify-between items-center">
    <div class="flex-1 pr-4">
      <div class="relative md:w-1/2">
      <form method="GET" action="{{ route('colleges.index') }}">
        <input type="search"
          class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
          type="text" name="search" placeholder="Perguruan Tinggi" value="{{ request()->query('search') }}">
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
        <div class="relative"><a type="button" href="/colleges/add" 
        class="rounded-lg inline-flex items-center bg-white hover:text-blue-500 focus:outline-none focus:shadow-outline text-gray-500 font-semibold py-2 px-2 md:px-4">
        <i class="fas fa-plus mr-3"></i>Perguruan Tinggi</a>
        </div>
      </div>
    </div>
  </div>
  <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
    <table class="min-w-full">
      <thead>
        <tr>
          <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">No.</th>
          <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Perguruan Tinggi</th>
          <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider text-center">Akreditasi</th>
          <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider text-center">Ubah || Hapus</th>
        </tr>
      </thead>
      <tbody class="bg-white">
      @foreach ($colleges as $key => $college)
        <tr>
          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
            <div class="flex items-center">
                <div>
                    <div class="text-sm leading-5 text-gray-800">#{{ $colleges->firstItem() + $key }}</div>
                </div>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
              <div class="text-sm leading-5 text-blue-900">{{ $college->name }}</div>
          </td>
          <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 text-center">{{ $college->accreditation }}</td>
          <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 text-center">
          <a type="button" href="/colleges/edit/{{ $college->id }}"  class="px-2 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Ubah</i></a>    
          <a type="button" href="/colleges/destroy/{{ $college->id }}" onclick="return confirm('Are you sure you want to delete this item?');" 
            class="px-2 py-2 border-red-500 border text-red-500 rounded transition duration-300 
                    hover:bg-red-700 hover:text-white focus:outline-none">Hapus</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
      {{ $colleges->links('pagination::custom') }}
    </div>
  </div>
</div>
@endsection
