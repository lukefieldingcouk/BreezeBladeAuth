<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Post Feed
        </h2>
    </x-slot>

    <br>

    <div class="container mx-auto px-4">
    <x-individualpost :$indpost/>

    </div>

    

</x-app-layout>