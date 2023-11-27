

<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <div class="p-4">
      <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $indpost->title }}</h2>
      <p class="text-gray-700 text-base">{{ $indpost->content }}</p>
    </div>
    <div class="bg-gray-100 p-4">
      <span class="text-gray-600 text-sm">Posted by {{ $indpost->name }}</span>
      <span class="text-gray-600 text-sm ml-2">on {{ $indpost->created_at }}</span>
    </div>
  </div>