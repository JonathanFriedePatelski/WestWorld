<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-300 dark:text-gray-200 leading-tight">
            Points Of Interest
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl m-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full bg-gray-900 ">
                    <thead class="bg-gray-900">
                        <tr>
                            <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Latitude</th>
                            <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Longitude</th>
                            <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Type</th>
                            <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Narrative Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pointsOfInterest as $poi)
                        <tr class="hover:bg-gray-950 cursor-pointer text-white border-2 border-indigo-950 bg-indigo-500"" onclick="window.location.href='{{ route("pointsofinterest.show", $poi->id) }}'">
                            <td class="px-6 py-4">{{ $poi->id }}</td>
                            <td class="px-6 py-4">{{ $poi->title }}</td>
                            <td class="px-6 py-4">{{ $poi->latitude }}</td>
                            <td class="px-6 py-4">{{ $poi->longitude }}</td>
                            <td class="px-6 py-4">{{ $poi->description }}</td>
                            <td class="px-6 py-4">{{ $poi->type }}</td>
                            <td class="px-6 py-4">{{ $poi->narrative_level }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
