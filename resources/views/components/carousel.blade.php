<div data-hs-carousel='{
        "loadingClasses": "opacity-0",
        "isAutoPlay": false
    }' class="relative">
    <div class="hs-carousel relative overflow-hidden w-full min-h-[400px] rounded-lg">
        <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
            @foreach (array_chunk($officials->toArray(), 3) as $group)
                <div class="hs-carousel-slide grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($group as $official)
                        <div class="flex justify-center h-full bg-gray-100 p-4 border">
                            <div class="block m-4 border w-full">
                                <div class="flex justify-center border">
                                    <img src="{{ asset('storage/' . $official['user']['image']) }}" alt="Official Image" class="h-64">
                                </div>
                                <div class="p-2 flex justify-center">
                                    <span class="text-2xl font-medium capitalize font-roboto text-center">
                                        {{ $official['user']['last_name'] }}, {{ $official['user']['name'] }}
                                    </span>
                                </div>
                                <div class="flex justify-center">
                                    <span class="text-blue-600 font-semibold capitalize font-roboto tracking-tight">Brgy. {{ $official['position'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    
    <button type="button" class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/[.1]">
        <span class="text-2xl" aria-hidden="true">
        <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
        </span>
        <span class="sr-only">Previous</span>
    </button>
    <button type="button" class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/[.1]">
        <span class="sr-only">Next</span>
        <span class="text-2xl" aria-hidden="true">
        <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </span>
    </button>

    <div class="hs-carousel-pagination flex justify-center mt-6 bottom-3 start-0 end-0 space-x-1">
        @foreach (array_chunk($officials->toArray(), 3) as $index => $group)
            <span class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 w-8 h-2 border border-gray-400 cursor-pointer {{ $index === 0 ? 'hs-carousel-active' : '' }}"></span>
        @endforeach
    </div>
</div>