<x-layouts.app title="{{ $record->title ?? null }}">
    <x-section id="page" class="pt-16">
        <x-wrapper class="py-12">
            <x-container class="space-y-8">
                <div class="w-full grid grid-cols-12 gap-4">
                    <div class="col-span-full space-y-4">
                        @if ($record)
                            <div class="flex space-x-2 items-center text-md text-slate-600 mb-4">
                                <a wire:navigate href="{{ route('page.index') }}"class="hover:underline">
                                    {{ Str::title(__('halaman')) }}
                                </a>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                                <a wire:navigate
                                    href="{{ route('page.index') }} "class="hover:underline font-normal text-emerald-500 line-clamp-1">
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
                                    <img src="{{ env('APP_URL_ASSET') . $record->file ?? null }}" alt="image"
                                        class="w-full h-full object-contain transition duration-300 ease-in-out hover:scale-110">
                                </div>
                            @endif
                            <div class="content">
                                {!! $record->content ?? null !!}
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
            @if ($record)
                <meta property="og:url" content="{{ route('page.show', $record->slug ?? null) }}">
                <meta property="og:type" content="Info Pengummuman">
                <meta property="og:title" content="{{ $record->title ?? null }}">
                <meta property="og:description" content="{{ $record->title ?? null }}">
                <meta property="og:image" content="{{ env('APP_URL_ASSET') . $record->image ?? null }}">
                <meta name="twitter:card" content="summary_large_image">
                <meta property="twitter:domain" content="{{ route('page.show', $record->slug ?? null) }}">
                <meta property="twitter:url" content="{{ route('page.show', $record->slug ?? null) }}">
                <meta name="twitter:title" content="{{ $record->title ?? null }}">
                <meta name="twitter:image" content="{{ env('APP_URL_ASSET') . $record->image ?? null }}">
            @endif
        @endpush
        @push('scripts')
            <script>
                const url = "{{ route('page.show', $record->slug ?? null) }}";
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
