<div wire:poll.5s="next" class="relative w-full h-screen overflow-hidden">
    @foreach ($carouselFull as $index => $item)
        <div
            @if ($active === $index) class="absolute inset-0 opacity-100 transition-opacity duration-1000"
            @else 
                class="absolute inset-0 opacity-0 transition-opacity duration-1000" @endif>
            <img src="{{ env('API_ADMIN') . $item->image ?? null }}" class="w-full h-screen object-cover">
            <div class="w-full">
                <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto ">
                    <div class="relative">
                        <div class="absolute inset-x-0 bottom-0">
                            <div
                                class="text-white rounded-xl bg-slate-800/25 backdrop-blur-xs text-shadow-md text-center m-3 p-4">
                                <h3 class="font-medium text-xl ">{{ $item->title ?? null }}</h3>
                                <p class="font-light text-md ">{{ $item->description ?? null }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="hidden md:block">
        <button wire:click="previous"
            class="absolute top-1/2 left-6 -translate-y-1/2 bg-white/20 text-white p-3 rounded-xl hover:bg-white/50 z-20">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </button>
        <button wire:click="next"
            class="absolute top-1/2 right-6 -translate-y-1/2 bg-white/20 text-white p-3 rounded-xl hover:bg-white/50 z-20">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </button>
    </div>
</div>
