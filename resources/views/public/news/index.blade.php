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

    <livewire:search-news />

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
