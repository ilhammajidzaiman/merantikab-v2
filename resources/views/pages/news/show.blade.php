<x-layouts.app title="{{ $record->title ?? null }}">
    <x-section id="news" class="pt-16">
        <x-wrapper class="py-12">
            <x-container class="space-y-8">
                @if ($record)
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
                        <div class="md:col-span-full lg:col-span-7 space-y-4">
                            <div class="flex space-x-2 items-center font-normal text-slate-600">
                                <a wire:navigate href="{{ route('news.index') }}"class="hover:underline">
                                    Berita
                                </a>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                                <a wire:navigate
                                    href="{{ route('news.index') }}"class="hover:underline text-emerald-500 line-clamp-1">
                                    {{ $record->category ?? null }}
                                </a>
                            </div>
                            <h1 class="font-bold text-3xl text-slate-600">
                                {{ $record->title ?? null }}
                            </h1>
                            <h6 class="font-normal text-slate-500">
                                {{ $record->date ?? null }}
                                .
                                Waktu baca
                                {{ $record->read_time ?? null }}
                            </h6>
                            <x-share />
                            @if ($record->image)
                                <div class="aspect-video overflow-hidden bg-slate-200 rounded-xl">
                                    <img src="{{ env('API_SIPB') . $record->image ?? null }}" alt="image"
                                        class="aspect-video object-cover transition duration-300 ease-in-out hover:scale-110">
                                </div>
                            @endif
                            @if ($record->thumbnail_alt)
                                <h6 class="font-normal text-base text-slate-500">
                                    {{ $record->thumbnail_alt ?? null }}
                                </h6>
                            @endif
                            @if ($record->images)
                                <div class="border border-slate-300 bg-slate-200 rounded-xl">
                                    <div
                                        class="flex gap-4 overflow-x-auto mx-4 my-4 hide-scrollbar snap-x scroll-smooth">
                                        @foreach ($record->images as $img)
                                            <div class="flex-none w-auto rounded-xl overflow-hidden snap-center">
                                                <img src="{{ env('API_SIPB') . $img ?? null }}" alt="Logo"
                                                    class="w-auto h-32 hover:scale-110 transition duration-300 ease-in-out" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="content">
                                {!! $record->content ?? null !!}
                            </div>
                        </div>
                        <div class="md:col-span-full lg:col-span-5">
                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <h1 class="text-3xl font-bold text-emerald-500">
                                        {{ Str::title(__('berita lainnya')) }}
                                    </h1>
                                    <div class="w-full h-0.5 bg-linear-to-r from-emerald-500 to-transparent"></div>
                                </div>
                                <section class="grid grid-cols-1 gap-4">
                                    @foreach ($newsOther as $record)
                                        <div class="overflow-hidden flex items-center shadow rounded-xl bg-white">
                                            <div class="p-4">
                                                <h3 class="text-slate-500 text-sm line-clamp-1">
                                                    {{ $record->date ?? null }}
                                                </h3>
                                                <h1 class="line-clamp-3">
                                                    <a wire:navigate
                                                        href="{{ route('news.show', $record->slug ?? null) }}"
                                                        class="hover:underline">
                                                        {{ $record->title ?? null }}
                                                    </a>
                                                </h1>
                                            </div>
                                            <div
                                                class="aspect-square w-32  flex items-center justify-center overflow-hidden rounded-xl shrink-0 bg-slate-200">
                                                <img src="{{ env('API_SIPB') . $record->image ?? null }}"
                                                    alt="image"
                                                    class="w-full h-full object-cover transition duration-300 ease-in-out hover:scale-110">
                                            </div>
                                        </div>
                                    @endforeach
                                </section>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="bg-slate-200 rounded-xl p-4">
                        <div class="w-full h-auto flex flex-col items-center justify-center my-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-36 text-emerald-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                            <p class="text-center text-slate-500 text-xl font-normal">
                                Data tidak ditemukan
                            </p>
                            <div class="mt-4 flex justify-start">
                                <a wire:navigate href="{{ route('news.index') }}"
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-white bg-emerald-500 hover:bg-emerald-600 transition duration-300 ease-in-out">
                                    Kembali ke berita
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </x-container>
        </x-wrapper>
    </x-section>

    @if ($record)
        @push('metaTag')
            <meta property="og:url" content="{{ route('news.show', $record->slug ?? null) }}">
            <meta property="og:type" content="{{ Str::title(__('berita')) }}">
            <meta property="og:title" content="{{ $record->title ?? null }}">
            <meta property="og:description" content="{{ $record->title ?? null }}">
            <meta property="og:image"
                content="{{ $record->image ? env('API_SIPB') . $record->image : asset('/image/logo-meranti.png') }}">
            <meta name="twitter:card" content="summary_large_image">
            <meta property="twitter:domain" content="{{ route('news.show', $record->slug ?? null) }}">
            <meta property="twitter:url" content="{{ route('news.show', $record->slug ?? null) }}">
            <meta name="twitter:title" content="{{ $record->title ?? null }}">
            <meta name="twitter:image"
                content="{{ $record->image ? env('API_SIPB') . $record->image : asset('/image/logo-meranti.png') }}">
        @endpush

        @push('scripts')
            <script>
                const url = "{{ route('news.show', $record->slug ?? null) }}";
                const message = "{{ $record->title ?? null }}";

                function whatsapp() {
                    const api = `https://wa.me/?text=${encodeURIComponent(url + "\n\n" + message)}`;
                    window.open(api, "_blank");
                }

                document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach((el) => {
                    new bootstrap.Tooltip(el);
                });

                function facebook() {
                    const api = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
                    window.open(api, "_blank");
                }

                function twitter() {
                    const api =
                        `https://twitter.com/intent/tweet?text=${encodeURIComponent(message + "\n\n" + url)}`;
                    window.open(api, "_blank");
                }

                function telegram() {
                    const api =
                        `https://t.me/share/url?url=${encodeURIComponent(url)}&text=${encodeURIComponent("\n" + message)}`;
                    window.open(api, "_blank");
                }

                function copyLink() {
                    const textarea = document.createElement('textarea');
                    textarea.value = url;
                    document.body.appendChild(textarea);
                    textarea.select();
                    document.execCommand('copy');
                    document.body.removeChild(textarea);
                    alert(`${message}\n\nTautan berhasil disalin.`);
                }
            </script>
        @endpush
    @endif
</x-layouts.app>
