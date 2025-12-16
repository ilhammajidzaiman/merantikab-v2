<x-layouts.app title="{{ Str::headline(__('profil')) }} {{ $record->name ?? null }}">
    <x-section id="leader" class="pt-16">
        <x-wrapper class="py-12">
            <x-container class="space-y-8">
                @if ($record)

                    <div class="flex space-x-2 items-center text-md text-slate-600 mb-4">
                        <a wire:navigate href="{{ route('leader.index') }}"class="hover:underline">
                            {{ Str::title(__('kepemimpinan')) }}
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                        <a wire:navigate
                            href="{{ route('leader.show', $record->id) }} "class="hover:underline font-normal text-emerald-500 line-clamp-1">
                            {{ $record->name ?? null }}
                        </a>
                    </div>
                    <div class="space-y-2">
                        <h1 class="text-3xl font-bold text-emerald-500">
                            {{ Str::ucfirst(__('profil')) }}
                        </h1>
                        <h3 class="text-xl">
                            {{ Str::title(__('kepemimpinan')) }}
                        </h3>
                        <div class="w-full h-0.5 bg-linear-to-r from-emerald-500 to-transparent"></div>
                    </div>
                    <div class="space-y-4">
                        <div class="w-full bg-white shadow rounded-xl overflow-hidden space-y-4 p-4">
                            <div class="grid grid-cols-12 gap-8">
                                <div class="col-span-full space-y-4">
                                    <div
                                        class="flex flex-col md:flex-row items-start overflow-hidden rounded-xl bg-white gap-8">
                                        <div
                                            class="aspect-3/4 w-full md:w-64 h-full flex items-center justify-center overflow-hidden rounded-xl shrink-0 bg-slate-200">
                                            <img src="{{ $record->file ? env('APP_URL_ASSET') . $record->file : asset('/image/default-img.svg') }}"
                                                alt="image"
                                                class="w-full h-full object-cover transition duration-300 ease-in-out hover:scale-110">
                                        </div>
                                        <div class="w-full space-y-4">
                                            <div class="space-y-2">
                                                <h1 class="text-3xl font-bold">
                                                    {{ $record->name ?? null }}
                                                </h1>
                                                <div class="w-full h-0.5 bg-linear-to-r from-slate-300 to-transparent">
                                                </div>
                                            </div>
                                            <div class="space-y-12">
                                                @foreach ($record->leaderships as $item)
                                                    <div class="flex flex-col items-start gap-2">
                                                        <div class="bg-slate-500 text-white rounded-xl px-4 py-2">
                                                            {{ $item->period->period ?? null }}
                                                        </div>
                                                        <div class="text-xl font-bold">
                                                            {{ $item->position->getLabel() ?? null }}
                                                        </div>
                                                        <div class="text-slate-500">
                                                            {{ $item->description ?? null }}
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
                @else
                    <div class="col-span-full space-y-4">
                        <x-empty />
                    </div>
                @endif
            </x-container>
        </x-wrapper>
    </x-section>
</x-layouts.app>
