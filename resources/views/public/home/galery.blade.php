<section id="galery">
    <div class="w-full py-5">
        <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto space-y-8 p-3">
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
        </div>
    </div>
</section>
