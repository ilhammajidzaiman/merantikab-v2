{{-- <div wire:poll.5s="next" class="relative w-full max-w-6xl mx-auto aspect-square">
    @if ($carouselNews->isNotEmpty())
        @foreach ($carouselNews as $index => $item)
            <div wire:key="carousel-{{ $index }}-{{ $item->slug ?? $index }}"
                class="{{ $active === $index ? 'opacity-100' : 'opacity-0 pointer-events-none' }} absolute inset-0 transition-opacity duration-1000">
                <div class="overflow-hidden rounded-xl relative">
                    <img src="{{ env('API_SIPB') . ($item->image ?? '') }}" alt="{{ $item->title ?? '' }}"
                        class="aspect-square object-cover w-full">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent p-6 flex flex-col justify-end">
                        <p class="text-xs md:text-sm text-gray-200">
                            {{ $item->date ?? null }}
                            | {{ $item->category ?? null }}
                        </p>
                        <a wire:navigate href="{{ route('news.show', $item->slug ?? null) }}">
                            <h2 class="text-xl md:text-2xl font-normal text-white line-clamp-2 mb-10 hover:underline">
                                {{ $item->title ?? null }}
                            </h2>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="absolute bottom-4 left-4 flex items-center space-x-4 text-white mx-2">
            <button wire:click="previous" class="p-2 bg-emerald-500 rounded-full hover:bg-emerald-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </button>
            <span class="text-sm">
                {{ $active + 1 }} dari {{ count($carouselNews) }}
            </span>
            <button wire:click="next" class="p-2 bg-emerald-500 rounded-full hover:bg-emerald-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>
    @else
        <x-public.empty />
    @endif
</div> --}}

{{-- <div wire:poll.5s="next" class="relative w-full max-w-6xl mx-auto aspect-square">
    @if ($carouselNews->isNotEmpty())
        @php $item = $carouselNews[$active]; @endphp
        <div class="absolute inset-0 transition-opacity duration-1000 opacity-100">
            <div class="overflow-hidden rounded-xl relative">
                <img src="{{ env('API_SIPB') . $item->image ?? null }}" class="aspect-square object-cover w-full">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent p-6 flex flex-col justify-end">
                    <p class="text-xs md:text-sm text-gray-200">
                        {{ $item->date ?? null }}
                        |
                        {{ $item->category ?? null }}
                    </p>
                    <h2 class="text-2xl font-normal text-white line-clamp-2 mb-2">
                        {{ $item->title ?? null }}
                    </h2>
                    <a wire:navigate href="{{ route('news.show', $item->slug ?? null) }}"
                        class="bg-white/90 text-gray-900 px-4 py-2 rounded-xl text-sm font-medium w-fit hover:bg-white">
                        Selengkapnya
                    </a>
                </div>
            </div>
        </div>
        <div class="absolute bottom-4 right-4 flex items-center space-x-3 text-white">
            <button wire:click="previous" class="p-2 bg-emerald-500 rounded-full hover:bg-emerald-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </button>
            <span class="text-sm">
                {{ $active + 1 }} dari {{ $carouselNews->count() }}
            </span>
            <button wire:click="next" class="p-2 bg-emerald-500 rounded-full hover:bg-emerald-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>
    @else
        <x-public.empty />
    @endif
</div> --}}

<div wire:poll.5s="next" class="relative w-full max-w-6xl mx-auto aspect-square">
    @if ($carouselNews->isNotEmpty())
        @php $item = $carouselNews[$active]; @endphp
        <div class="absolute inset-0 transition-opacity duration-1000 opacity-100">
            <div class="overflow-hidden rounded-xl relative">
                <img src="{{ env('API_SIPB') . ($item->image ?? '') }}" alt="{{ $item->title ?? '' }}"
                    class="aspect-square object-cover w-full">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent p-6 flex flex-col justify-end">
                    <p class="text-xs md:text-sm text-gray-200">
                        {{ $item->date ?? null }} | {{ $item->category ?? null }}
                    </p>
                    <a wire:navigate href="{{ route('news.show', $item->slug ?? null) }}">
                        <h2 class="text-xl md:text-2xl font-normal text-white line-clamp-2 mb-10 hover:underline">
                            {{ $item->title ?? null }}
                        </h2>
                    </a>
                </div>
            </div>
        </div>
        <div class="absolute bottom-4 left-4 flex items-center space-x-4 text-white mx-2">
            <button wire:click="previous" class="p-2 bg-emerald-500 rounded-full hover:bg-emerald-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </button>
            <span class="text-sm">
                {{ $active + 1 }} dari {{ count($carouselNews) }}
            </span>
            <button wire:click="next" class="p-2 bg-emerald-500 rounded-full hover:bg-emerald-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>
        <div class="absolute bottom-4 right-4 flex space-x-2">
            @foreach ($carouselNews as $index => $bullet)
                <button wire:click="$set('active', {{ $index }})"
                    class="w-3 h-3 rounded-full transition
                    {{ $active === $index ? 'bg-emerald-500 scale-125' : 'bg-white/60 hover:bg-white' }}">
                </button>
            @endforeach
        </div>
        <div class="hidden">
            @foreach ($carouselNews as $preload)
                <img src="{{ env('API_SIPB') . ($preload->image ?? '') }}" alt="">
            @endforeach
        </div>
    @else
        <x-public.empty />
    @endif
</div>
