

<div class="flex flex-row space-x-4">

@foreach ($post as $p)
{{-- <a> points to the individual post URL, with post ID --}}
    <a href="{{ URL('/indpost/'.$p->id) }} "> 
    <div x-data="{ expanded: false }" class="flex w-full flex-col space-y-4 bg-white shadow-md rounded-lg">
      <div class="bg-gray-100 p-4">
        <span class="text-gray-600 text-sm">Posted by {{ $p->name }}</span>
        <span class="text-gray-600 text-sm ml-2">on {{ $p->created_at }}</span>
      </div>

      <div class="p-4">
        <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $p->title }}</h2>
        <p x-text="expanded ? '{{ $p->content }}' : '{{ Str::limit($p->content, 40) }}'" class="text-gray-700 text-base" :class="{ 'h-15 overflow-hidden': !expanded }"></p>
        <button x-show="!expanded && '{{ Str::length($p->content) > 40 }}'" @click="expanded = true" class="text-indigo-500 text-sm mt-2">Read more</button>
        <button x-show="expanded" @click="expanded = false" class="text-indigo-500 text-sm mt-2">Read less</button>
      </div>
    </div>
  </a>

@endforeach


</div>
