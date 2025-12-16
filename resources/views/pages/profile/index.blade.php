@php
    $data = [
        (object) [
            'title' => 'Perisai',
            'image' => asset('/image/lambang/logokab_bambu.png'),
            'description' =>
                'Memiliki arti alam yang subur sebagai ketahanan pangan, dengan garis pinggir hitam dan kuning memiliki kekuatan dan kebesaran masyarakat dalam mempertahankan wilayahnya, serta lekukan di kanan dan kiri atas memiliki arti bentuk geografis wilayah Kepulauan Meranti yang memiliki tanjung dan teluk.',
        ],
        (object) [
            'title' => 'Bambu Kuning',
            'image' => asset('/image/lambang/logokab_bambu.png'),
            'description' =>
                'Memiliki arti semangat dan perjuangan masyarakat dalam pembentukan Kabupaten Kepulauan Meranti dengan 9 (Sembilan) Ruas Bambu menunjukan tahun 2009 sebagai tahun pengesahan Kabupaten Kepulauan Meranti',
        ],
        (object) [
            'title' => 'Pohon Sagu',
            'image' => asset('/image/lambang/logokab_sagu.png'),
            'description' =>
                'Memiliki arti salah satu sumber kekuatan pangan dan perekonomian masyarakat Kabupaten Kepulauan Meranti dengan jumlah pohon sebanyak 1 (satu) batang dan pelepah yang berjumlah 16 (enam belas) buah menunjukan tanggal 16 Januari yang merupakan tanggal dan bulan pengesahan Kabupaten Kepulauan Meranti',
        ],
        (object) [
            'title' => 'Pinang Sirih',
            'image' => asset('/image/lambang/logokab_pinangsirih.png'),
            'description' =>
                'Memiliki arti sifat dan ciri masyarakat yang selalu hidup dalam tuntunan agama, rukun dan menjunjung tinggi nilai-nilai adat istiadat dan budaya, ramah tamah dan terhormat serta selalu mengembangkan ilmu pengetahuan. 17 (Tujuh Belas) helai daun sirih, 45 (empat puluh lima), urat-urat pada daun sirih dan 8 (delapan) buah pinang merupakan tanggal, bulan dan tahun kemerdekaan Republik Indonesia.',
        ],
        (object) [
            'title' => 'Perahu',
            'image' => asset('/image/lambang/logokab_perahu.png'),
            'description' =>
                'Melambangkan wilayah kepulauan Meranti Sebagai kawasan strategis yang menjadi sumber ekonomi masyarakat dengan letaknya yang berada pada jalur transportasi laut serta memiliki potensi sebagai kawasan niaga dengan posisinya sebagai tempat persinggahan atau daerah transit',
        ],
        (object) [
            'title' => 'Gelombang',
            'image' => asset('/image/lambang/logokab_gelombang.png'),
            'description' =>
                'menunjukan jumlah sila yang terdapat dalam Panca Sila sebagai dasar Negara Republik Indonesia serta melambangkan masyarakat kabupaten kepulauan meranti yang berketuhanan, berkemanusiaan, bersatu, demokratis dan sejahtera.',
        ],
        (object) [
            'title' => 'Tulisan Arab Melayu',
            'image' => asset('/image/lambang/logokab_tulisanarab.png'),
            'description' =>
                'melambangkan penghormatan masyarakat Kabupaten Kepulauan Meranti terhadap ilmu pengetahuan dan sejarah.',
        ],
        (object) [
            'title' => 'Pita Merah',
            'image' => asset('/image/lambang/logokab_banner.png'),
            'description' =>
                'Melambangkan tekad dan kesiapan rohani dan jasmani masyarakat Kabupaten Kepulauan Meranti dalam menghadapi perubahan peradaban dan perkembangan zaman.',
        ],
    ];
