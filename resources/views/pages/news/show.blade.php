<x-layouts.app title="{{ $record->title ?? null }}">
    <x-section id="news" class="pt-16">
        <x-wrapper class="py-12">
            <x-container class="space-y-8">
                @if ($record->slug)
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
                            <nav class="flex items-center gap-4">
                                <button onclick="whatsapp()" type="button" data-bs-toggle="tooltip" title="Whatsapp"
                                    class="w-10 aspect-square flex items-center justify-center rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-whatsapp size-6" viewBox="0 0 16 16">
                                        <path
                                            d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                                    </svg>
                                </button>
                                <button onclick="facebook()" type="button" data-bs-toggle="tooltip" title="facebook"
                                    class="w-10 aspect-square flex items-center justify-center rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-facebook size-6" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                                    </svg>
                                </button>
                                <button onclick="twitter()" type="button" data-bs-toggle="tooltip" title="twitter"
                                    class="w-10 aspect-square flex items-center justify-center rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-twitter-x size-6" viewBox="0 0 16 16">
                                        <path
                                            d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                                    </svg>
                                </button>
                                <button onclick="telegram()" type="button" data-bs-toggle="tooltip" title="telegram"
                                    class="w-10 aspect-square flex items-center justify-center rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-telegram size-6" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.287 5.906q-1.168.486-4.666 2.01-.567.225-.595.442c-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294q.39.01.868-.32 3.269-2.206 3.374-2.23c.05-.012.12-.026.166.016s.042.12.037.141c-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8 8 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629q.14.092.27.187c.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.4 1.4 0 0 0-.013-.315.34.34 0 0 0-.114-.217.53.53 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09" />
                                    </svg>
                                </button>
                                <button onclick="copyLink(this)" type="button" data-bs-toggle="tooltip" title="Copy"
                                    class="w-10 aspect-square flex items-center justify-center rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-share size-6" viewBox="0 0 16 16">
                                        <path
                                            d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3" />
                                    </svg>
                                </button>
                            </nav>
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

    @if ($record->slug)
        @push('metaTag')
            @if ($record)
                <meta property="og:url" content="{{ route('news.show', $record->slug ?? null) }}">
                <meta property="og:type" content="Baca Berita">
                <meta property="og:title" content="{{ $record->title ?? null }}">
                <meta property="og:description" content="{{ $record->title ?? null }}">
                <meta property="og:image" content="{{ env('API_SIPB') . $record->image ?? null }}">
                <meta name="twitter:card" content="summary_large_image">
                <meta property="twitter:domain" content="{{ route('news.show', $record->slug ?? null) }}">
                <meta property="twitter:url" content="{{ route('news.show', $record->slug ?? null) }}">
                <meta name="twitter:title" content="{{ $record->title ?? null }}">
                <meta name="twitter:image" content="{{ env('API_SIPB') . $record->image ?? null }}">
            @endif
        @endpush

        @push('scripts')
            <script>
                const url = "{{ route('news.show', $record->slug ?? null) }}";
                const message = "{{ $record->title ?? null }}";

                document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach((el) => {
                    new bootstrap.Tooltip(el);
                });

                function whatsapp() {
                    const api = `https://wa.me/?text=${encodeURIComponent(url + "\n\n" + message)}`;
                    window.open(api, "_blank");
                }

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
