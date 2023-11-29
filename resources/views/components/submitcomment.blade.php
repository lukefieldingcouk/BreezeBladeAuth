<form action="{{ route('PostController.storecomment')}}" method="POST">
    @csrf
    <div class="mb-4">
      <label for="comment" class="block text-gray-700 text-sm font-bold mb-2">Comment on this post:</label>
      {{-- Hidden input, posting Individual Post ID to Controller as PostID (column in comments table) --}}
      <input type="hidden" id="postid" name="postid" value="{{ $indpost->id }}">
      <textarea id="content" name="content" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" required></textarea>
    </div>
    <label for="comment" class="block text-gray-700 text-sm mb-2">Commenting as: {{ Auth::user()->name }}</label>
    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600 transition-colors duration-300">Submit</button>
  </form>