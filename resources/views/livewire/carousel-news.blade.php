@php
    use Carbon\Carbon;
@endphp
<div wire:poll.5s="next" class="relative w-full max-w-6xl mx-auto aspect-square">
    @if ($carouselNews->isNotEmpty())
        @foreach ($carouselNews as $index => $item)
            <div
                class="{{ $active === $index ? 'opacity-100' : 'opacity-0' }} absolute inset-0 transition-opacity duration-1000">
                <div class="overflow-hidden rounded-xl relative">
                    <img src="{{ env('API_SIPB') . $item->image ?? null }}" class="aspect-square object-cover w-full">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent p-6 flex flex-col justify-end">
                        <p class="text-sm text-gray-200">
                            {{ Carbon::parse($item->date)->translatedFormat('l, j F Y') }}
                            |
                            {{ $item->category ?? null }}
                        </p>
                        <h2 class="text-2xl md:text-3xl font-bold text-white line-clamp-2 mb-2">
                            {{ $item->title ?? null }}
                        </h2>
                        <a wire:navigate href="{{ route('news.show', $item->slug ?? null) }}"
                            class="bg-white/90 text-gray-900 px-4 py-2 rounded-xl text-sm font-medium w-fit hover:bg-white">
                            Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="absolute bottom-4 right-4 flex items-center space-x-3 text-white">
            <button wire:click="previous" class="p-2 bg-black/20 rounded-full hover:bg-black/40">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </button>
            <span class="text-sm">
                {{ $active + 1 }} dari {{ count($carouselNews) }}
            </span>
            <button wire:click="next" class="p-2 bg-black/20 rounded-full hover:bg-black/40">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>
    @else
        <x-public.empty />
    @endif
</div>
