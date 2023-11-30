<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      Message Board
    </h2>
  </x-slot>


  {{-- Floating guide --}}
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          You're logged in as <b>{{ Auth::user()->name }}</b>. Submit posts below.
        </div>
      </div>
    </div>
  </div>

{{-- Post Submission Form - MOVE TO COMPONENT IN FUTURE? --}}
  <form class="max-w-md mx-auto" action="{{ route('PostController.store') }}" method="post">
    @csrf
    <div class="mb-4">
      <label name="title" class="block text-gray-700 text-sm font-bold mb-2" for="title">
        Title:
      </label>
      <input name="title"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        id="title" type="text" placeholder="Enter the title of your post">
    </div>
    <div class="mb-4">
      <input type="hidden" id="UserID" name="UserID" value="{{ Auth::id() }}">
      <label name="content" class="block text-gray-700 text-sm font-bold mb-2" for="content">
        Content:
      </label>
      <textarea name="content"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        id="content" rows="5" placeholder="Enter the content of your post"></textarea>
    </div>
    <div class="flex justify-center">
      <button
        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
        type="submit">
        Submit Post
      </button>
    </div>
  </form>

<br>  
{{-- Message handling --}}
  <div class="container mx-auto px-15">
    @if(session()->has('status'))
    <?php $message = session('status'); ?>
    <x-successmsg :message="$message" />
    @endif



    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <x-errormsg :message="$error" />
    @endforeach
    @endif
  </div>



</x-app-layout>