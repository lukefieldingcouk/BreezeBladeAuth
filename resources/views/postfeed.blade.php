<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Post Feed
        </h2>
    </x-slot>

    <br>


<div class="container m-auto p-2">
<!-- Post cards, passing $post variable from this page into post-box.blade.php component. -->
<x-post-box :$post/>
<br>

{!! $post->render() !!}
   
</div>







</x-app-layout>