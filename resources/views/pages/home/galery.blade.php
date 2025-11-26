<x-section id="galery">
    <x-wrapper class="py-12">
        <x-container class="space-y-8">
            <div class="w-full flex justify-center">
                <div class="space-y-2 text-center">
                    <h1 class="text-3xl font-bold text-emerald-500">
                        {{ Str::title(__('galeri')) }}
                    </h1>
                    <h3 class="text-xl">
                        {{ Str::title(__('galeri foto dan vidio kegiatan pemerintah daerah')) }}
                    </h3>
                    <div
                        class="w-full md:w-xl h-0.5 mx-auto bg-gradient-to-r from-transparent via-emerald-500 to-transparent">
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-full md:col-span-6">
                    @foreach ($video as $item)
                        <div class="w-full overflow-hidden rounded-xl">
                            <iframe class="w-full aspect-square object-cover rounded-xl"
                                src="https://www.youtube.com/embed/{{ $item->embed ?? null }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    @endforeach
                </div>
                <div class="col-span-full md:col-span-6">
                    <div class="grid grid-cols-12 gap-4">
                        @foreach ($image as $item)
                            <div class="col-span-6">
                                <div class="overflow-hidden rounded-xl">
                                    <img src="{{ env('APP_URL_ASSET') . $item->file ?? null }}"
                                        class="aspect-square object-cover rounded-xl transition duration-500 ease-in-out hover:scale-110">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <footer class="flex items-center gap-4">
                <div class="flex-grow border-b border-emerald-500"></div>
                <a wire:navigate href="{{ route('galery.index') }}"
                    class="inline-flex items-center gap-2 border border-slate-200 px-4 py-2 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white transition">
                    Selengkapnya
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                    </svg>
                </a>
            </footer>
        </x-container>
    </x-wrapper>
</x-section>
