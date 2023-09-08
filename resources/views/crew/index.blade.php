<x-app-layout>
    <div class="bg-white py-24 sm:py-32 border-red-700 border-2">
        <div class="mx-auto grid max-w-4xl gap-x-8 gap-y-16 px-4 sm:px-6 lg:px-8 xl:grid-cols-3">
            @foreach($crews as $crew)
            <ul role="list" class="grid border border-gray-300  rounded-[120rem]  shaow-md shadow-lg gap-8 sm:grid-cols-2">
                <li class=p-4 rounded-lg w-fit hover:bg-gray-950 cursor-pointer" onclick="window.location.href='{{ route("crews.show", $crew->id) }}'">
                    <div class="flex items-center gap-4 w">
                        <img class="h-16 w-16 rounded-full" src="https://picsum.photos/200" alt="{{ $crew->call_sign }}">
                        <div class="flex flex-col">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $crew->call_sign }}</h3>
                        </div>
                    </div>
                </li>
            </ul>
            @endforeach
        </div>
    </div>
</x-app-layout>
