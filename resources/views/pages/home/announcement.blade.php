<x-section id="announcement">
    <x-wrapper class="py-12">
        <x-container
            class="space-y-8 bg-slate-200 bg-[url(/public/image/background/repeating-triangles.svg)] bg-center bg-fixed bg-repeat rounded-xl p-4">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                <div class="md:col-span-6 lg:col-span-4">
                    <div class="sticky top-[50%] space-y-4">
                        <h1 class="text-3xl font-bold text-emerald-500">
                            {{ Str::title(__('pengumuman')) }}
                        </h1>
                        <h3 class="text-xl">
                            {{ Str::title(__('akses informasi dan pengumuman terbaru dari pemerintah')) }}
                        </h3>
                        <div class="w-full h-0.5 bg-linear-to-r from-emerald-500 to-transparent"></div>
                        <div class="flex justify-start">
                            <a wire:navigate href="{{ route('announcement.index') }}"
                                class="inline-flex items-center gap-2 px-3 py-1 border border-slate-200 rounded-xl text-slate-700 bg-white hover:bg-emerald-500 hover:text-white transition">
                                Selengkapnya
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-6 lg:col-span-8">
                    <div class="w-full ">
                        <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto">
                            <div class="grid grid-cols-1 gap-4">
                                @foreach ($announcement as $item)
                                    <div class="col-span-full">
                                        <div class="flex items-center gap-4 shadow-xs rounded-xl bg-white">
                                            <div class="p-4">
                                                <h6 class=" text-slate-500 text-sm line-clamp-1">
                                                    {{ $item->created_at ? $item->formatDayDate($item->created_at) : null }}
                                                </h6>
                                                <h1 class="text-slate-700 text-lg font-normal line-clamp-2">
                                                    <a wire:navigate
                                                        href="{{ route('announcement.show', $item->slug ?? null) }}"
                                                        class="hover:underline">
                                                        {{ $item->title ?? null }}
                                                    </a>
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </x-wrapper>
</x-section>
