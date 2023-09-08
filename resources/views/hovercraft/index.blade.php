<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-300 dark:text-gray-200 leading-tight">
            Hovercrafts
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl m-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full bg-gray-900 ">
                    <thead class="bg-gray-900">
                        <tr>
                            <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Crew ID</th>
                            <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Fuel Level</th>
                            <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Wear Level</th>
                            <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hovercrafts as $hovercraft)
                        <tr class="hover:bg-gray-950 cursor-pointer text-white border-2 border-indigo-950 bg-indigo-500" onclick="window.location.href='{{ route("hovercraft.show", $hovercraft->id) }}'">
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $hovercraft->crew_id }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $hovercraft->fuel_level }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $hovercraft->wear_level }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $hovercraft->age }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
