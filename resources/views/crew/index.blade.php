<x-app-layout>
    <div class="bg-gray-800 py-24 sm:py-32">
        <div class="mx-auto grid max-w-4xl gap-x-8 gap-y-16 px-4 sm:px-6 lg:px-8 xl:grid-cols-3">
            @foreach($crews as $crew)
            <ul role="list" class="grid border border-gray-300 hover:bg-gray-950 cursor-pointer rounded-[120rem]  shadow-md gap-8 sm:grid-cols-2" onclick="window.location.href='{{ route("crews.show", $crew->id) }}'">
                <li class="p-4 rounded-lg w-fit">
                    <div class="flex items-center gap-4 w">
                        <img class="h-16 w-16 rounded-full" src="https://picsum.photos/200" alt="{{ $crew->call_sign }}">
                        <div class="flex flex-col">
                            <h3 class="text-lg font-semibold text-indigo-300">{{ $crew->call_sign }}</h3>
                        </div>
                    </div>
                </li>
            </ul>
            @endforeach
        </div>
    </div>
</x-app-layout>
