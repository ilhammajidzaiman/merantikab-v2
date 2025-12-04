<x-section id="address">
    <x-wrapper class="py-12">
        <x-container class="space-y-8">
            <div class="w-full flex justify-center">
                <div class="space-y-2 text-center">
                    <h1 class="text-3xl font-bold text-emerald-500">
                        {{ Str::title(__('alamat')) }}
                    </h1>
                    <h3 class="text-xl">
                        {{ Str::title(__('alamat kantor bupati kepulauan meranti')) }}
                    </h3>
                    <div
                        class="w-full md:w-xl h-0.5 mx-auto bg-gradient-to-r from-transparent via-emerald-500 to-transparent">
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl overflow-hidden shadow p-4">
                <div class="flex flex-col-reverse md:flex-row gap-8">
                    <div class="flex-1">
                        {{-- <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d424058.1010056712!2d102.44029710727453!3d1.053076913315754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d6d7312c478335%3A0xdbf4296a8b3214fd!2sKabupaten%20Kepulauan%20Meranti%2C%20Riau!5e1!3m2!1sid!2sid!4v1763625874452!5m2!1sid!2sid"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" class="aspect-video w-full rounded-xl">
                        </iframe> --}}
                        {!! $siteInformation->map ?? null !!}
                    </div>
                    <div class="flex-1">
                        @php
                            $address = [
                                (object) [
                                    'title' => 'alamat',
                                    'description' => $siteInformation->address,
                                    'file' =>
                                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d=" m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" /></svg>',
                                ],
                                (object) [
                                    'title' => 'telpon',
                                    'description' => $siteInformation->phone,
                                    'file' =>
                                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"> <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" /></svg>',
                                ],
                                (object) [
                                    'title' => 'email',
                                    'description' => $siteInformation->email,
                                    'file' =>
                                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"> <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" /> <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" /> </svg>',
                                ],
                            ];
                        @endphp
                        @foreach ($address as $item)
                            <div class="mt-4 flex items-start space-x-2">
                                <div class="w-fit">
                                    {!! $item->file ?? null !!}
                                </div>
                                <div>
                                    <h3 class="text-slate-500">
                                        {{ Str::ucfirst(__($item->title ?? null)) }}
                                    </h3>
                                    <h3 class="text-xl">
                                        {{ $item->description ?? null }}
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </x-container>
    </x-wrapper>
</x-section>
