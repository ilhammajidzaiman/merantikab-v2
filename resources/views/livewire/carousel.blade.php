<div wire:poll.5s="next" class="relative w-full max-w-6xl mx-auto aspect-video">
    {{-- carousel --}}
    @foreach ($carousel as $index => $item)
        <div
            @if ($active === $index) class="absolute inset-0 opacity-100 transition-opacity duration-1000"
            @else 
                class="absolute inset-0 opacity-0 transition-opacity duration-1000" @endif>
            <div class="overflow-hidden rounded-xl relative">
                <img src="{{ $item->image ?? null }}"
                    class="aspect-video object-cover transition duration-1000 ease-in-out hover:scale-110 w-full">
                <div class="absolute bottom-12 left-0 w-full px-6 invisible md:visible">
                    <div
                        class=" text-white p-4 rounded-xl max-w-full bg-white/50 backdrop-blur-xs text-shadow-md text-center">
                        <h3 class="text-xl font-bold line-clamp-1">{{ $item->title ?? null }}</h3>
                        <p class="text-md line-clamp-1">{{ $item->description ?? null }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- button --}}
    {{-- <button wire:click="previous"
        class="absolute top-1/2 left-6 -translate-y-1/2 bg-white/20 text-white p-3 rounded-xl hover:bg-white/50">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>
    </button>
    <button wire:click="next"
        class="absolute top-1/2 right-6 -translate-y-1/2 bg-white/20 text-white p-3 rounded-xl hover:bg-white/50">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
    </button> --}}

    {{-- indicator --}}
    {{-- <div class="absolute bottom-3 w-full flex justify-center space-x-2">
        @foreach ($carousel as $index => $item)
            <button wire:click="goTo({{ $index }})"
                class="w-3 h-3 rounded-full transition-colors hover:bg-white/75 {{ $active === $index ? 'bg-white' : 'bg-white/20' }}"></button>
        @endforeach
    </div> --}}
</div>
