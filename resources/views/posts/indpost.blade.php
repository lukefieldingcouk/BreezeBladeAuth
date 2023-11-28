<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Viewing post {{ $indpost->id }}, submitted by {{$indpost->name}}. 
        </h2>
    </x-slot>

    <br>


    {{-- Start container for formatting --}}
    <div class="container mx-auto px-4">
        {{-- Individual post card --}}
        <x-individualpost :$indpost/>
        <br>


        {{-- Comment section --}}
        <div class="space-y-4">

            @foreach ($postcomments as $postcomment)
            <!-- Comment Card in foreach loop -->
            <div class="bg-white p-4 shadow-md rounded-lg">
              <div class="flex items-center space-x-4">
                <!-- <img src="user-avatar.jpg" alt="User Avatar" class="w-10 h-10 rounded-full"> -->
                <div>
                  <h3 class="text-lg font-semibold">{{$postcomment->commentor}}</h3>
                  <p class="text-gray-600">{{$postcomment->created_at}}</p>
                </div>
              </div>
              <p class="text-gray-800 mt-2">{{ $postcomment->content}}</p>
            </div>
          @endforeach
        
        </div>
        
        
        <br>

        {{-- Write a comment box --}}
        <x-submitcomment :$indpost />
        <br>
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