@php
    use Carbon\Carbon;
@endphp

<div>
    <nav id="searching">
        <div class="w-full">
            <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">
                <form action="/search" method="GET" class="relative w-full">
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
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                    @forelse($data as $item)
                        <div class="md:col-span-6 lg:col-span-4">
                            <div class="mb-3">
                                <div class="overflow-hidden rounded-xl">
                                    <img src="{{ env('API_SIPB') . $item['thumbnail'] ?? null }}"
                                        class="aspect-video object-cover rounded-xl transition duration-300 ease-in-out hover:scale-105">
                                </div>
                                <h6 class="w-fit rounded-xl bg-emerald-500  text-white my-2 px-2 py-0.5">
                                    {{ $item['category'] ?? null }}
                                </h6>
                                <a wire:navigate href="{{ route('news.show', $item['slug'] ?? null) }}"
                                    class="hover:underline transition">
                                    <h1 class="text-lg font-semibold text-slate-600 line-clamp-3 my-2">
                                        {{ $item['title'] }}
                                    </h1>
                                </a>
                                <h3 class="text-sm text-slate-500">
                                    {{ Carbon::parse($item['date'])->translatedFormat('l, j F Y') }}
                                </h3>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-500">
                            Tidak ada berita ditemukan.
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
</div>
