<x-layouts.app title="{{ $record['title'] ?? null }}">
    <x-section id="news" class="pt-16">
        <x-wrapper class="py-12">
            <x-container class="space-y-8">
                @if ($record->isNotEmpty())
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
                                    {{ $record['category'] ?? null }}
                                </a>
                            </div>
                            <h1 class="font-bold text-3xl text-slate-600">
                                {{ $record['title'] ?? null }}
                            </h1>
                            <h6 class="font-normal text-slate-500">
                                {{ $record['published_at'] ?? null }}
                                .
                                Waktu baca
                                {{ $record['reading_time'] ?? null }}
                            </h6>
                            <x-share />
                            @if ($record['file'])
                                <div class="aspect-video overflow-hidden bg-slate-200 rounded-xl">
                                    <img src="{{ $record['file'] ?? null }}" alt="image"
                                        class="aspect-video object-cover transition duration-300 ease-in-out hover:scale-110">
                                </div>
                            @endif
                            @if ($record['description'])
                                <h6 class="font-normal text-base text-slate-500">
                                    {{ $record['description'] ?? null }}
                                </h6>
                            @endif
                            @if ($record['attachment'])
                                <div class="border border-slate-300 bg-slate-200 rounded-xl">
                                    <div
                                        class="flex gap-4 overflow-x-auto mx-4 my-4 hide-scrollbar snap-x scroll-smooth">
                                        @foreach ($record['attachment'] as $img)
                                            <div class="flex-none w-auto rounded-xl overflow-hidden snap-center">
                                                <img src="{{ $img ?? null }}" alt="Logo"
                                                    class="w-auto h-32 hover:scale-110 transition duration-300 ease-in-out" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="content">
                                {!! $record['content'] ?? null !!}
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
                                    @foreach ($newsOther as $item)
                                        <div class="overflow-hidden flex items-center shadow rounded-xl bg-white">
                                            <div class="p-4">
                                                <h3 class="text-slate-500 text-sm line-clamp-1">
                                                    {{ $item['published_at'] ?? null }}
                                                </h3>
                                                <h1 class="line-clamp-3">
                                                    <a wire:navigate
                                                        href="{{ !empty($record['slug']) ? route('news.show', $record['slug']) : route('index') }}"
                                                        class="hover:underline">
                                                        {{ $item['title'] ?? null }}
                                                    </a>
                                                </h1>
                                            </div>
                                            <div
                                                class="aspect-square w-32  flex items-center justify-center overflow-hidden rounded-xl shrink-0 bg-slate-200">
                                                <img src="{{ $item['file'] ?? null }}" alt="image"
                                                    class="w-full h-full object-cover transition duration-300 ease-in-out hover:scale-110">
                                            </div>
                                        </div>
                                    @endforeach
                                </section>
                            </div>
                        </div>
                    </div>
                @else
                    <x-error />
                @endif
            </x-container>
        </x-wrapper>
    </x-section>
    @if ($record->isNotEmpty())
        @push('metaTag')
            <meta property="og:url"
                content="{{ !empty($record['slug']) ? route('news.show', $record['slug']) : route('index') }}">
            <meta property="og:type" content="{{ Str::title(__('berita')) }}">
            <meta property="og:title" content="{{ $record['title'] ?? null }}">
            <meta property="og:description" content="{{ $record['title'] ?? null }}">
            <meta property="og:image" content="{{ $record['file'] ?? null }}">
            <meta name="twitter:card" content="summary_large_image">
            <meta property="twitter:domain"
                content="{{ !empty($record['slug']) ? route('news.show', $record['slug']) : route('index') }}">
            <meta property="twitter:url"
                content="{{ !empty($record['slug']) ? route('news.show', $record['slug']) : route('index') }}">
            <meta name="twitter:title" content="{{ $record['title'] ?? null }}">
            <meta name="twitter:image" content="{{ $record['file'] ?? null }}">
        @endpush

        @push('scripts')
            <script>
                function getShareData() {
                    return {
                        url: window.location.href,
                        message: document.querySelector('meta[property="og:title"]')?.content ||
                            document.title
                    };
                }

                function share(type) {
                    const {
                        url,
                        message
                    } = getShareData();
                    let api = '';
                    switch (type) {
                        case 'whatsapp':
                            api = `https://wa.me/?text=${encodeURIComponent(url + "\n\n" + message)}`;
                            break;
                        case 'facebook':
                            api = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
                            break;
                        case 'twitter':
                            api =
                                `https://twitter.com/intent/tweet?text=${encodeURIComponent(message)}&url=${encodeURIComponent(url)}`;
                            break;
                        case 'telegram':
                            api = `https://t.me/share/url?url=${encodeURIComponent(url)}&text=${encodeURIComponent(message)}`;
                            break;
                        case 'copy':
                            navigator.clipboard.writeText(url).then(() => {
                                alert(`${message}\n\nTautan berhasil disalin`);
                            });
                            return;
                    }
                    window.open(api, '_blank');
                }
                document.addEventListener('click', function(e) {
                    const btn = e.target.closest('[data-share]');
                    if (!btn) return;
                    e.preventDefault();
                    share(btn.dataset.share);
                });
                document.addEventListener('livewire:navigated', () => {
                    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
                        new bootstrap.Tooltip(el);
                    });
                });
            </script>
        @endpush
    @endif
</x-layouts.app>
