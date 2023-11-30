<form action="{{ route('PostController.storecomment')}}" method="POST">
    @csrf
    <div class="mb-4">
      <label for="comment" class="block text-gray-700 text-sm font-bold mb-2">Comment on this post:</label>
      {{-- Hidden input, posting Individual Post ID to Controller as PostID (column in comments table) --}}
      <input type="hidden" id="postid" name="postid" value="{{ $indpost->id }}">
      <input type="hidden" id="UserID" name="UserID" value="{{ Auth::id() }}">
      <textarea id="content" name="content" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" required></textarea>
    </div>
    <label for="comment" class="block text-gray-700 text-sm mb-2">Commenting as: {{ Auth::user()->name }}</label>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>