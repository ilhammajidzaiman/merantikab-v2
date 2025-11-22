<x-public.layout.app-layout title="{{ Str::title(__('kepemimpinan')) }}">

    <header id="header" class="mt-28">
        <div class="w-full">
            <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">
                <h3 class="text-lg bg-linear-to-r from-emerald-500 to-emerald-700 bg-clip-text text-transparent">
                    Kepemimpinan
                </h3>
                <div class="flex items-center gap-4">
                    <h1
                        class="font-bold text-3xl bg-linear-to-r from-emerald-500 to-emerald-700 bg-clip-text text-transparent">
                        Bupati Kepulauan Meranti
                    </h1>
                    <div class="flex-1 border-b border-emerald-500"></div>
                </div>
            </div>
        </div>
    </header>

    <section id="profile">
        <div class="w-full">
            <div class="w-full sm:max-w-6xl md:max-w-6xl mx-auto p-3">
                <div class="relative flex flex-col items-center w-full">
                    @foreach ($data as $item)
                        <div class="relative w-full p-6 bg-white border-2 border-emerald-500 rounded-xl">
                            <div
                                class="absolute -top-4 left-1/2 -translate-x-1/2 bg-emerald-500 text-white px-4 py-2 rounded-full text-sm font-bold">
                                {{ $item->masa_jabatan ?? null }}
                            </div>
                            <div class="flex flex-col md:flex-row md:justify-center-safe gap-10">
                                <div class=" w-full ">
                                    {{-- <div class="flex flex-col md:flex-row md:justify-center-safe ...">
                                        <div class="bg-slate-400 w-full">001</div>
                                        <div class="bg-slate-400 w-full">002</div>
                                    </div> --}}
                                    <div class="flex gap-4">
                                        <div class="flex-none">
                                            <div class="aspect-3/4 h-36 md:h-56 overflow-hidden rounded-xl">
                                                <img src="{{ env('API_ADMIN') . $item->image_1 ?? null }}"
                                                    alt="image"
                                                    class="bg-slate-200 w-full h-full object-cover transition duration-300 ease-in-out hover:scale-110">
                                            </div>
                                        </div>
                                        <div class="flex-auto space-y-4">
                                            <div class="space-y-1">
                                                <h1 class="text-slate-600 text-base font-bold">
                                                    Nama:
                                                </h1>
                                                <h3 class="text-slate-600 text-base font-normal">
                                                    {{ $item->name_1 ?? null }}
                                                </h3>
                                            </div>
                                            <div class="space-y-1">
                                                <h1 class="text-slate-600 text-base font-bold">
                                                    Jabatan:
                                                </h1>
                                                <h3 class="text-slate-600 text-base font-normal">
                                                    {{ $item->jabatan_1 ?? null }}
                                                </h3>
                                            </div>
                                            <div class="space-y-1">
                                                <h1 class="text-slate-600 text-base font-bold">
                                                    Biografi:
                                                </h1>
                                                <h3 class="text-slate-600 text-base font-normal">
                                                    {!! $item->biografi_1 ?? null !!}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($item->image_2 !== null)
                                    <div class=" w-full">
                                        <div class="flex gap-4">
                                            <div class="flex-none">
                                                <div class="aspect-3/4 h-36 md:h-56 overflow-hidden rounded-xl">
                                                    <img src="{{ env('API_ADMIN') . $item->image_2 ?? null }}"
                                                        alt="image"
                                                        class="bg-slate-200 w-full h-full object-cover transition duration-300 ease-in-out hover:scale-110">
                                                </div>
                                            </div>
                                            <div class="flex-auto space-y-4">
                                                <div class="space-y-1">
                                                    <h1 class="text-slate-600 text-base font-bold">
                                                        Nama:
                                                    </h1>
                                                    <h3 class="text-slate-600 text-base font-normal">
                                                        {{ $item->name_2 ?? null }}
                                                    </h3>
                                                </div>
                                                <div class="space-y-1">
                                                    <h1 class="text-slate-600 text-base font-bold">
                                                        Jabatan:
                                                    </h1>
                                                    <h3 class="text-slate-600 text-base font-normal">
                                                        {{ $item->jabatan_2 ?? null }}
                                                    </h3>
                                                </div>
                                                <div class="space-y-1">
                                                    <h1 class="text-slate-600 text-base font-bold">
                                                        Biografi:
                                                    </h1>
                                                    <h3 class="text-slate-600 text-base font-normal">
                                                        {!! $item->biografi_2 ?? null !!}
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="w-0.5 bg-emerald-500 h-20"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-public.layout.app-layout>
