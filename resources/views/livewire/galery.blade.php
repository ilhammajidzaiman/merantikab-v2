<div id="searching" class="space-y-8">
    <div class="space-y-4">
        <div class="relative w-full">
            <label for="search" class="sr-only">Search</label>
            <input wire:model.live="search" type="text" name="search" id="search" placeholder="Cari..."
                class="w-full bg-slate-100 text-slate-700 placeholder-slate-400 shadow rounded-lg px-5 py-3  pl-13 focus:outline-none focus:ring-1 focus:ring-emerald-500">
            <button type="reset"
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
        <div class="sm:col-span-3">
            <div class="relative w-full">
                <div class="grid grid-cols-1">
                    <select wire:model.live="type" name="type" id="type"
                        class="col-start-1 row-start-1 w-full appearance-none rounded-lg shadow bg-slate-100 text-slate-700 px-5 py-3 pl-13 focus:ring-1 focus:ring-emerald-500 focus:outline-none outline-gray-300 focus:outline-emerald-600">
                        <option value="1">{{ Str::title(__('foto')) }}</option>
                        <option value="2">{{ Str::title(__('vidio')) }}</option>
                    </select>
                    <button type="reset"
                        class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-500 hover:text-emerald-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                        </svg>
                    </button>
                    <svg viewBox="0 0 16 16" fill="currentColor" data-slot="icon" aria-hidden="true"
                        class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4">
                        <path
                            d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd" fill-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
        @forelse($data as $item)
            @if ($type == 1)
                <div class="md:col-span-6 lg:col-span-4 space-y-2">
                    @if ($item->file === null)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-10 text-emerald-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                    @else
                        <div class="overflow-hidden rounded-xl">
                            <img src="{{ $item->file ? env('APP_URL_ASSET') . $item->file : asset('/image/default-img.svg') }}"
                                class="aspect-video object-cover rounded-xl transition duration-300 ease-in-out hover:scale-105">
                        </div>
                        <h1 class="text-lg font-normal text-slate-600 line-clamp-3">
                            {{ $item->title }}
                        </h1>
                        <h3 class="text-sm text-slate-500">
                            {{ $item->date ?? null }}
                        </h3>
                    @endif
                </div>
            @else
                <div class="md:col-span-6 lg:col-span-4 space-y-4">
                    @if ($item->embed === null)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-10 text-emerald-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                    @else
                        <div class="overflow-hidden rounded-xl">
                            <iframe class="aspect-video object-cover rounded-xl"
                                src="https://www.youtube.com/embed/{{ $item->embed ?? null }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                        <h1 class="text-lg font-normal text-slate-600 line-clamp-3">
                            {{ $item->title }}
                        </h1>
                        <h3 class="text-sm text-slate-500">
                            {{ $item->date ?? null }}
                        </h3>
                    @endif
                </div>
            @endif
        @empty
            <x-notfound />
        @endforelse
    </div>
    @if ($more)
        <x-load-more />
    @endif
</div>
