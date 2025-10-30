<section id="public">
    <div class="w-full py-10">
        <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">
            <section class="text-center py-10">
                <h1
                    class="font-bold text-3xl bg-linear-to-r from-emerald-500 to-emerald-700 bg-clip-text text-transparent mt-4">
                    Publikasi Dokumen
                </h1>
            </section>
            <section class="grid grid-cols-1 md:grid-cols-2 gap-4 my-6">
                @foreach ($document as $item)
                    <div class="overflow-hidden flex items-center gap-4 shadow-md rounded-xl bg-white hover:shadow-md">

                        <div
                            class="w-32 h-full flex items-center justify-center overflow-hidden rounded-xl shrink-0 bg-slate-200">

                            @if ($item->image === null)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-10 text-emerald-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                            @else
                                <img src="{{ env('API_ADMIN') . $item->image ?? null }}" alt="image"
                                    class="w-full h-full object-cover transition duration-300 ease-in-out hover:scale-110">
                            @endif


                        </div>
                        <div class="p-4">
                            <h3 class="text-slate-500 text-normal line-clamp-1">
                                {{ $item->date ?? null }}
                            </h3>
                            <h1 class="text-slate-500 text-lg font-medium line-clamp-3">
                                {{ $item->title ?? null }}
                            </h1>
                            <div class="mt-4 flex justify-start">
                                <a wire:navigate href="{{ route('document.show', $item->slug) }}"
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
                @endforeach
            </section>
            <footer class="flex items-center gap-4">
                <div class="flex-grow border-b border-emerald-500"></div>
                <a wire:navigate href="{{ route('document.index') }}"
                    class="inline-flex items-center gap-2 border border-slate-200 px-4 py-2 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white transition">
                    Selengkapnya
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                    </svg>
                </a>
            </footer>
        </div>
    </div>
</section>
