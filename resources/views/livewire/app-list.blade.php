<div class="space-y-8">
    <x-searchbar />
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @forelse ($data as $item)
            <div class="flex flex-col justify-between h-full p-6 rounded-xl bg-slate-100 shadow">
                <div class="space-y-2">
                    <div
                        class="w-20 h-20 flex items-center justify-center rounded-xl bg-white border border-slate-200 mb-4">
                        @if ($item->file)
                            <img src="{{ env('APP_URL_ASSET') . $item->file ?? null }}" alt="Logo"
                                class="w-14 h-14 object-contain hover:scale-110 transition duration-300 ease-in-out" />
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-10 text-emerald-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                            </svg>
                        @endif
                    </div>
                    <h1 class="text-xl font-bold">
                        {{ $item->title ?? null }}
                    </h1>
                    <h3 class="text-slate-500">
                        {{ $item->description ?? null }}
                    </h3>
                </div>
                <div class="mt-4 flex justify-start">
                    <a href="{!! $item->link->url ?? null !!}" target="_blank"
                        class="inline-flex items-center gap-2 px-3 py-1 border border-slate-200 rounded-xl text-slate-700 bg-white hover:bg-emerald-500 hover:text-white transition">
                        {{ Str::title(__('kunjungi')) }}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                        </svg>
                    </a>
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

{{-- <div>
    <nav id="searching">
        <div class="w-full">
            <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">
                <form action="" method="GET" class="relative w-full">
                    <label for="search" class="sr-only">Search</label>
                    <input wire:model.live="search" type="text" name="search" id="search" placeholder="Cari..."
                        class="w-full bg-slate-100 text-slate-700 placeholder-slate-400 shadow-md rounded-lg px-5 py-3  pl-13 focus:outline-none focus:ring-1 focus:ring-emerald-500">
                    <button type="reset"
                        class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-500 hover:text-emerald-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <svg wire:loading class="animate-spin size-8 fill-emerald-500"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                            <path
                                d="M286.7 96.1C291.7 113 282.1 130.9 265.2 135.9C185.9 159.5 128.1 233 128.1 320C128.1 426 214.1 512 320.1 512C426.1 512 512.1 426 512.1 320C512.1 233.1 454.3 159.6 375 135.9C358.1 130.9 348.4 113 353.5 96.1C358.6 79.2 376.4 69.5 393.3 74.6C498.9 106.1 576 204 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320C64 204 141.1 106.1 246.9 74.6C263.8 69.6 281.7 79.2 286.7 96.1z" />
                        </svg>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    @if ($error)
        <div class="text-red-500">{{ $error }}</div>
    @endif

    <section id="news">
        <div class="w-full">
            <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 my-6">
                    @forelse($data as $item)
                        <div class="flex flex-col justify-between h-full p-6 rounded-xl bg-slate-100">
                            <div>
                                <div
                                    class="w-20 h-20 flex items-center justify-center rounded-xl bg-white border border-slate-200 mb-4">
                                    @if ($item->image === null)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-10 text-emerald-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                        </svg>
                                    @else
                                        <img src="{{ env('API_ADMIN') . $item->image ?? null }}" alt="Logo"
                                            class="w-14 h-14 object-contain hover:scale-110 transition duration-300 ease-in-out" />
                                    @endif
                                </div>
                                <h1 class="text-xl font-normal text-slate-800 mb-2 line-clamp-2 md:line-clamp-none">
                                    {{ $item->title ?? null }}
                                </h1>
                                <h3 class="text-slate-500 text-normal line-clamp-3 md:line-clamp-none">
                                    {{ $item->description ?? null }}
                                </h3>
                                <div class="text-normal break-all mt-4">
                                    <span class="text-slate-500">link:</span>
                                    <span class="text-emerald-600">{!! $item->link ?? null !!}</span>
                                </div>
                            </div>
                            <div class="mt-4 flex justify-start">
                                <a href="{!! $item->link ?? null !!}" target="_blank"
                                    class="inline-flex items-center gap-2 px-3 py-1 border border-slate-200 rounded-xl text-slate-700 bg-white hover:bg-emerald-500 hover:text-white transition">
                                    Kunjungi
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-500">
                            Data tidak ditemukan.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    @if ($hasMore)
        <nav id="pagination">
            <div class="w-full">
                <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">
                    <div class="flex items-center gap-4">
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
                </div>
            </div>
        </nav>
    @endif
</div> --}}
