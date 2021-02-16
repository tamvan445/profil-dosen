@extends('layouts.app')

@section('content')
<div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-2 overflow-hidden bg-gray-200 shadow-lg px-10">
  <p class="pb-2 text-2xl">Data Dosen</p>
  <div class="mb-4 flex justify-between items-center">
    <div class="flex-1 pr-4">
      <div class="relative md:w-1/3">
      <form method="GET" action="{{ route('lecturers.index') }}">
        <input type="search"
          class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
          type="text" name="search" placeholder="NIDN" value="{{ request()->query('search') }}">
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
        <div class="relative"><a type="button" href="/lecturers/add" 
        class="rounded-lg inline-flex items-center bg-white hover:text-blue-500 focus:outline-none focus:shadow-outline text-gray-500 font-semibold py-2 px-2 md:px-4">
        <i class="fas fa-plus mr-3"></i>Dosen</a>
        </div>
      </div>
    </div>
  </div>
<div class="bg-white overflow-auto">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    No.
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Dosen
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    NIDN
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Perguruan Tinggi
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                    Detail | Ubah | Hapus
                </th>
            </tr>
        </thead>
    <tbody>
        @foreach ($lecturers as $key => $lecturer)
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">#{{ $lecturers->firstItem() + $key }}</p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-10 h-10">
                            <img class="w-full h-full rounded-full"
                            src="{{ asset('storage/' . $lecturer->photo) }}"
                                alt="profil" />
                        </div>
                        <div class="ml-3">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $lecturer->name }}
                            </p>
                        </div>
                    </div>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">{{ $lecturer->nidn }}</p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">
                        {{ $lecturer->college->name }}
                    </p>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 text-center">
                <a type="button" href="/lecturers/show/{{ $lecturer->id }}"  class="px-3 py-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none"><i class="fas fa-eye"></i></a>
                <a type="button" href="/lecturers/edit/{{ $lecturer->id }}"  class="px-3 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none"><i class="fas fa-edit"></i></a>    
                <a type="button" href="/lecturers/destroy/{{ $lecturer->id }}" onclick="return confirm('Are you sure you want to delete this item?');" 
                    class="px-3 py-2 border-red-500 border text-red-500 rounded transition duration-300 
                            hover:bg-red-700 hover:text-white focus:outline-none"><i class="fas fa-trash"></i></a></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $lecturers->links('pagination::custom') }}
    </div>
</div>
</main>
@endsection
