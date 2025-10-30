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

    <livewire:news />
</x-public.layout.app-layout>
