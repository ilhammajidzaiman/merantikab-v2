<x-layouts.app title="{{ Str::headline(__('profil')) }} {{ $record->name ?? null }}">
    <x-section id="leader" class="pt-16">
        <x-wrapper class="py-12">
            <x-container class="space-y-8">
                <div class="space-y-2">
                    <h1 class="text-3xl font-bold text-emerald-500">
                        {{ Str::ucfirst(__('profil')) }}
                    </h1>
                    <div class="w-full h-0.5 bg-linear-to-r from-emerald-500 to-transparent"></div>
                </div>
                <div class="space-y-4">
                    <div class="w-full bg-white shadow rounded-xl overflow-hidden space-y-4 p-4">
                        <div class="grid grid-cols-12 gap-8">
                            <div class="col-span-full space-y-4">
                                <div
                                    class="flex flex-col md:flex-row items-center overflow-hidden rounded-xl bg-white gap-4">
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
                                        <div class="flex flex-row items-center gap-2">
                                            <div class="bg-slate-500 text-white rounded-xl px-4 py-2">
                                                2022-2025
                                            </div>
                                            <div class="text-lg">
                                                Plt Bupati
                                            </div>
                                        </div>
                                        <div class="flex flex-row items-center gap-2">
                                            <div class="bg-slate-500 text-white rounded-xl px-4 py-2">
                                                2025-2030
                                            </div>
                                            <div class="text-lg">
                                                Bupati
                                            </div>
                                        </div>
                                        <div class="flex flex-row items-center gap-2">
                                            <div class="bg-slate-500 text-white rounded-xl px-4 py-2">
                                                2025-2030
                                            </div>
                                            <div class="text-lg">
                                                Bupati
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-container>
        </x-wrapper>
    </x-section>
</x-layouts.app>
