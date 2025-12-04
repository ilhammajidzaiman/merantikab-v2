<x-layouts.app title="{{ Str::headline(__('pimpinan')) }}">
    <x-section id="leader" class="pt-16">
        <x-wrapper class="py-12">
            <x-container class="space-y-8">
                <div class="space-y-2">
                    <h1 class="text-3xl font-bold text-emerald-500">
                        {{ Str::title(__('kepemimpinan')) }}
                    </h1>
                    <h3 class="text-xl">
                        {{ Str::title(__('bupati dan wakil bupati')) }}
                    </h3>
                    <div class="w-full h-0.5 bg-linear-to-r from-emerald-500 to-transparent"></div>
                </div>
                <div class="space-y-4">
                    @foreach ($data as $period)
                        <div class="w-full bg-white shadow rounded-xl overflow-hidden space-y-4 p-4">
                            <div class="space-y-2">
                                <h3 class="text-xl">
                                    {{ Str::title(__('periode')) }}
                                </h3>
                                <h1 class="text-3xl font-bold text-emerald-500">
                                    {{ $period->period ?? null }}
                                </h1>
                                <div class="w-full h-0.5 bg-linear-to-r from-slate-300 to-transparent"></div>
                            </div>
                            <div class="grid grid-cols-12 gap-8">
                                @foreach ($period->leaderships as $item)
                                    <div class="col-span-full lg:col-span-6 space-y-4">
                                        <div
                                            class="flex flex-col md:flex-row items-start overflow-hidden rounded-xl bg-white gap-4">
                                            <div
                                                class="aspect-square md:aspect-3/4 w-full md:w-48 h-full flex items-center justify-center overflow-hidden rounded-xl shrink-0 bg-slate-200">
                                                <img src="{{ $item->leader?->file ? env('APP_URL_ASSET') . $item->leader->file : asset('/image/default-img.svg') }}"
                                                    alt="image"
                                                    class="w-full h-full object-cover transition duration-300 ease-in-out hover:scale-110">
                                            </div>
                                            <div class="space-y-2">
                                                <h3 class="text-sm text-white bg-slate-500 w-fit rounded-xl px-4 py-2">
                                                    {{ $item->position?->getLabel() }}
                                                </h3>
                                                <h1 class="text-2xl font-bold">
                                                    <a href="{{ route('leader.show', $item->leader?->id) }}">
                                                        {{ $item->leader->name ?? null }}
                                                    </a>
                                                </h1>
                                                <div class="text-slate-500 line-clamp-6">
                                                    {!! $item->description ?? null !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-container>
        </x-wrapper>
    </x-section>
</x-layouts.app>
