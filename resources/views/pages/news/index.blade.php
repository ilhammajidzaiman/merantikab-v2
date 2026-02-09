<x-layouts.app title="{{ Str::headline(__('berita')) }}">
    <x-section id="news" class="pt-16">
        <x-wrapper class="py-12">
            <x-container class="space-y-8">
                <div class="space-y-2">
                    <h1 class="text-3xl font-bold text-emerald-500">
                        {{ Str::title(__('berita')) }}
                    </h1>
                    <h3 class="text-xl">
                        {{ Str::title(__('kabupaten kepulauan meranti')) }}
                    </h3>
                    <div class="w-full h-0.5 bg-linear-to-r from-emerald-500 to-transparent"></div>
                </div>
                <livewire:news />

                {{-- @if ($news->isNotEmpty())
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                        @foreach ($news as $item)
                            <div class="md:col-span-6 lg:col-span-4">
                                <div class="mb-3">
                                    <div class="overflow-hidden rounded-xl">
                                        <img src="{{ $item['file'] ?? null }}"
                                            class="aspect-video object-cover rounded-xl transition duration-300 ease-in-out hover:scale-105">
                                    </div>
                                    <h6 class="w-fit rounded-xl bg-emerald-500  text-white my-2 px-2 py-0.5">
                                        {{ $item['category'] ?? null }}
                                    </h6>
                                    <a wire:navigate href="{{ route('news.show', $item['slug'] ?? null) }}"
                                        class="hover:underline transition">
                                        <h1 class="text-lg font-normal text-slate-600 line-clamp-3 my-2">
                                            {{ $item['title'] }}
                                        </h1>
                                    </a>
                                    <h3 class="text-sm text-slate-500">
                                        {{ $item['date'] ?? null }}
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <x-error-server />
                @endif --}}
            </x-container>
        </x-wrapper>
    </x-section>
</x-layouts.app>
