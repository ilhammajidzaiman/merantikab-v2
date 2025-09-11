@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kepulauan Meranti</title>
    <link rel="shortcut icon" href="{{ asset('/image/logo-meranti.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-slate-50">
    {{-- <div class="max-w-7xl mx-auto px-4 bg-amber-500">
        <div class="flex flex-wrap justify-between">
            <div class="w-full md:w-1/3 bg-sky-500">left</div>
            <div class="w-full md:w-1/3 bg-sky-500">right</div>
            <div class="w-full md:w-1/3 bg-sky-500">right</div>
            <div class="w-full md:w-1/3 bg-sky-500">right</div>
            <div class="w-full md:w-1/3 bg-sky-500">right</div>
        </div>
    </div> --}}

    <nav id="navbar">
        <div class="fixed top-0 left-0 w-full z-50">
            <div class="w-full ">
                <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">
                    <div class="rounded-xl shadow-md  bg-white/50 backdrop-blur-sm">
                        <nav aria-label="Global" class="mx-auto flex w-full items-center justify-between px-4 py-3  ">
                            <div class="flex lg:flex-1">
                                <a href="" class="-m-1.5 p-1.5">
                                    <div class="flex items-center justify-center md:justify-start w-full">
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
                                <a href=""
                                    class="relative text-normal font-medium text-emerald-700 rounded-xl transition duration-200 ease-in-out hover:text-emerald-700 group">
                                    Beranda
                                    <span
                                        class="absolute left-1/2 -bottom-1 w-10 h-1 bg-emerald-700 rounded-full -translate-x-1/2 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                                </a>
                                <a href=""
                                    class="relative text-normal font-medium text-slate-900 rounded-xl transition duration-200 ease-in-out hover:text-emerald-700 group">
                                    Berita
                                    <span
                                        class="absolute left-1/2 -bottom-1 w-10 h-1 bg-emerald-700 rounded-full -translate-x-1/2 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                                </a>
                                <a href=""
                                    class="relative text-normal font-medium text-slate-900 rounded-xl transition duration-200 ease-in-out hover:text-emerald-700 group">
                                    Selayang Pandang
                                    <span
                                        class="absolute left-1/2 -bottom-1 w-10 h-1 bg-emerald-700 rounded-full -translate-x-1/2 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                                </a>
                                <a href=""
                                    class="relative text-normal font-medium text-slate-900 rounded-xl transition duration-200 ease-in-out hover:text-emerald-700 group">
                                    Tautan Aplikasi
                                    <span
                                        class="absolute left-1/2 -bottom-1 w-10 h-1 bg-emerald-700 rounded-full -translate-x-1/2 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                                </a>
                                <div class="relative">
                                    <button popovertarget="desktop-menu-product"
                                        class="group flex items-center gap-x-1 text-normal font-medium text-slate-900 hover:text-emerald-700 transition duration-200 ease-in-out rounded-xl">
                                        <span class="relative">
                                            Informasi
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
                                        class="w-screen max-w-md overflow-hidden rounded-3xl bg-white shadow-lg outline-1 outline-gray-900/5 transition transition-discrete [--anchor-gap:--spacing(3)] backdrop:bg-transparent open:block data-closed:translate-y-1 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-150 data-leave:ease-in">
                                        <div class="p-4">
                                            <div
                                                class="group relative flex items-center gap-x-6 rounded-xl p-4 text-sm/6 hover:bg-gray-50">
                                                <div
                                                    class="flex size-11 flex-none items-center justify-center rounded-xl bg-gray-50 group-hover:bg-white">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="1.5" data-slot="icon" aria-hidden="true"
                                                        class="size-6 text-gray-600 group-hover:text-indigo-600">
                                                        <path d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <div class="flex-auto">
                                                    <a href="" class="block font-semibold text-gray-900">
                                                        Analytics
                                                        <span class="absolute inset-0"></span>
                                                    </a>
                                                    <p class="mt-1 text-gray-600">Get a better understanding of your
                                                        traffic
                                                    </p>
                                                </div>
                                            </div>
                                            <div
                                                class="group relative flex items-center gap-x-6 rounded-xl p-4 text-sm/6 hover:bg-gray-50">
                                                <div
                                                    class="flex size-11 flex-none items-center justify-center rounded-xl bg-gray-50 group-hover:bg-white">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="1.5" data-slot="icon" aria-hidden="true"
                                                        class="size-6 text-gray-600 group-hover:text-indigo-600">
                                                        <path
                                                            d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <div class="flex-auto">
                                                    <a href="" class="block font-semibold text-gray-900">
                                                        Engagement
                                                        <span class="absolute inset-0"></span>
                                                    </a>
                                                    <p class="mt-1 text-gray-600">Speak directly to your customers</p>
                                                </div>
                                            </div>
                                            <div
                                                class="group relative flex items-center gap-x-6 rounded-xl p-4 text-sm/6 hover:bg-gray-50">
                                                <div
                                                    class="flex size-11 flex-none items-center justify-center rounded-xl bg-gray-50 group-hover:bg-white">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="1.5" data-slot="icon" aria-hidden="true"
                                                        class="size-6 text-gray-600 group-hover:text-indigo-600">
                                                        <path
                                                            d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <div class="flex-auto">
                                                    <a href="" class="block font-semibold text-gray-900">
                                                        Security
                                                        <span class="absolute inset-0"></span>
                                                    </a>
                                                    <p class="mt-1 text-gray-600">Your customers’ data will be safe and
                                                        secure</p>
                                                </div>
                                            </div>
                                            <div
                                                class="group relative flex items-center gap-x-6 rounded-xl p-4 text-sm/6 hover:bg-gray-50">
                                                <div
                                                    class="flex size-11 flex-none items-center justify-center rounded-xl bg-gray-50 group-hover:bg-white">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="1.5" data-slot="icon" aria-hidden="true"
                                                        class="size-6 text-gray-600 group-hover:text-indigo-600">
                                                        <path
                                                            d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 0 0 2.25-2.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v2.25A2.25 2.25 0 0 0 6 10.5Zm0 9.75h2.25A2.25 2.25 0 0 0 10.5 18v-2.25a2.25 2.25 0 0 0-2.25-2.25H6a2.25 2.25 0 0 0-2.25 2.25V18A2.25 2.25 0 0 0 6 20.25Zm9.75-9.75H18a2.25 2.25 0 0 0 2.25-2.25V6A2.25 2.25 0 0 0 18 3.75h-2.25A2.25 2.25 0 0 0 13.5 6v2.25a2.25 2.25 0 0 0 2.25 2.25Z"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <div class="flex-auto">
                                                    <a href="" class="block font-semibold text-gray-900">
                                                        Integrations
                                                        <span class="absolute inset-0"></span>
                                                    </a>
                                                    <p class="mt-1 text-gray-600">Connect with third-party tools</p>
                                                </div>
                                            </div>
                                            <div
                                                class="group relative flex items-center gap-x-6 rounded-xl p-4 text-sm/6 hover:bg-gray-50">
                                                <div
                                                    class="flex size-11 flex-none items-center justify-center rounded-xl bg-gray-50 group-hover:bg-white">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="1.5" data-slot="icon" aria-hidden="true"
                                                        class="size-6 text-gray-600 group-hover:text-indigo-600">
                                                        <path
                                                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <div class="flex-auto">
                                                    <a href="" class="block font-semibold text-gray-900">
                                                        Automations
                                                        <span class="absolute inset-0"></span>
                                                    </a>
                                                    <p class="mt-1 text-gray-600">Build strategic funnels that will
                                                        convert
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 divide-x divide-gray-900/5 bg-gray-50">
                                            <a href=""
                                                class="flex items-center justify-center gap-x-2.5 p-3 text-sm/6 font-semibold text-gray-900 hover:bg-gray-100">
                                                <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon"
                                                    aria-hidden="true" class="size-5 flex-none text-gray-400">
                                                    <path
                                                        d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm6.39-2.908a.75.75 0 0 1 .766.027l3.5 2.25a.75.75 0 0 1 0 1.262l-3.5 2.25A.75.75 0 0 1 8 12.25v-4.5a.75.75 0 0 1 .39-.658Z"
                                                        clip-rule="evenodd" fill-rule="evenodd" />
                                                </svg>
                                                Watch demo
                                            </a>
                                            <a href=""
                                                class="flex items-center justify-center gap-x-2.5 p-3 text-sm/6 font-semibold text-gray-900 hover:bg-gray-100">
                                                <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon"
                                                    aria-hidden="true" class="size-5 flex-none text-gray-400">
                                                    <path
                                                        d="M2 3.5A1.5 1.5 0 0 1 3.5 2h1.148a1.5 1.5 0 0 1 1.465 1.175l.716 3.223a1.5 1.5 0 0 1-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 0 0 6.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 0 1 1.767-1.052l3.223.716A1.5 1.5 0 0 1 18 15.352V16.5a1.5 1.5 0 0 1-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 0 1 2.43 8.326 13.019 13.019 0 0 1 2 5V3.5Z"
                                                        clip-rule="evenodd" fill-rule="evenodd" />
                                                </svg>
                                                Contact sales
                                            </a>
                                        </div>
                                    </el-popover>
                                </div>

                            </el-popover-group>
                        </nav>
                        <el-dialog>
                            <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">
                                <div tabindex="0" class="fixed inset-0 focus:outline-none">
                                    <el-dialog-panel
                                        class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white p-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                                        <div class="flex items-center justify-between">
                                            <a href="" class="-m-1.5 p-1.5">
                                                <div class="flex items-center justify-center md:justify-start w-full">
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
                                                    stroke-width="1.5" data-slot="icon" aria-hidden="true"
                                                    class="size-6">
                                                    <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="mt-6 flow-root">
                                            <div class="-my-6 divide-y divide-gray-500/10">
                                                <div class="space-y-2 py-6">
                                                    <div class="-mx-3">
                                                        <button type="button" command="--toggle"
                                                            commandfor="products"
                                                            class="flex w-full items-center justify-between rounded-xl py-2 pr-3.5 pl-3 text-normal/7 font-semibold text-gray-900 hover:bg-gray-50">
                                                            Product
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
                                                            <a href=""
                                                                class="block rounded-xl py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Analytics</a>
                                                            <a href=""
                                                                class="block rounded-xl py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Engagement</a>
                                                            <a href=""
                                                                class="block rounded-xl py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Security</a>
                                                            <a href=""
                                                                class="block rounded-xl py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Integrations</a>
                                                            <a href=""
                                                                class="block rounded-xl py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Automations</a>
                                                            <a href=""
                                                                class="block rounded-xl py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Watch
                                                                demo</a>
                                                            <a href=""
                                                                class="block rounded-xl py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Contact
                                                                sales</a>
                                                        </el-disclosure>
                                                    </div>
                                                    <a href=""
                                                        class="-mx-3 block rounded-xl px-3 py-2 text-normal/7 font-semibold text-gray-900 hover:bg-gray-50">Berita</a>
                                                    <a href=""
                                                        class="-mx-3 block rounded-xl px-3 py-2 text-normal/7 font-semibold text-gray-900 hover:bg-gray-50">Selayang
                                                        Pandang</a>
                                                    <a href=""
                                                        class="-mx-3 block rounded-xl px-3 py-2 text-normal/7 font-semibold text-gray-900 hover:bg-gray-50">Company</a>
                                                </div>
                                                {{-- <div class="py-6">
                                                    <a href=""
                                                        class="-mx-3 block rounded-xl px-3 py-2.5 text-normal/7 font-semibold text-gray-900 hover:bg-gray-50">Log
                                                        in</a>
                                                </div> --}}
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

    <section id="hero">
        <div class="relative w-full h-screen">
            @livewire('carousel-full', ['carouselFull' => $carouselFull])
            <div class="absolute inset-0 flex items-center">
                <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3 relative z-10">
                    <div class="w-full py-10">
                        <div class="grid grid-cols-6 gap-4">
                            <div class="col-span-full md:col-start-1 md:col-end-4">
                                <div class="text-white text-shadow-md text-shadow-slate-600">

                                    <h3 class="font-light text-xl">
                                        Situs Resmi Pemerintahan Daerah
                                    </h3>
                                    <h1 class="text-6xl font-bold">
                                        Kabupaten
                                    </h1>
                                    <h1 class="text-6xl font-bold">
                                        Kepulauan Meranti
                                    </h1>
                                    <h3 class="font-light text-xl mt-4">
                                        Cari Informasi Tentang Kabupaten Kepulauan Meranti
                                    </h3>

                                    <form action="/search" method="GET" class="relative w-full md:w-72 mt-4">
                                        <label for="search" class="sr-only">Search</label>
                                        <input type="text" name="search" id="search" placeholder="Cari..."
                                            class="w-full border border-white rounded-lg pl-10 pr-3 py-2 focus:outline-none focus:ring-1 focus:ring-emerald-500 bg-white/20 backdrop-blur-sm text-white placeholder-white/80">
                                        <button type="submit"
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 text-emerald-300 hover:text-emerald-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="col-span-full md:col-start-5 md:col-end-7 hidden md:block">
                                <div class="bg-slate-800/20 backdrop-blur-sm rounded-xl text-white p-4">
                                    <h3 class="font-light text-lg">
                                        Hari Ini:
                                    </h3>
                                    <h1 class="font-medium text-2xl">
                                        {{ now()->translatedFormat('l, d F Y') }}
                                    </h1>
                                    <h3 class="font-light text-lg">
                                        jam:
                                    </h3>
                                    <h1 id="clock" class="font-medium text-2xl"></h1>
                                </div>
                            </div>

                            <div class="relative col-span-full mt-6">
                                <div class="border border-white rounded-xl">
                                    <div id="scrollContainer"
                                        class="flex gap-4 overflow-x-auto mx-14 my-4 hide-scrollbar snap-x scroll-smooth">
                                        @foreach ($heroShortcut as $item)
                                            <div
                                                class="flex-none w-28 md:w-56 rounded-xl overflow-hidden bg-white/20 backdrop-blur-sm hover:bg-slate-300 transition duration-300 ease-in-out snap-center">
                                                <div
                                                    class="flex flex-col items-center justify-center gap-2 rounded-xl p-4 ">
                                                    <img src="{{ $item->image ?? null }}" alt="Logo"
                                                        class="w-full h-16 object-contain hover:scale-110 transition duration-300 ease-in-out " />
                                                    <h1
                                                        class="text-lg font-medium text-white text-shadow-xs text-shadow-slate-500 text-center">
                                                        <a href="{{ $item->link ?? null }}" class="hover:underline">
                                                            {{ $item->title ?? null }}
                                                        </a>
                                                    </h1>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <button id="scrollLeft"
                                    class="absolute left-0 top-1/2 -translate-y-1/2 text-white hover:text-slate-800  hover:bg-white/70 mx-2 p-2 rounded-xl z-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 19.5 8.25 12l7.5-7.5" />
                                    </svg>
                                </button>
                                <button id="scrollRight"
                                    class="absolute right-0 top-1/2 -translate-y-1/2 text-white hover:text-slate-800  hover:bg-white/70 mx-2 p-2 rounded-xl z-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="news">
        <div class="w-full py-10">
            <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">
                <header class="text-center py-10">
                    <h3 class="flex items-center justify-center tracking-wide">
                        <span class="w-10 h-px bg-emerald-500"></span>
                        <span class="bg-emerald-500 text-white px-3 py-px rounded-xl">Berita</span>
                        <span class="w-10 h-px bg-emerald-500"></span>
                    </h3>
                    <h1
                        class="font-bold text-3xl bg-linear-to-r from-emerald-500 to-emerald-700 bg-clip-text text-transparent mt-4">
                        Berita Kabupaten Kepulauan Meranti
                    </h1>
                </header>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4">
                    <div class="md:col-span-6 lg:col-span-1">
                        <div class="mb-3">
                            @livewire('carousel-news', ['carouselNews' => $carouselNews])
                        </div>
                    </div>
                    <div class="md:col-span-6 lg:col-span-1">
                        <div
                            class="w-full max-h-100 overflow-y-auto bg-slate-100 rounded-xl border border-slate-200 hide-scrollbar">
                            @foreach ($news as $item)
                                <div
                                    class="overflow-hidden flex items-center gap-4 shadow-md rounded-xl bg-white hover:shadow-md m-4">
                                    <div class="w-34 h-34 overflow-hidden rounded-r-full shrink-0 bg-slate-200">
                                        <img src="{{ env('API_SIPB') . $item->image ?? null }}" alt="image"
                                            class="w-full h-full object-cover transition duration-300 ease-in-out hover:scale-110">
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-slate-500 text-normal line-clamp-1">
                                            {{ $item->category ?? null }}
                                        </h3>
                                        <h1 class="text-slate-700 text-lg font-medium line-clamp-2">
                                            <a href="" class="hover:underline">
                                                {{ $item->title ?? null }} ok
                                            </a>
                                        </h1>
                                        <h6 class=" text-slate-500 text-sm line-clamp-1">
                                            {{ Carbon::parse($item->date)->translatedFormat('l, j F Y') }}
                                        </h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <footer class="flex items-center gap-4">
                    <div class="flex-grow border-b border-emerald-500"></div>
                    <a href=""
                        class="inline-flex items-center gap-2 border border-slate-200 px-4 py-2 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white transition">
                        Selengkapnya
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                        </svg>
                    </a>
                </footer>
            </div>
        </div>
    </section>

    <section id="info">
        <div class="w-full py-10">
            <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">
                <div
                    class="bg-slate-200 bg-[url(/public/image/background/repeating-triangles.svg)] bg-center rounded-xl px-4 py-12">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                        <div class="md:col-span-6 lg:col-span-4">
                            <div class="sticky top-[50%]">
                                <h1
                                    class="font-bold text-3xl bg-linear-to-r from-emerald-500 to-emerald-700 bg-clip-text text-transparent">
                                    Info dan Pengumuman
                                </h1>
                                <p
                                    class="mb-4 text-lg bg-linear-to-r from-emerald-500 to-emerald-700 bg-clip-text text-transparent">
                                    Akses informasi terbaru dari pemerintah
                                </p>
                                <div class="flex justify-start">
                                    <a href=""
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
                                        @foreach ($infoPengumumans as $item)
                                            <div class="col-span-full">
                                                <div
                                                    class="bg-white backdrop-blur-sm rounded-xl border border-slate-300 group relative flex  flex-col overflow-hidden duration-300 hover:shadow-lg p-3">
                                                    <h3 class="text-sm text-slate-500">
                                                        {{ Carbon::parse($item->date)->translatedFormat('l, j F Y') }}
                                                    </h3>
                                                    <a href="" class="hover:underline">
                                                        <h1
                                                            class="text-lg font-semibold text-slate-600 line-clamp-1 mt-2">
                                                            {{ $item->title ?? null }}
                                                        </h1>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="link"
        class="bg-emerald-500 bg-[url(/public/image/background/subtle-prism.svg)] bg-center p-4 py-12">
        <div class="w-full py-10">
            <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">
                <header>
                    <div class="flex items-center gap-4">
                        <h1 class="text-3xl font-bold text-white">
                            Tautan Aplikasi
                        </h1>
                        <div class="flex-1
                            border-b border-white">
                        </div>
                    </div>
                    <h3 class="text-lg text-white">
                        Kurasi tautan situs web aplikasi pemerintah daerah dan aplikasi layanan masyarakat
                    </h3>
                </header>
                <section class="grid grid-cols-2 md:grid-cols-4 gap-4 my-6">
                    @foreach ($appShortcut as $item)
                        <div class="flex flex-col justify-between h-full p-6 rounded-xl bg-slate-100">
                            <div>
                                <div
                                    class="w-20 h-20 flex items-center justify-center rounded-xl bg-white border border-slate-200 mb-4">
                                    @if ($item->image === null)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="size-10 text-emerald-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                        @else
                                            <img src="{{ $item->image ?? null }}" alt="Logo"
                                                class="w-14 h-14 object-contain hover:scale-110 transition duration-300 ease-in-out" />
                                    @endif
                                    </svg>
                                </div>
                                <h1 class="text-xl font-bold text-slate-800 mb-2">
                                    {{ $item->title ?? null }}
                                </h1>
                                <h3 class="text-slate-500 text-normal leading-relaxed">
                                    {{ $item->description ?? null }}
                                </h3>
                            </div>
                            <div class="mt-4 flex justify-start">
                                <a href=""
                                    class="inline-flex items-center gap-2 px-3 py-1 border border-slate-200 rounded-xl text-slate-700 bg-white hover:bg-emerald-500 hover:text-white transition">
                                    Kunjungi
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </section>
                <footer class="flex items-center gap-4">
                    <div class="flex-grow border-b border-white"></div>
                    <a href=""
                        class="inline-flex items-center gap-2 border border-slate-200 px-4 py-2 rounded-xl text-slate-700 bg-white hover:bg-emerald-500 hover:text-white transition">
                        Selengkapnya
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                        </svg>
                    </a>
                </footer>
            </div>
        </div>
    </section>

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
                    @foreach ($documents as $item)
                        <div
                            class="overflow-hidden flex items-center gap-4 shadow-md rounded-xl bg-white hover:shadow-md">

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
                                    {{ Carbon::parse($item->date)->translatedFormat('l, j F Y') }}
                                </h3>
                                <h1 class="text-slate-500 text-lg font-medium line-clamp-3">
                                    {{ $item->title ?? null }}
                                </h1>
                                <div class="mt-4 flex justify-start">
                                    <a href=""
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
                    <a href=""
                        class="inline-flex items-center gap-2 border border-slate-200 px-4 py-2 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white transition">
                        Selengkapnya
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                        </svg>
                    </a>
                </footer>
            </div>
        </div>
    </section>

    <section id="galeri">
        <div class="w-full py-5">
            <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">

                <section class="text-center py-10">
                    <h3 class="flex items-center justify-center tracking-wide">
                        <span class="w-10 h-px bg-emerald-500"></span>
                        <span class="bg-emerald-500 text-white px-3 py-px rounded-xl">Galeri</span>
                        <span class="w-10 h-px bg-emerald-500"></span>
                    </h3>
                    <h1
                        class="font-bold text-3xl bg-linear-to-r from-emerald-500 to-emerald-700 bg-clip-text text-transparent mt-4">
                        Foto dan Video
                    </h1>
                </section>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                    @php
                        $data = [
                            (object) [
                                'image' =>
                                    'https://images.unsplash.com/photo-1541140532154-b024d705b90a?q=80&w=736&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            ],
                            (object) [
                                'image' =>
                                    'https://images.unsplash.com/photo-1712396901531-605f06a423aa?q=80&w=1632&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            ],
                            (object) [
                                'image' =>
                                    'https://images.unsplash.com/photo-1631624215749-b10b3dd7bca7?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            ],
                        ];
                    @endphp
                    @foreach ($data as $item)
                        <div class="md:col-span-6 lg:col-span-4">
                            <div class="mb-3">
                                <div class="overflow-hidden rounded-xl">
                                    <img src="{{ $item->image }}"
                                        class="aspect-square object-cover rounded-xl transition duration-300 ease-in-out hover:scale-110">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <footer class="w-full flex justify-center mt-4">
                    <a href=""
                        class="text-normal text-white flex items-center gap-2 bg-emerald-500  px-4 py-2 rounded-xl hover:bg-emerald-600">
                        Selengkapnya
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                        </svg>
                    </a>
                </footer>
            </div>
        </div>
    </section>

    <footer id="footer"
        class="bg-emerald-500 bg-[url(/public/image/background/alternating-arrowhead.svg)] bg-center p-4 py-12">
        <div class="w-full">
            <div class="w-full sm:max-w-6xl md:max-w-6xl  mx-auto p-5">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                    <div class="md:col-span-6 lg:col-span-4">
                        <div class="flex items-center justify-center md:justify-start gap-3 w-full">
                            <img src="{{ asset('image/logo-meranti.png') }}" alt="Logo"
                                class="w-14 h-14 object-contain" />
                            <h1 class="text-2xl font-bold text-white leading-tight">
                                KEPULAUAN <br> MERANTI
                            </h1>
                        </div>
                        <div class="mt-4 flex items-start space-x-2">
                            <div class="w-fit p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6 fill-white">
                                    <path fill-rule="evenodd" d=" m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975
        16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0
        3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6
        3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h3 class="text-white">Jalan Dorak, Kec. Tebing Tinggi, Selatpanjang - 24753</h3>
                        </div>
                        <div class="mt-4 flex items-start space-x-2">
                            <div class="w-fit p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6 fill-white">
                                    <path fill-rule="evenodd"
                                        d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h3 class="text-white">+62 854 293849</h3>
                        </div>
                        <div class="mt-4 flex items-start space-x-2">
                            <div class="w-fit p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6 fill-white">
                                    <path
                                        d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                                    <path
                                        d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                                </svg>
                            </div>
                            <h3 class="text-white">diskominfotik@merantikab.go.id</h3>
                        </div>
                    </div>

                    <div class="md:col-span-6 lg:col-span-4">
                        <div>
                            <div class="w-full flex items-center">
                                <h3 class="text-xl font-semibold text-white whitespace-nowrap">
                                    Kecamatan
                                </h3>
                                <div class="flex-1 border-t border-white/50 ml-4"></div>
                            </div>
                            <div class="mt-4 flex items-start space-x-2">
                                <div class="w-fit p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4 fill-white">
                                        <path fill-rule="evenodd"
                                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-white">
                                    <a href="" class="hover:underline">
                                        Tasik Putri Puyu
                                    </a>
                                </h3>
                            </div>
                            <div class="mt-4 flex items-start space-x-2">
                                <div class="w-fit p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4 fill-white">
                                        <path fill-rule="evenodd"
                                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-white">
                                    <a href="" class="hover:underline">
                                        Rangsang
                                    </a>
                                </h3>
                            </div>
                            <div class="mt-4 flex items-start space-x-2">
                                <div class="w-fit p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4 fill-white">
                                        <path fill-rule="evenodd"
                                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-white">
                                    <a href="" class="hover:underline">
                                        Rangsang Barat
                                    </a>
                                </h3>
                            </div>
                            <div class="mt-4 flex items-start space-x-2">
                                <div class="w-fit p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4 fill-white">
                                        <path fill-rule="evenodd"
                                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-white">
                                    <a href="" class="hover:underline">
                                        Rangsang Pesisir
                                    </a>
                                </h3>
                            </div>
                            <div class="mt-4 flex items-start space-x-2">
                                <div class="w-fit p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4 fill-white">
                                        <path fill-rule="evenodd"
                                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-white">
                                    <a href="" class="hover:underline">
                                        Merbau
                                    </a>
                                </h3>
                            </div>
                            <div class="mt-4 flex items-start space-x-2">
                                <div class="w-fit p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4 fill-white">
                                        <path fill-rule="evenodd"
                                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-white">
                                    <a href="" class="hover:underline">
                                        Pulau Merbau
                                    </a>
                                </h3>
                            </div>
                            <div class="mt-4 flex items-start space-x-2">
                                <div class="w-fit p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4 fill-white">
                                        <path fill-rule="evenodd"
                                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-white">
                                    <a href="" class="hover:underline">
                                        Tebing Tinggi
                                    </a>
                                </h3>
                            </div>
                            <div class="mt-4 flex items-start space-x-2">
                                <div class="w-fit p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4 fill-white">
                                        <path fill-rule="evenodd"
                                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-white">
                                    <a href="" class="hover:underline">
                                        Tebing Tinggi Barat
                                    </a>
                                </h3>
                            </div>
                            <div class="mt-4 flex items-start space-x-2">
                                <div class="w-fit p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4 fill-white">
                                        <path fill-rule="evenodd"
                                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-white">
                                    <a href="" class="hover:underline">
                                        Tebing Tinggi Timur
                                    </a>
                                </h3>
                            </div>

                        </div>
                    </div>

                    <div class="md:col-span-6 lg:col-span-4">
                        <div>
                            <div class="w-full flex items-center">
                                <h3 class="text-xl font-semibold text-white whitespace-nowrap">
                                    Lainnya
                                </h3>
                                <div class="flex-1 border-t border-white/50 ml-4"></div>
                            </div>
                            <div class="mt-4 flex items-start space-x-2">
                                <div class="w-fit p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4 fill-white">
                                        <path fill-rule="evenodd"
                                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-white">
                                    <a href="" class="hover:underline">
                                        Smart City
                                    </a>
                                </h3>
                            </div>
                            <div class="mt-4 flex items-start space-x-2">
                                <div class="w-fit p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4 fill-white">
                                        <path fill-rule="evenodd"
                                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-white">
                                    <a href="" class="hover:underline">
                                        Lapor
                                    </a>
                                </h3>
                            </div>
                            <div class="mt-4 flex items-start space-x-2">
                                <div class="w-fit p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4 fill-white">
                                        <path fill-rule="evenodd"
                                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-white">
                                    <a href="" class="hover:underline">
                                        Statistik
                                    </a>
                                </h3>
                            </div>
                            <div class="mt-4 flex items-start space-x-2">
                                <div class="w-fit p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4 fill-white">
                                        <path fill-rule="evenodd"
                                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-white">
                                    <a href="" class="hover:underline">
                                        PPID
                                    </a>
                                </h3>
                            </div>
                            <div class="mt-4 flex items-start space-x-2">
                                <div class="w-fit p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4 fill-white">
                                        <path fill-rule="evenodd"
                                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-white">
                                    <a href="" class="hover:underline">
                                        Statistik
                                    </a>
                                </h3>
                            </div>
                            <div class="mt-4 flex items-start space-x-2">
                                <div class="w-fit p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4 fill-white">
                                        <path fill-rule="evenodd"
                                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-white">
                                    <a href="" class="hover:underline">
                                        Desa Sialang Pasung
                                    </a>
                                </h3>
                            </div>

                        </div>
                    </div>
                </div>
                <div
                    class="mt-16 flex w-full flex-col items-center justify-center space-x-2 border-t border-slate-100 py-2 md:flex-row text-white">
                    <p class="text-sm font-medium">Diskominfotik &copy; {{ date('Y') }}</p>
                    <p class="text-sm font-medium">Kabupaten Kepulauan Meranti</p>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>

</html>
