{{-- <x-public.layout.app-layout title="{{ Str::headline(__('informasi dan pengumuman')) }}">

    <header id="header" class="mt-28">
        <div class="w-full">
            <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">
                <h3 class="text-lg bg-linear-to-r from-emerald-500 to-emerald-700 bg-clip-text text-transparent">
                    Daftar
                </h3>
                <div class="flex items-center gap-4">
                    <h1
                        class="font-bold text-3xl bg-linear-to-r from-emerald-500 to-emerald-700 bg-clip-text text-transparent">
                        Publikasi Dokumen
                    </h1>
                    <div class="flex-1 border-b border-emerald-500"></div>
                </div>
            </div>
        </div>
    </header>
    <livewire:document />
</x-public.layout.app-layout> --}}


<x-layouts.app title="{{ Str::headline(__('pengumuman')) }}">
    <x-section id="news" class="pt-16">
        <x-wrapper class="py-12">
            <x-container class="space-y-8">
                <div class="space-y-2">
                    <h1 class="text-3xl font-bold text-emerald-500">
                        {{ Str::title(__('publikasi dokumen')) }}
                    </h1>
                    <h3 class="text-xl">
                        {{ Str::title(__('publikasi dokumen kinerja pemerintah')) }}
                    </h3>
                    <div class="w-full h-0.5 bg-linear-to-r from-emerald-500 to-transparent"></div>
                </div>
                <livewire:file />
            </x-container>
        </x-wrapper>
    </x-section>
</x-layouts.app>
