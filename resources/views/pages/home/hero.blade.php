<section id="hero">
    <div class="relative w-full h-screen">
        <div x-data="{
            active: 0,
            interval: null,
            items: {{ $carouselFull->count() }},
            next() {
                this.active = (this.active + 1) % this.items;
            },
            previous() {
                this.active = (this.active - 1 + this.items) % this.items;
            },
            startAutoSlide() {
                this.interval = setInterval(() => this.next(), 5000);
            },
            stopAutoSlide() {
                clearInterval(this.interval);
            }
        }" x-init="startAutoSlide()" @mouseenter="stopAutoSlide" @mouseleave="startAutoSlide"
            class="relative w-full h-screen overflow-hidden">
            @if ($carouselFull->count() > 0)
                @foreach ($carouselFull as $index => $item)
                    <div x-show="active === {{ $index }}" x-transition:enter="transition-opacity duration-1000"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition-opacity duration-1000" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" class="absolute inset-0">
                        <img src="{{ env('APP_URL_ASSET') . $item->file }}" class="w-full h-screen object-cover">
                        <x-section>
                            <x-wrapper>
                                <x-container class="relative">
                                    <div class="absolute inset-x-0 bottom-8">
                                        <div
                                            class="text-white rounded-xl bg-slate-900/20 backdrop-blur-xs text-shadow-md text-center p-4">
                                            <h3 class="font-medium text-xl">{{ $item->title ?? null }}</h3>
                                            <p class="font-light text-md hidden md:block">
                                                {{ $item->description ?? null }}</p>
                                        </div>
                                    </div>
                                </x-container>
                            </x-wrapper>
                        </x-section>
                    </div>
                @endforeach
            @else
                <div class="absolute inset-0 opacity-100 bg-slate-500">
                    <img src="{{ asset('/image/carousel/lamr-bupati.jpg') }}" class="w-full h-screen object-cover">
                </div>
            @endif
            <div class="hidden md:block">
                <button @click="previous"
                    class="absolute top-1/2 left-6 -translate-y-1/2 bg-white/25 text-white p-4 rounded-xl hover:bg-white/50 z-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </button>
                <button @click="next"
                    class="absolute top-1/2 right-6 -translate-y-1/2 bg-white/25 text-white p-4 rounded-xl hover:bg-white/50 z-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>
        </div>

        <x-section id="heroContent" class="absolute inset-0 flex items-center">
            <x-wrapper>
                <x-container class="space-y-8 relative z-10">
                    <div class="grid grid-cols-6 gap-4">
                        <div class="col-span-full md:col-start-1 md:col-end-4">
                            <div class="space-y-4">
                                <div class="text-white text-shadow-md text-shadow-slate-600 space-y-4">
                                    <h3 class="font-light text-xl">
                                        Situs Resmi Pemerintahan Daerah
                                    </h3>
                                    <h1 class="text-6xl font-bold">
                                        Kabupaten
                                    </h1>
                                    <h1 class="text-6xl font-bold">
                                        Kepulauan Meranti
                                    </h1>
                                    <h3 class="font-light text-xl">
                                        Cari Informasi Tentang Kabupaten Kepulauan Meranti
                                    </h3>
                                </div>
                                <livewire:search-global />
                            </div>
                        </div>

                        <div class="col-span-full md:col-start-5 md:col-end-7 hidden md:block">
                            <div class="bg-slate-900/20 backdrop-blur-xs rounded-xl text-white p-4 space-y-2">
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

                        <div class="relative col-span-full">
                            <div class="border border-white rounded-xl">
                                <div id="scrollContainer"
                                    class="flex gap-4 overflow-x-auto mx-10 my-4 hide-scrollbar snap-x scroll-smooth">
                                    @foreach ($appShortcut as $item)
                                        <div
                                            class="flex-none aspect-square w-28 md:w-40 h-full rounded-xl overflow-hidden bg-white/30 backdrop-blur-xs hover:bg-white/50 snap-center p-4">
                                            <div class="flex flex-col items-center justify-between h-full rounded-xl">
                                                <div class="flex flex-col items-center justify-center h-full">
                                                    @if ($item->appList->file)
                                                        <img src="{{ env('APP_URL_ASSET') . $item->appList->file }}"
                                                            alt="Logo"
                                                            class="w-full h-12 md:h-18 object-contain transition duration-300 ease-in-out hover:scale-110" />
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-10 text-emerald-500 w-full h-16">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                                        </svg>
                                                    @endif
                                                </div>

                                                <h1
                                                    class="font-medium text-white text-shadow-xs text-shadow-slate-500 text-center">
                                                    <a href="{{ $item->appList->link->url }}" target="_blank"
                                                        title="{{ $item->appList->title }}"
                                                        class="hover:underline line-clamp-1">
                                                        {{ $item->appList->title }}
                                                    </a>
                                                </h1>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button id="scrollLeft"
                                class="absolute left-0 top-1/2 -translate-y-1/2 text-white hover:text-emerald-300 h-full rounded-xl z-10 p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </button>
                            <button id="scrollRight"
                                class="absolute right-0 top-1/2 -translate-y-1/2 text-white hover:text-emerald-300 h-full rounded-xl z-10 p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </x-container>
            </x-wrapper>
        </x-section>
    </div>
</section>
