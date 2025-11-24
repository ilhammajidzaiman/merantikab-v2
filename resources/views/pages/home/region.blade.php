<x-section id="region">
    <x-wrapper class="pb-12">
        <x-container class="space-y-8">
            @php
                $data = [
                    // (object) [
                    //     'title' => 'Kepulauan Meranti',
                    //     'embed' =>
                    //         '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d638927.1672684896!2d102.39199847854586!3d1.056880219582431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d6d7312c478335%3A0xdbf4296a8b3214fd!2sKabupaten%20Kepulauan%20Meranti%2C%20Riau!5e1!3m2!1sid!2sid!4v1763969082775!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="bg-slate-200 aspect-video w-full rounded-xl"></iframe>',
                    // ],
                    (object) [
                        'title' => 'Kecamatan Tebing Tinggi',
                        'embed' =>
                            '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d79867.62388633884!2d102.69572797864404!3d0.9874000645917235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d6d90d36b73f0b%3A0xf8b586f62c2d0af0!2sKec.%20Tebing%20Tinggi%2C%20Kabupaten%20Kepulauan%20Meranti%2C%20Riau!5e1!3m2!1sid!2sid!4v1763967268215!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="bg-slate-200 aspect-video w-full rounded-xl"></iframe>',
                    ],
                    (object) [
                        'title' => 'Kecamatan Rangsang Barat',
                        'embed' =>
                            '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d79865.4318548598!2d102.66296327857482!3d1.0747745896621603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d6d6f1429260cd%3A0x4039d80b220e170!2sKec.%20Rangsang%20Bar.%2C%20Kabupaten%20Kepulauan%20Meranti%2C%20Riau!5e1!3m2!1sid!2sid!4v1763967354180!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="bg-slate-200 aspect-video w-full rounded-xl"></iframe>',
                    ],
                    (object) [
                        'title' => 'Kecamatan Rangsang',
                        'embed' =>
                            '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d319479.95844635356!2d102.88458915308713!3d0.8834601586042248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d72326599bc137%3A0x4039d80b220f540!2sRangsang%2C%20Kabupaten%20Kepulauan%20Meranti%2C%20Riau!5e1!3m2!1sid!2sid!4v1763967405057!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="bg-slate-200 aspect-video w-full rounded-xl"></iframe>',
                    ],
                    (object) [
                        'title' => 'Kecamatan Tebing Tinggi Barat',
                        'embed' =>
                            '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d159739.81782983293!2d102.47296201149412!3d0.8872062309956498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d6e9dfc16120ab%3A0x4039d80b220f0c0!2sKec.%20Tebing%20Tinggi%20Bar.%2C%20Kabupaten%20Kepulauan%20Meranti%2C%20Riau!5e1!3m2!1sid!2sid!4v1763967302297!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="bg-slate-200 aspect-video w-full rounded-xl"></iframe>',
                    ],
                    (object) [
                        'title' => 'Kecamatan Merbau',
                        'embed' =>
                            '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d319451.30461595755!2d102.17985014953958!3d1.1701824924043012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d6b35f5465ee27%3A0x3193b26ea097c2f!2sKec.%20Merbau%2C%20Kabupaten%20Kepulauan%20Meranti%2C%20Riau!5e1!3m2!1sid!2sid!4v1763967461755!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="bg-slate-200 aspect-video w-full rounded-xl"></iframe>',
                    ],
                    (object) [
                        'title' => 'Kecamatan Pulau Merbau',
                        'embed' =>
                            '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d159732.8840177373!2d102.45334046101678!3d1.0354260703483524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d6cf5679ae823b%3A0xfae2558189cfb033!2sKec.%20Pulau%20Merbau%2C%20Kabupaten%20Kepulauan%20Meranti%2C%20Riau!5e1!3m2!1sid!2sid!4v1763967431385!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="bg-slate-200 aspect-video w-full rounded-xl"></iframe>',
                    ],
                    (object) [
                        'title' => 'Kecamatan Tebing Tinggi Timur',
                        'embed' =>
                            '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d319484.4635651995!2d102.64884165379954!3d0.8294124369417548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d71e22509ff54f%3A0xe084968cebc00d47!2sKec.%20Tebing%20Tinggi%20Tim.%2C%20Kabupaten%20Kepulauan%20Meranti%2C%20Riau!5e1!3m2!1sid!2sid!4v1763967325151!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="bg-slate-200 aspect-video w-full rounded-xl"></iframe>',
                    ],
                    (object) [
                        'title' => 'Kecamatan Tasik Putri Puyu',
                        'embed' =>
                            '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d159722.7170412258!2d102.28795701045532!3d1.220641818029431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d14b0ab8b58f69%3A0x1080b59054fad9dc!2sKec.%20Tasik%20Putri%20Puyu%2C%20Kabupaten%20Kepulauan%20Meranti%2C%20Riau!5e1!3m2!1sid!2sid!4v1763967481492!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="bg-slate-200 aspect-video w-full rounded-xl"></iframe>',
                    ],
                    (object) [
                        'title' => 'Kecamatan Rangsang Pesisir',
                        'embed' =>
                            '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d159731.25364245102!2d102.78635441091744!3d1.0672930356630819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d728e1800b0879%3A0xb8193bfe607e2dba!2sKec.%20Rangsang%20Pesisir%2C%20Kabupaten%20Kepulauan%20Meranti%2C%20Riau!5e1!3m2!1sid!2sid!4v1763967378752!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="bg-slate-200 aspect-video w-full rounded-xl"></iframe>',
                    ],
                ];
            @endphp
            <div x-data="{ selectedMap: `{{ $data[0]->embed }}`, list: @js($data) }" class="">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="flex-1 space-y-2">
                        <div class="space-y-2">
                            <h3 class="text-xl">
                                {{ Str::title(__('peta wilayah kecamatan')) }}
                            </h3>
                            <div class="w-full h-0.5 bg-linear-to-r from-emerald-500 to-transparent"></div>
                        </div>
                        <ul class="list-decimal list-inside space-y-1">
                            <template x-for="(item, index) in list" :key="index">
                                <li class="rounded-xl cursor-pointer"
                                    :class="selectedMap === item.embed ? 'text-emerald-600 ' : 'hover:text-emerald-500'"
                                    @click="selectedMap = item.embed" x-text="item.title">
                                </li>
                            </template>
                        </ul>
                    </div>
                    <div class="flex-1">
                        <div x-html="selectedMap"></div>
                    </div>
                </div>
            </div>
        </x-container>
    </x-wrapper>
</x-section>
