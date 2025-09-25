@php
    $dataMenu = [
        (object) [
            'title' => 'Beranda',
            'route' => route('index'),
            'isActive' => request()->routeIs('index'),
            'children' => null,
        ],
        (object) [
            'title' => 'Berita',
            'route' => route('news.index'),
            'isActive' => request()->routeIs('news.*'),
            'children' => null,
        ],
        (object) [
            'title' => 'Selayang Pandang',
            'route' => null,
            'isActive' => null,
            'children' => null,
        ],
        (object) [
            'title' => 'Tautan Aplikasi',
            'route' => null,
            'isActive' => null,
            'children' => null,
        ],
        (object) [
            'title' => 'Informasi Publik',
            'route' => null,
            'isActive' => null,
            'children' => [
                (object) [
                    'title' => 'Info Pengumuman',
                    'route' => route('information.index'),
                    'image' =>
                        '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round"d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 0 1 0 3.46" /></svg>',
                ],
                (object) [
                    'title' => 'Publikasi Dokumen',
                    'route' => route('document.index'),
                    'image' =>
                        '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" /></svg>',
                ],
                (object) [
                    'title' => 'Foto',
                    'route' => null,
                    'image' =>
                        '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>',
                ],
                (object) [
                    'title' => 'Video',
                    'route' => null,
                    'image' =>
                        '<svg xmlns="http://www.w3.org/2000/svg" fill="none"viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"> <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" /></svg>',
                ],
            ],
        ],
    ];
@endphp

