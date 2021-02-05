<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="{{ route('home') }}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">{{ config('app.name') }}</a>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
    @include('layouts.menu')
    </nav>
</aside>
