<div class="space-y-8">
    <nav id="searching">
        <div class="relative w-full">
            <label for="search" class="sr-only">Search</label>
            <input wire:model.live="search" type="text" name="search" id="search" placeholder="Cari..."
                class="w-full bg-slate-100 text-slate-700 placeholder-slate-400 shadow-md rounded-lg px-5 py-3  pl-13 focus:outline-none focus:ring-1 focus:ring-emerald-500">
            <button type="submit"
                class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-500 hover:text-emerald-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <svg wire:loading class="animate-spin size-8 fill-emerald-500" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 640 640">
                    <path
                        d="M286.7 96.1C291.7 113 282.1 130.9 265.2 135.9C185.9 159.5 128.1 233 128.1 320C128.1 426 214.1 512 320.1 512C426.1 512 512.1 426 512.1 320C512.1 233.1 454.3 159.6 375 135.9C358.1 130.9 348.4 113 353.5 96.1C358.6 79.2 376.4 69.5 393.3 74.6C498.9 106.1 576 204 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320C64 204 141.1 106.1 246.9 74.6C263.8 69.6 281.7 79.2 286.7 96.1z" />
                </svg>
            </div>
        </div>
    </nav>

    @if ($data)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($data as $item)
                <div class="bg-white rounded-xl overflow-hidden shadow">
                    <div class="relative aspect-video overflow-hidden">
                        <img src="{{ $item['file'] }}" alt="image"
                            class="bg-slate-200 w-full h-full object-cover transition-all duration-300 ease-in-out hover:scale-110">
                        <h3 class="absolute left-0 bottom-4 ">
                            <a wire:navigate href=""
                                class="flex items-center text-white text-shadow-xs bg-emerald-500/50 backdrop-blur-xs px-4 py-1 rounded-r-lg hover:underline ">
                                <div class="line-clamp-1">
                                    {{ $item['category'] }}
                                </div>
                            </a>
                        </h3>
                    </div>
                    <div class="space-y-2 p-4">
                        <h1 class="line-clamp-3">
                            <a wire:navigate href="{{ route('news.show', $item['slug']) }}" class="hover:underline">
                                {{ $item['title'] }}
                            </a>
                        </h1>
                        <h6 class="text-slate-500 text-sm line-clamp-1">
                            {{ $item['published_at'] }}
                        </h6>
                    </div>
                </div>
            @endforeach
        </div>
        @if ($more)
            <x-more />
        @endif
    @else
        <x-error-text />
    @endif

</div>