<nav id="navbar">
    <div class="fixed top-0 left-0 w-full z-50">
        <div class="w-full ">
            <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">
                <div class="rounded-xl shadow-md  bg-white/50 backdrop-blur-sm">
                    <nav aria-label="Global" class="mx-auto flex w-full items-center justify-between px-4 py-3  ">
                        <div class="flex lg:flex-1">
                            <a href="{{ route('index') }}">
                                <div class="flex items-center justify-center md:justify-start w-full gap-2">
                                    <img src="{{ asset('image/logo-meranti.png') }}" alt="Logo"
                                        class="w-12 h-12 object-contain" />
                                    <div
                                        class="flex flex-col leading-tight text-shadow-xs text-shadow-slate-50 text-slate-800">
                                        <h1 class="text-xs font-bold">
                                            Website Resmi Kabupaten
                                        </h1>
                                        <h1 class="text-lg md:text-xl font-extrabold">
                                            KEPULAUAN MERANTI
                                        </h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="flex lg:hidden">
                            <button type="button" command="show-modal" commandfor="mobile-menu"
                                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                                <span class="sr-only">Open main menu</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    data-slot="icon" aria-hidden="true" class="size-6">
                                    <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                        <el-popover-group class="hidden lg:flex lg:gap-x-5">
                            @foreach ($dataMenu as $item)
                                @if (empty($item->children))
                                    <a wire:navigate href="{{ $item->route ?? null }}"
                                        class="{{ $item->isActive ? 'text-emerald-700' : 'text-slate-700' }} relative text-normal font-medium rounded-xl transition duration-200 ease-in-out hover:text-emerald-700 group">
                                        {{ $item->title ?? null }}
                                        <span
                                            class="absolute left-1/2 -bottom-1 w-10 h-1 bg-emerald-700 rounded-full -translate-x-1/2 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                                    </a>
                                @else
                                    <div class="relative">
                                        <button popovertarget="desktop-menu-product"
                                            class="group flex items-center gap-x-1 text-normal font-medium text-slate-900 hover:text-emerald-700 transition duration-200 ease-in-out rounded-xl">
                                            <span class="relative">
                                                {{ $item->title ?? null }}
                                                <span
                                                    class="absolute left-1/2 -bottom-1 w-10 h-1 bg-emerald-700 rounded-full -translate-x-1/2 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center">
                                                </span>
                                            </span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="size-4 flex-none text-slate-900 group-hover:text-emerald-700 transition duration-200 ease-in-out">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                        <el-popover id="desktop-menu-product" anchor="bottom" popover
                                            class="w-xs max-w-sm overflow-hidden rounded-xl bg-white shadow-sm outline-1 outline-gray-900/5 transition transition-discrete [--anchor-gap:--spacing(3)] backdrop:bg-transparent open:block data-closed:translate-y-1 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-150 data-leave:ease-in">
                                            @foreach ($item->children as $item)
                                                <div
                                                    class="group relative flex items-center gap-4 rounded-xl m-2 text-sm hover:bg-gray-100 ">
                                                    <div
                                                        class="text-white order flex size-10 flex-none items-center justify-center rounded-xl bg-emerald-500 group-hover:bg-emerald-600">
                                                        {!! $item->image ?? null !!}
                                                    </div>
                                                    <div class="flex-auto">
                                                        <a wire:navigate href="{{ $item->route ?? null }}"
                                                            class="block font-semibold text-base text-slate-600 hover:text-emerald-600">
                                                            {{ $item->title ?? null }}
                                                            <span class="absolute inset-0"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </el-popover>
                                    </div>
                                @endif
                            @endforeach
                        </el-popover-group>
                    </nav>
                    <el-dialog>
                        <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">
                            <div tabindex="0" class="fixed inset-0 focus:outline-none">
                                <el-dialog-panel
                                    class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white p-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                                    <div class="flex items-center justify-between">
                                        <a href="{{ route('index') }}">
                                            <div class="flex items-center justify-center md:justify-start w-full gap-2">
                                                <img src="{{ asset('image/logo-meranti.png') }}" alt="Logo"
                                                    class="w-12 h-12 object-contain" />
                                                <div class="flex flex-col leading-tight">
                                                    <h1
                                                        class="text-xs font-bold text-slate-800 text-shadow-xs text-shadow-slate-50">
                                                        Website Resmi Kabupaten
                                                    </h1>
                                                    <h1
                                                        class="text-lg md:text-xl font-extrabold text-slate-800 text-shadow-xs text-shadow-slate-50">
                                                        KEPULAUAN MERANTI
                                                    </h1>
                                                </div>
                                            </div>
                                        </a>
                                        <button type="button" command="close" commandfor="mobile-menu"
                                            class="-m-2.5 rounded-md p-2.5 text-gray-700">
                                            <span class="sr-only">Close menu</span>
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                                                <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mt-6 flow-root">
                                        <div class="-my-6 divide-y divide-gray-500/10">
                                            <div class="space-y-2 py-6">
                                                @foreach ($dataMenu as $item)
                                                    @if (empty($item->children))
                                                        <a wire:navigate href="{{ route('index') }}"
                                                            class="-mx-3 block rounded-xl px-3 py-2 text-normal/7 font-semibold text-gray-900 hover:bg-gray-50">
                                                            {{ $item->title ?? null }}
                                                        </a>
                                                    @else
                                                        <div class="-mx-3">
                                                            <button type="button" command="--toggle"
                                                                commandfor="products"
                                                                class="flex w-full items-center justify-between rounded-xl py-2 pr-3.5 pl-3 text-normal/7 font-semibold text-gray-900 hover:bg-gray-50">
                                                                {{ $item->title ?? null }}
                                                                <svg viewBox="0 0 20 20" fill="currentColor"
                                                                    data-slot="icon" aria-hidden="true"
                                                                    class="size-5 flex-none in-aria-expanded:rotate-180">
                                                                    <path
                                                                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                                                        clip-rule="evenodd" fill-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                            <el-disclosure id="products" hidden
                                                                class="mt-2 block space-y-2">
                                                                @foreach ($item->children as $item)
                                                                    <a wire:navigate href=""
                                                                        class="block rounded-xl py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">
                                                                        {{ $item->title ?? null }}
                                                                    </a>
                                                                @endforeach
                                                            </el-disclosure>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </el-dialog-panel>
                            </div>
                        </dialog>
                    </el-dialog>
                </div>
            </div>
        </div>
    </div>
</nav>
