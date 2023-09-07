<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-300 dark:text-gray-200 leading-tight">
            Crews
        </h2>
    </x-slot>

    <ul>
        @foreach($crews as $crew)
        <li>
            {{ $crew->call_sign }}
        </li>
        @endforeach
    </ul>

</x-app-layout>
