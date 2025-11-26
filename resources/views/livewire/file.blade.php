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
                <div class="space-y-2">
                    <h3 class="text-sm text-slate-500 line-clamp-1">
                        {{ $item->created_at ? $item->formatDayDateTime($item->created_at) : null }}
                    </h3>
                    <h1 class="line-clamp-6">
                        {{ $item->title ?? null }}
                    </h1>
                    <div class="flex justify-start">
                        <a wire:navigate href="{{ route('file.show', $item->slug) }}"
                            class="inline-flex items-center gap-2 px-3 py-1 border border-slate-200 rounded-xl text-slate-700 bg-white hover:bg-emerald-500 hover:text-white transition">
                            {{ Str::title(__('selengkapnya')) }}
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
        <x-load-more />
    @endif
</div>
