<div>
    <x-searchbar />
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-6">
        @forelse ($data as $item)
            <div class="overflow-hidden flex items-center gap-4 shadow-md rounded-xl bg-white hover:shadow-md">
                <div
                    class="aspect-3/4 w-32 h-full flex items-center justify-center overflow-hidden rounded-xl shrink-0 bg-slate-200">
                    @if ($item->file === null)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-10 text-emerald-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                    @else
                        <img src="{{ env('APP_URL_ASSET') . $item->file ?? null }}" alt="image"
                            class="w-full h-full object-cover transition duration-300 ease-in-out hover:scale-110">
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="line-clamp-1">
                        {{ $item->created_at ? $item->formatDayDateTime($item->created_at) : null }}
                    </h3>
                    <h1 class="line-clamp-3">
                        {{ $item->title ?? null }}
                    </h1>
                    <div class="mt-4 flex justify-start">
                        <a wire:navigate href="{{ route('announcement.show', $item->slug) }}"
                            class="inline-flex items-center gap-2 px-3 py-1 border border-slate-200 rounded-xl text-slate-700 bg-white hover:bg-emerald-500 hover:text-white transition">
                            Selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <x-notfound />
        @endforelse
    </div>

    @if ($more)
        <div id="pagination" class="flex items-center gap-4">
            <div class="flex-grow border-b border-emerald-500"></div>
            <button wire:click="loadMore"
                class="inline-flex items-center gap-2 border border-slate-200 px-4 py-2 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white transition">
                Tampilkan Lebih Banyak
                <svg wire:loading class="animate-spin size-6 fill-white" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 640 640">
                    <path
                        d="M286.7 96.1C291.7 113 282.1 130.9 265.2 135.9C185.9 159.5 128.1 233 128.1 320C128.1 426 214.1 512 320.1 512C426.1 512 512.1 426 512.1 320C512.1 233.1 454.3 159.6 375 135.9C358.1 130.9 348.4 113 353.5 96.1C358.6 79.2 376.4 69.5 393.3 74.6C498.9 106.1 576 204 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320C64 204 141.1 106.1 246.9 74.6C263.8 69.6 281.7 79.2 286.7 96.1z" />
                </svg>
            </button>
        </div>
    @endif
</div>
