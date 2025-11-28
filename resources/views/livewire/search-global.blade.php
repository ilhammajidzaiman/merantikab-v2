<div class="relative w-full md:w-80" x-data="{ open: false }" @click.outside="open = false">
    <div class="relative text-white">
        <input type="text" wire:model.live="keyword" placeholder="{{ Str::ucfirst(__('cari disini')) }}"
            @focus="open = true"
            class="w-full border border-white rounded-lg pl-10 pr-3 py-2 focus:outline-none focus:ring-1 focus:ring-emerald-500 bg-white/20 backdrop-blur-xs  placeholder-slate-200">
        <button type="button" class="absolute inset-y-0 left-0 flex items-center pl-3 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </button>
    </div>
    @if (strlen($keyword) > 2)
        <div x-show="open" x-transition
            class="w-auto md:w-2xl absolute left-0 mt-2 bg-white rounded-xl overflow-hidden z-50">
            <div class="max-h-96 divide-y divide-slate-200 overflow-y-auto">
                @if ($news && count($news))
                    <h1 class="text-emerald-500 text-left font-bold px-4 py-3 bg-slate-100">
                        <a wire:navigate href="{{ route('news.index') }}" title="berita" class="hover:underline">
                            {{ Str::title(__('berita')) }}
                        </a>
                    </h1>
                    @foreach ($news as $item)
                        <div wire:click="goToNews('{{ $item->slug ?? null }}')" @click="open = false"
                            class="w-full text-left hover:bg-slate-100 px-4 py-2">
                            <div class="flex items-center space-x-2">
                                <div class="flex-auto space-y-2">
                                    <h1 class="line-clamp-2">
                                        <a wire:navigate href="{{ route('news.show', $item->slug) }}"
                                            title="{{ $item->title ?? null }}" class="hover:underline">
                                            {{ $item->title ?? null }}
                                        </a>
                                    </h1>
                                    <h6 class="text-slate-500 text-xs line-clamp-1">
                                        {{ $item->date ?? null }}
                                    </h6>
                                </div>
                                <div class="flex-none">
                                    <div class="aspect-square h-20 overflow-hidden rounded-xl">
                                        <img src="{{ $item->image ?? asset('/image/default-img.svg') }}" alt="image"
                                            class="bg-slate-200 w-full h-full object-cover">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                @if ($announcement && count($announcement))
                    <h1 class="text-emerald-500 text-left font-bold px-4 py-3 bg-slate-100">
                        <a wire:navigate href="{{ route('announcement.index') }}" title="berita"
                            class="hover:underline">
                            {{ Str::title(__('info pengumuman')) }}
                        </a>
                    </h1>
                    @foreach ($announcement as $item)
                        <div wire:click="goToAnnouncement('{{ $item->slug ?? null }}')" @click="open = false"
                            class="w-full text-left hover:bg-slate-100 px-4 py-2">
                            <div class="flex items-center space-x-2">
                                <div class="flex-auto space-y-2">
                                    <h1 class="line-clamp-2">
                                        <a wire:navigate href="{{ route('announcement.show', $item->slug) }}"
                                            title="{{ $item->title ?? null }}" class="hover:underline">
                                            {{ $item->title ?? null }}
                                        </a>
                                    </h1>
                                    <h6 class="text-slate-500 text-xs line-clamp-1">
                                        {{ $item->published_at ? $item->formatDayDate($item->published_at) : null }}
                                    </h6>
                                </div>
                                <div class="flex-none">
                                    <div class="aspect-square h-20 overflow-hidden rounded-xl">
                                        <div class="flex justify-center items-center h-full bg-emerald-500 text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-8">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 0 1 0 3.46" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                @if ($file && count($file))
                    <h1 class="text-emerald-500 text-left font-bold px-4 py-3 bg-slate-100">
                        <a wire:navigate href="{{ route('file.index') }}" title="berita" class="hover:underline">
                            {{ Str::title(__('dokumen')) }}
                        </a>
                    </h1>
                    @foreach ($file as $item)
                        <div wire:click="goToFile('{{ $item->slug ?? null }}')" @click="open = false"
                            class="w-full text-left hover:bg-slate-100 px-4 py-2">
                            <div class="flex items-center space-x-2">
                                <div class="flex-auto space-y-2">
                                    <h1 class="line-clamp-2">
                                        <a wire:navigate href="{{ route('file.show', $item->slug) }}"
                                            title="{{ $item->title ?? null }}" class="hover:underline">
                                            {{ $item->title ?? null }}
                                        </a>
                                    </h1>
                                    <h6 class="text-slate-500 text-xs line-clamp-1">
                                        {{ $item->published_at ? $item->formatDayDate($item->published_at) : null }}
                                    </h6>
                                </div>
                                <div class="flex-none">
                                    <div class="aspect-square h-20 overflow-hidden rounded-xl">
                                        @if ($item->file)
                                            <img src="{{ $item->file ? env('APP_URL_ASSET') . $item->file : asset('/image/default-img.svg') }}"
                                                alt="image" class="w-full h-full object-cover">
                                        @else
                                            <div
                                                class="flex justify-center items-center h-full bg-emerald-500 text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-8">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                @if ($appList && count($appList))
                    <h1 class="text-emerald-500 text-left font-bold px-4 py-3 bg-slate-100">
                        <a wire:navigate href="" title="berita" class="hover:underline">
                            {{ Str::title(__('aplikasi')) }}
                        </a>
                    </h1>
                    @foreach ($appList as $item)
                        <div wire:click="goToAppList('{{ $item->slug ?? null }}')" @click="open = false"
                            class="w-full text-left hover:bg-slate-100 px-4 py-2">
                            <div class="flex items-center space-x-2">
                                <div class="flex-auto space-y-2">
                                    <h1 class="line-clamp-2">
                                        <a href="{!! $item->link->url !!}" title="{{ $item->title ?? null }}"
                                            target="__blank" class="hover:underline">
                                            {{ $item->title ?? null }}
                                        </a>
                                    </h1>
                                    <h6 class="text-slate-500 text-xs line-clamp-1">
                                        {{ $item->published_at ? $item->formatDayDate($item->published_at) : null }}
                                    </h6>
                                </div>
                                <div class="flex-none">
                                    <div class="aspect-square h-20 overflow-hidden">
                                        @if ($item->file)
                                            <img src="{{ $item->file ? env('APP_URL_ASSET') . $item->file : asset('/image/default-img.svg') }}"
                                                alt="image" class="w-full h-full object-cover">
                                        @else
                                            <div
                                                class="flex justify-center items-center h-full bg-emerald-500 text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-8">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endif
</div>
