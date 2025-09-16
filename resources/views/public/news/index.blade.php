@php
    use Carbon\Carbon;
@endphp

<x-public.layout.app-layout title="{{ Str::headline(__('berita')) }}">

    <header id="header" class="mt-28">
        <div class="w-full">
            <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">
                <h3 class="text-lg bg-linear-to-r from-emerald-500 to-emerald-700 bg-clip-text text-transparent">
                    Berita Kabupaten
                </h3>
                <div class="flex items-center gap-4">
                    <h1
                        class="font-bold text-3xl bg-linear-to-r from-emerald-500 to-emerald-700 bg-clip-text text-transparent">
                        Kepulauan Meranti
                    </h1>
                    <div class="flex-1 border-b border-emerald-500"></div>
                </div>
            </div>
        </div>
    </header>

    <nav id="searching">
        <div class="w-full">
            <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">
                <form action="/search" method="GET" class="relative w-full">
                    <label for="search" class="sr-only">Search</label>
                    <input type="text" name="search" id="search" placeholder="Cari..."
                        class="w-full bg-slate-100 text-slate-700 placeholder-slate-400 shadow-md rounded-lg px-5 py-3  pl-13 focus:outline-none focus:ring-1 focus:ring-emerald-500">
                    <button type="submit"
                        class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-500 hover:text-emerald-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <section id="news">
        <div class="w-full py-10">
            <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                    @foreach ($news as $item)
                        <div class="md:col-span-6 lg:col-span-4">
                            <div class="mb-3">
                                <div class="overflow-hidden rounded-xl">
                                    <img src="{{ env('API_SIPB') . $item->image ?? null }}"
                                        class="aspect-video object-cover rounded-xl transition duration-300 ease-in-out hover:scale-105">
                                </div>
                                <h6 class="w-fit rounded-xl bg-emerald-500  text-white my-2 px-2 py-0.5">
                                    {{ $item->category ?? null }}
                                </h6>
                                <a href="{{ route('news.show', $item->slug ?? null) }}"
                                    class="hover:underline transition">
                                    <h1 class="text-lg font-semibold text-slate-600 line-clamp-3 my-2">
                                        {{ $item->title ?? null }}
                                    </h1>
                                </a>
                                <h3 class="text-sm text-slate-500">
                                    {{ Carbon::parse($item->date)->translatedFormat('l, j F Y') }}
                                </h3>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <nav id="pagination">
        <div class="w-full">
            <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">
                <div class="flex items-center gap-4">
                    <div class="flex-grow border-b border-emerald-500"></div>
                    <a href=""
                        class="inline-flex items-center gap-2 border border-slate-200 px-4 py-2 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white transition">
                        Tampilkan Lebih Banyak
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 4.5h14.25M3 9h9.75M3 13.5h9.75m4.5-4.5v12m0 0-3.75-3.75M17.25 21 21 17.25" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </nav>

</x-public.layout.app-layout>
