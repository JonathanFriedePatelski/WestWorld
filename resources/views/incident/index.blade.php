    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-indigo-300 dark:text-gray-200 leading-tight">
                Incidents
            </h2>
        </x-slot>

        <div class="py-8">
            <div class="max-w-7xl m-auto sm:px-6 lg:px-8">
                <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="min-w-full bg-gray-900 ">
                        <thead class="bg-gray-900">
                            <tr>
                                <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Latitude</th>
                                <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Longitude</th>
                                <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Severity</th>
                                <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 bg-indigo-950 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Occurred At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($incidents as $incident)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $incident->id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $incident->latitude }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $incident->longitude }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $incident->type }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $incident->severity }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $incident->description }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $incident->occurred_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-app-layout>
