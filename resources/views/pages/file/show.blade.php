<x-layouts.app title="{{ $record->title ?? null }}">
    <x-section id="news" class="pt-16">
        <x-wrapper class="py-12">
            <x-container class="space-y-8">
                <div class="w-full grid grid-cols-12 gap-8">
                    @if ($record)
                        <div class="w-full col-span-full space-y-4 ">
                            <div class="flex space-x-2 items-center text-md text-slate-600 mb-4">
                                <a wire:navigate href="{{ route('announcement.index') }}"class="hover:underline">
                                    {{ Str::title(__('dokumen')) }}
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
                                <div class="aspect-video overflow-hidden bg-slate-200 rounded-xl">
                                    <img src="{{ $record->file ? env('APP_URL_ASSET') . $record->file : asset('/image/default-img.svg') }}"
                                        alt="image" class="w-full h-full object-contain">
                                </div>
                            @endif
                            <div class="content">
                                {!! $record->description ?? null !!}
                            </div>

                            <div class="space-y-2 pt-4">
                                <h3 class="text-2xl font-bold">
                                    {{ Str::ucfirst(__('dokumen')) }}
                                </h3>
                                <div class="w-full h-0.5 bg-linear-to-r from-emerald-500 to-transparent"></div>
                            </div>
                            <div class="flex flex-wrap gap-8">
                                @foreach ($record->attachment as $file)
                                    <div class="space-y-4">
                                        <div
                                            class="flex items-center justify-center aspect-video md:aspect-3/4 w-full md:h-48 bg-slate-200 object-cover overflow-hidden rounded-xl">
                                            @if (Str::endsWith($file, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                                <img src="{{ $file ? env('APP_URL_ASSET') . $file : asset('/image/default-img.svg') }}"
                                                    alt="image" class="w-full h-full object-contain" />
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-16 text-emerald-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>
                                            @endif
                                        </div>
                                        <div class="flex justify-start">
                                            <a href="{{ route('file.download', $file) }}" target="__blank"
                                                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-white bg-emerald-500 hover:bg-emerald-600 transition duration-300 ease-in-out">
                                                {{ Str::title(__('unduh')) }}
                                                {{ pathinfo($file, PATHINFO_EXTENSION) }}
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="col-span-full space-y-4">
                            <x-empty />
                        </div>
                    @endif
                </div>
            </x-container>
        </x-wrapper>
    </x-section>
    @if ($record)
        @push('metaTag')
            <meta property="og:url" content="{{ route('file.show', $record->slug ?? null) }}">
            <meta property="og:type" content="{{ Str::title(__('dokumen')) }}">
            <meta property="og:title" content="{{ $record->title ?? null }}">
            <meta property="og:description" content="{{ $record->title ?? null }}">
            <meta property="og:image"
                content="{{ $record->file ? env('APP_URL_ASSET') . $record->file : asset('/image/logo-meranti.png') }}">
            <meta name="twitter:card" content="summary_large_image">
            <meta property="twitter:domain" content="{{ route('file.show', $record->slug ?? null) }}">
            <meta property="twitter:url" content="{{ route('file.show', $record->slug ?? null) }}">
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
