<section id="galeri">
    <div class="w-full py-5">
        <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">

            <section class="text-center py-10">
                <h3 class="flex items-center justify-center tracking-wide">
                    <span class="w-10 h-px bg-emerald-500"></span>
                    <span class="bg-emerald-500 text-white px-3 py-px rounded-xl">Galeri</span>
                    <span class="w-10 h-px bg-emerald-500"></span>
                </h3>
                <h1
                    class="font-bold text-3xl bg-linear-to-r from-emerald-500 to-emerald-700 bg-clip-text text-transparent mt-4">
                    Foto dan Video
                </h1>
            </section>

            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-full md:col-span-6">
                    <div class="w-full overflow-hidden rounded-xl">
                        <iframe class="w-full aspect-square object-cover rounded-xl"
                            src="https://www.youtube.com/embed/{{ $video->embed ?? null }}" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-span-full md:col-span-6">
                    <div class="grid grid-cols-12 gap-4">
                        @foreach ($foto as $item)
                            <div class="col-span-6">
                                <div class="overflow-hidden rounded-xl">
                                    <img src="{{ env('API_ADMIN') . $item->image ?? null }}"
                                        class="aspect-square object-cover rounded-xl transition duration-500 ease-in-out hover:scale-110">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <footer class="w-full flex justify-center mt-4">
                <a wire:navigate href="{{ route('galery.index') }}"
                    class="text-normal text-white flex items-center gap-2 bg-emerald-500  px-4 py-2 rounded-xl hover:bg-emerald-600">
                    Selengkapnya
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                    </svg>
                </a>
            </footer>
        </div>
    </div>
</section>