@endphp
<x-layouts.app title="{{ Str::headline(__('pimpinan')) }}">
    <x-section id="galery" class="pt-16">
        <x-wrapper class="py-12">
            <x-container class="space-y-8">
                <div id="profile"
                    class="bg-emerald-500 bg-[url(/public/image/background/subtle-prism.svg)] bg-center bg-fixed bg-repeat rounded-xl p-4">
                    <div class="h-full flex-col md:flex-row py-10 flex space-y-4">
                        <div class="flex-1">
                            <div class="w-56 h-56 flex items-center justify-center mx-auto">
                                <img src="{{ asset('/image/logo-meranti.png') }}" alt="Logo"
                                    class="w-48 h-48 object-contain hover:scale-110 transition duration-300 ease-in-out">
                            </div>
                        </div>
                        <div class="flex-3 flex items-center justify-center">
                            <div class="space-y-2">
                                <h3 class="text-2xl font-bold text-slate-100">Kabupaten</h3>
                                <h1 class="text-5xl font-bold font-nacelle text-white">Kepulauan Meranti
                                </h1>
                                <p class="text-lg text-white">
                                    Memperkenalkan permata muda di Provinsi Riau. Mengilhami kekaguman
                                    dengan dedikasi
                                    yang tak kenal lelah dan terus bekerja keras menjadi kabupaten yang
                                    maju, cerdas,
                                    dan bermartabat
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="lainnya" class="w-full">
                    <div class="h-full w-full flex-col md:flex-row space-x-0 md:space-x-10 py-20 flex gap-4">
                        <div class="flex-1">
                            <div class="bg-white p-2 w-full h-56 md:h-full shadow-lg rounded-xl ">
                                <img src="{{ asset('/image/carousel/lamr-bupati.jpg') }}"
                                    class="w-full h-full object-cover rounded-lg" alt="">
                            </div>
                        </div>
                        <div class="w-full md:w-3/5">
                            <div class="space-y-2">
                                <h3 class="text-xl font-bold text-slate-600">
                                    Kabupaten
                                </h3>
                                <h1 class="text-4xl font-bold font-nacelle text-emerald-600">
                                    Kepulauan Meranti
                                </h1>
                                <p class="text-base text-slate-600">
                                    Kepulauan Meranti adalah sebuah kabupaten di Provinsi Riau, Indonesia
                                    dengan
                                    ibukota
                                    Selatpanjang. Jumlah penduduk di kabupaten ini mencapai
                                    206.116 jiwa (2020) dengan luas wilayah seluas 3.707,84 km². Wilayah ini
                                    terdiri dari 15
                                    pulau, termasuk Pulau Merbau, Pulau Ransang, dan Pulau Tebing Tinggi.
                                </p>
                                <p class="text-base text-slate-600">
                                    Keadaan geografi Kabupaten Kepulauan Meranti didominasi oleh daratan
                                    rendah
                                    dengan tanah
                                    alluvial dan grey humus. Wilayah ini sangat cocok untuk pertanian,
                                    perkebunan, dan
                                    perikanan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="logo"
                    class="bg-slate-200 bg-[url(/public/image/background/repeating-triangles.svg)] bg-center bg-fixed bg-repeat rounded-xl overflow-hidden">
                    <div class="w-full flex justify-center pt-12">
                        <div class="space-y-2 text-center">
                            <h1 class="text-3xl font-bold text-emerald-500">
                                {{ Str::title(__('logo')) }}
                            </h1>
                            <h3 class="text-xl">
                                {{ Str::title(__('lambang dan makna')) }}
                            </h3>
                            <div
                                class="w-full md:w-xl h-0.5 mx-auto bg-gradient-to-r from-transparent via-emerald-500 to-transparent">
                            </div>
                        </div>
                    </div>
                    <section class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4">
                        @foreach ($data as $item)
                            <div class="flex flex-col justify-between h-full rounded-xl bg-slate-100 p-4">
                                <div class="space-y-4">
                                    <div
                                        class="w-40 h-40 flex items-center justify-center rounded-xl bg-white border border-slate-200 ">
                                        <img src="{{ $item->image ?? null }}" alt="Logo"
                                            class="w-36 h-36 object-contain hover:scale-110 transition duration-300 ease-in-out">
                                    </div>
                                    <h1 class="text-xl font-bold text-slate-800">
                                        {{ $item->title ?? null }}
                                    </h1>
                                    <h3 class="text-slate-500 text-lg">
                                        {{ $item->description ?? null }}
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </section>
                </div>
            </x-container>
        </x-wrapper>
    </x-section>
</x-layouts.app>
