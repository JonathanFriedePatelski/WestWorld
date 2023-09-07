<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-300 dark:text-gray-200 leading-tight">
            Crews
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl m-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full bg-gray-900 ">
                    <thead class="bg-gray-900">
                        <tr>
                            <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Call Sign</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($crews as $crew)
                        <tr class="hover:bg-gray-950 cursor-pointer" onclick="window.location.href='{{ route("crews.show", $crew->id) }}'">
                            <td class=" px-6 py-4">{{ $crew->id }}</td>
                            <td class="px-6 py-4">{{ $crew->call_sign }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
