<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@vite('resources/js/map.js')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-300 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="flex flex-row bg-gray-800 py-12">
        <div id="map" class="bg-gray-800 w-60vw h-60vh self-center"></div>

        <p class="w-[443px] h-[138px] left-[1117px] top-[142px] absolute text-black text-[50px] font-bold">
            Incident reports
        </p>
        <div class="w-[448px] h-[172px] left-[1117px] top-[484px] absolute">

            <div class="w-[448px] h-[172px] left-0 top-0 absolute justify-center items-center inline-flex">
                <div class="w-[448px] h-[172px] bg-white rounded-[10px]"></div>
            </div>
            <div class="w-[369px] h-[81px] left-[30px] top-[80px] absolute">
                <div class="w-[357.67px] h-3 left-0 top-[71px] absolute">
                    <div class="w-[357.67px] h-2 left-0 top-[2px] absolute justify-center items-center inline-flex"></div>
                    <div class="w-[230px] h-3 left-0 top-0 absolute"></div>
                </div>
                <p class="left-[3px] top-[40px] absolute text-black text-xl font-bold leading-tight">
                    Severity level:
                </p>
            </div>
            <p class="left-[30px] top-[10px] absolute text-black text-xl font-bold leading-tight">
                Incident type:
            </p>
        </div>
        <div class="w-[448px] h-[172px] left-[1117px] top-[238px] absolute">
            <div class="w-[448px] h-[172px] left-0 top-0 absolute justify-center items-center inline-flex">
                <div class="w-[448px] h-[172px] bg-white rounded-[10px]"></div>
            </div>
            <div class="w-[369px] h-[81px] left-[30px] top-[80px] absolute">
                <p class="left-[3px] top-[40px] absolute text-black text-xl font-bold leading-tight">
                    Severity level:
                </p>
            </div>
            <p class="left-[30px] top-[10px] absolute text-black text-xl font-bold leading-tight">
                Incident type:
            </p>
        </div>
        <p class="left-[1313px] top-[301px] absolute text-black text-xl font-bold leading-tight">
            Low beach Casino
        </p>
        <p class="w-[214px] left-[1147px] top-[284px] absolute text-black text-xl font-bold leading-tight">
            Near points of interest:
        </p>
        <p class="left-[1313px] top-[248px] absolute text-black text-xl font-bold leading-tight">
            Robot malfunction
        </p>
        <p class="left-[1313px] top-[547px] absolute text-black text-xl font-bold leading-tight">
            Royal Bear Inn
        </p>
        <p class="w-[214px] left-[1147px] top-[530px] absolute text-black text-xl font-bold leading-tight">
            Near points of interest:
        </p>
        <p class="left-[1313px] top-[494px] absolute text-black text-xl font-bold leading-tight">
            Gas station explosion
        </p>
        <div class="w-[448px] h-[172px] left-[1117px] top-[740px] absolute">
            <div class="w-[448px] h-[172px] left-0 top-0 absolute justify-center items-center inline-flex">
                <div class="w-[448px] h-[172px] bg-white rounded-[10px]"></div>
            </div>
            <div class="w-[369px] h-[81px] left-[30px] top-[80px] absolute">
                <p class="left-[3px] top-[40px] absolute text-black text-xl font-bold leading-tight">
                    Severity level:
                </p>
            </div>
            <p class="left-[30px] top-[10px] absolute text-black text-xl font-bold leading-tight">
                Incident type:
            </p>
        </div>
        <p class="left-[1313px] top-[803px] absolute text-black text-xl font-bold leading-tight">
            Golden Coffee Shop
        </p>
        <p class="w-[214px] left-[1147px] top-[786px] absolute text-black text-xl font-bold leading-tight">
            Near points of interest:
        </p>
        <p class="left-[1313px] top-[750px] absolute text-black text-xl font-bold leading-tight">
            Robot massacre
        </p>

    </div>
</x-app-layout>
