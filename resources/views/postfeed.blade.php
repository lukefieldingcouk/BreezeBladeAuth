<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Post Feed
        </h2>
    </x-slot>

    <br>


    <div class="grid grid-cols-5 gap-2">
    @foreach ($post as $p)
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-4">
          <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $p->title }}</h2>
          <p class="text-gray-700 text-base">{{ $p->content }}</p>
        </div>
        <div class="bg-gray-100 p-4">
          <span class="text-gray-600 text-sm">Posted by {{ $p->name }}</span>
          <span class="text-gray-600 text-sm ml-2">on {{ $p->created_at }}</span>
        </div>
      </div>
    @endforeach
    </div>











</x-app-layout>