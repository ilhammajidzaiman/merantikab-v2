<section id="news">
    <div class="w-full py-10">
        <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">
            <div class="w-full flex justify-center">
                <div class="space-y-2 text-center">
                    <h1 class="text-3xl font-bold text-emerald-500">
                        {{ Str::title(__('berita')) }}
                    </h1>
                    <h3 class="text-xl">
                        {{ Str::title(__('berita kabupaten kepulauan meranti')) }}
                    </h3>
                    <div
                        class="w-full md:w-xl h-0.5 mx-auto bg-gradient-to-r from-transparent via-emerald-500 to-transparent">
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4">
                <div class="md:col-span-6 lg:col-span-1">
                    <div x-data="{
                        active: 0,
                        total: {{ $carouselNews->count() }},
                        timer: null,
                        next() {
                            this.active = (this.active + 1) % this.total
                            this.restart()
                        },
                        prev() {
                            this.active = (this.active - 1 + this.total) % this.total
                            this.restart()
                        },
                        goTo(index) {
                            this.active = index
                            this.restart() // reset waktu setelah klik indikator
                        },
                        restart() {
                            clearInterval(this.timer)
                            this.timer = setInterval(() => this.next(), 4000)
                        },
                        init() {
                            this.timer = setInterval(() => this.next(), 4000)
                        }
                    }" x-init="init()" @mouseenter="clearInterval(timer)"
                        @mouseleave="restart"
                        class="relative w-full max-w-6xl mx-auto aspect-square overflow-hidden rounded-xl">
                        @if ($carouselNews->isNotEmpty())
                            @foreach ($carouselNews as $index => $item)
                                <div x-show="active === {{ $index }}" x-cloak
                                    x-transition:enter="transition-opacity duration-700 ease-in"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition-opacity duration-700 ease-out"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    class="absolute inset-0">
                                    <div class="overflow-hidden rounded-xl relative">
                                        <img src="{{ env('API_SIPB') . ($item->image ?? null) }}"
                                            alt="{{ $item->title ?? null }}" class="aspect-square object-cover w-full">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent p-4 flex flex-col justify-end space-y-2 pb-16">
                                            <a href="{{ url('news/' . ($item->slug ?? null)) }}">
                                                <h2
                                                    class="text-xl md:text-2xl font-normal text-white line-clamp-2 hover:underline">
                                                    {{ $item->title ?? null }}
                                                </h2>
                                            </a>
                                            <p class="text-xs md:text-sm text-gray-200">
                                                {{ $item->date ?? null }} | {{ $item->category ?? null }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="absolute bottom-4 left-4 flex items-center space-x-4 text-white z-20">
                                <button @click="prev" class="p-2 bg-emerald-500 rounded-full hover:bg-emerald-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 19.5 8.25 12l7.5-7.5" />
                                    </svg>
                                </button>
                                <span class="text-sm" x-text="(active + 1) + ' dari ' + total"></span>
                                <button @click="next" class="p-2 bg-emerald-500 rounded-full hover:bg-emerald-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                    </svg>
                                </button>
                            </div>
                            <div class="absolute bottom-4 right-4 flex space-x-2 z-20">
                                @foreach ($carouselNews as $i => $pre)
                                    <button @click="goTo({{ $i }})" class="w-3 h-3 rounded-full transition"
                                        :class="active === {{ $i }} ?
                                            'bg-emerald-500 scale-125' :
                                            'bg-white/60 hover:bg-white'"></button>
                                @endforeach
                            </div>
                        @else
                            <x-public.empty />
                        @endif
                    </div>
                </div>
                <div class="md:col-span-6 lg:col-span-1">
                    <div
                        class="w-full aspect-square overflow-y-auto bg-slate-100 rounded-xl border border-slate-200 hide-scrollbar">
                        @if ($news->isNotEmpty())
                            @foreach ($news as $item)
                                <div class="overflow-hidden flex items-center gap-4 shadow-xs rounded-xl bg-white m-4">
                                    <div class="w-34 h-34 overflow-hidden rounded-r-full shrink-0 bg-slate-200">
                                        <img src="{{ env('API_SIPB') . $item->image ?? null }}" alt="image"
                                            class="w-full h-full object-cover transition duration-300 ease-in-out hover:scale-110">
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-emerald-500 text-normal line-clamp-1">
                                            {{ $item->category ?? null }}
                                        </h3>
                                        <h1 class="text-slate-700 text-lg font-medium line-clamp-2">
                                            <a wire:navigate href="{{ route('news.show', $item->slug ?? null) }}"
                                                class="hover:underline">
                                                {{ $item->title ?? null }}
                                            </a>
                                        </h1>
                                        <h6 class=" text-slate-500 text-sm line-clamp-1">
                                            {{ $item->date ?? null }}
                                        </h6>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <x-public.empty />
                        @endif
                    </div>
                </div>
            </div>
            <footer class="flex items-center gap-4">
                <div class="flex-grow border-b border-emerald-500"></div>
                <a
                    class="inline-flex items-center gap-2 border border-slate-200 px-4 py-2 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white transition">
                    Selengkapnya
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                    </svg>
                </a>
            </footer>
        </div>
    </div>
</section>
