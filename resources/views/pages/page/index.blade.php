<x-layouts.app title="{{ Str::headline(__('dokumen')) }}">
    <x-section id="news" class="pt-16">
        <x-wrapper class="py-12">
            <x-container class="space-y-8">
                <div class="space-y-2">
                    <h1 class="text-3xl font-bold text-emerald-500">
                        {{ Str::title(__('halaman')) }}
                    </h1>
                    <h3 class="text-xl">
                        {{ Str::title(__('konten halaman')) }}
                    </h3>
                    <div class="w-full h-0.5 bg-linear-to-r from-emerald-500 to-transparent"></div>
                </div>
                {{-- <livewire:page /> --}}
            </x-container>
        </x-wrapper>
    </x-section>
</x-layouts.app>
