<x-section id="news" class="p-4">
    <x-wrapper
        class="bg-emerald-500 bg-[url(/public/image/background/subtle-prism.svg)] bg-center bg-fixed bg-repeat rounded-xl py-12">
        <x-container class="space-y-8">
            <div class="w-full flex justify-center">
                <div class="space-y-2 text-center">
                    <h1 class="text-3xl font-bold text-white">
                        {{ Str::title(__('aplikasi layanan')) }}
                    </h1>
                    <h3 class="text-xl">
                        {{ Str::title(__('kurasi tautan situs web aplikasi pemerintah daerah dan aplikasi layanan masyarakat')) }}
                    </h3>
                    <div class="w-full md:w-xl h-0.5 mx-auto bg-gradient-to-r from-transparent via-white to-transparent">
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 my-6">
                @foreach ($appList as $item)
                    <div class="flex flex-col justify-between h-full p-6 rounded-xl bg-slate-100">
                        <div>
                            <div
                                class="w-20 h-20 flex items-center justify-center rounded-xl bg-white border border-slate-200 mb-4">
                                @if ($item->file === null)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-10 text-emerald-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                    </svg>
                                @else
                                    <img src="{{ env('APP_URL_ASSET') . $item->file ?? null }}" alt="Logo"
                                        class="w-14 h-14 object-contain hover:scale-110 transition duration-300 ease-in-out" />
                                @endif
                            </div>
                            <h1 class="text-xl font-bold text-slate-800 mb-2 line-clamp-1">
                                {{ $item->title ?? null }}
                            </h1>
                            <h3 class="text-slate-500 text-normal line-clamp-2">
                                {{ $item->description ?? null }}
                            </h3>
                        </div>
                        <div class="mt-4 flex justify-start">
                            <a href="{!! $item->link ?? null !!}" target="_blank"
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
            </div>
            <div class="flex items-center gap-4">
                <div class="flex-grow border-b border-white"></div>
                <a wire:navigate href="{{ route('link.index') }}"
                    class="inline-flex items-center gap-2 border border-slate-200 px-4 py-2 rounded-xl text-slate-700 bg-white hover:bg-emerald-500 hover:text-white transition">
                    Selengkapnya
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                    </svg>
                </a>
            </div>
        </x-container>
    </x-wrapper>
</x-section>
