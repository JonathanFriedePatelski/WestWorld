<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-300 dark:text-gray-200 leading-tight">
            Crews
        </h2>
    </x-slot>

    <ul>
        @foreach($pointsOfInterest as $poi)
        <li>
            {{ $poi->title }}
        </li>
        @endforeach
    </ul>

</x-app-layout>
