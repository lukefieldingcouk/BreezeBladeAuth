<x-app-layout>
    <x-slot name="header">
        {{-- Header --}}
        <a href="{{ route('postfeed') }}"
            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
            Back
        </a>

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Viewing post {{ $indpost->id }}, submitted by {{$indpost->name}}.
        </h2>

    </x-slot>

    <br>


    {{-- Start container for formatting --}}
    <div class="container mx-auto px-4">
        {{-- Individual post card --}}
        <x-individualpost :$indpost />
        <br>


        {{-- Comment section --}}
        <div class="space-y-4">

            @foreach ($postcomments as $postcomment)

            <div x-data="{ expanded: false }" class="bg-white p-4 shadow-md rounded-lg">
                <div class="flex items-center space-x-4">
                    <div>
                        <h3 class="text-lg font-semibold">{{ $postcomment->commentor }}</h3>
                        <p class="text-gray-600">{{ $postcomment->created_at }}</p>
                    </div>
                </div>

                <p x-text="expanded ? '{{ $postcomment->content }}' : '{{ Str::limit($postcomment->content, 100) }}'"
                    class="break-words text-gray-800 mt-2 text-base" :class="{ 'h-15 overflow-hidden': !expanded }"></p>

                @if (Str::length($postcomment->content) > 100)
                <button x-show="!expanded && {{ Str::length($postcomment->content) > 100 }}" @click="expanded = true"
                    class="text-indigo-500 text-sm mt-2">Read more</button>
                <button x-show="expanded" @click="expanded = false" class="text-indigo-500 text-sm mt-2">Read
                    less</button>
                @endif
            </div>

            @endforeach

        </div>


        {{-- Spacing between comments and comment box --}}
        <br>

        {{-- Write a comment box --}}
        <x-submitcomment :$indpost />
        <br>



        {{-- Status on comment submission --}}
        @if(session()->has('status'))
        <p>
            {{ session()->get('status') }}
        </p>
        @endif

        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif






        {{-- End container for formatting --}}
    </div>



</x-app-layout>