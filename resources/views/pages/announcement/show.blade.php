<x-layouts.app title="{{ $record->title ?? null }}">
    <x-section id="news" class="pt-16">
        <x-wrapper class="py-12">
            <x-container class="space-y-8">
                <div class="w-full grid grid-cols-12 gap-4">
                    <div class="col-span-full space-y-4">
                        @if ($record)
                            <div class="flex space-x-2 items-center text-md text-slate-600 mb-4">
                                <a wire:navigate href="{{ route('announcement.index') }}"class="hover:underline">
                                    {{ Str::title('pengumuman') }}
                                </a>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                                <a wire:navigate
                                    href="{{ route('announcement.index') }} "class="hover:underline font-normal text-emerald-500 line-clamp-1">
                                    {{ $record->title ?? null }}
                                </a>
                            </div>
                            <h1 class="font-bold text-3xl">
                                {{ $record->title ?? null }}
                            </h1>
                            <h6 class="text-slate-500">
                                {{ $record->created_at ? $record->formatDayDateTime($record->created_at) : null }}
                            </h6>
                            <x-share />
                            @if ($record->file)
                                <div class="aspect-video w-full overflow-hidden bg-slate-200 rounded-xl">
                                    <img src="{{ env('API_ADMIN') . $record->file ?? null }}" alt="image"
                                        class="w-full h-full object-contain transition duration-300 ease-in-out hover:scale-110">
                                </div>
                            @endif

                            <div class="content">
                                {!! $record->description ?? null !!}
                            </div>
                        @else
                            <x-empty />
                        @endif
                    </div>
                </div>
            </x-container>
        </x-wrapper>
    </x-section>
    @if ($record)
        @push('metaTag')
            <meta property="og:url" content="{{ route('announcement.show', $record->slug ?? null) }}">
            <meta property="og:type" content="{{ Str::title(__('info pengumuman')) }}">
            <meta property="og:title" content="{{ $record->title ?? null }}">
            <meta property="og:description" content="{{ $record->title ?? null }}">
            <meta property="og:image"
                content="{{ $record->file ? env('APP_URL_ASSET') . $record->file : asset('/image/logo-meranti.png') }}">
            <meta name="twitter:card" content="summary_large_image">
            <meta property="twitter:domain" content="{{ route('announcement.show', $record->slug ?? null) }}">
            <meta property="twitter:url" content="{{ route('announcement.show', $record->slug ?? null) }}">
            <meta name="twitter:title" content="{{ $record->title ?? null }}">
            <meta name="twitter:image"
                content="{{ $record->file ? env('APP_URL_ASSET') . $record->file : asset('/image/logo-meranti.png') }}">
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
