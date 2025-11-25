@php
    use Carbon\Carbon;
@endphp

<x-layouts.app title="{{ Str::headline(__('beranda')) }}">
    @include('pages.home.hero')
    {{-- @include('pages.home.maps') --}}
    @include('pages.home.news')
    @include('pages.home.announcement')
    @include('pages.home.app-list')
    @include('pages.home.file')
    @include('pages.home.galery')
    @include('pages.home.address')
    @include('pages.home.region')

    @push('metaTag')
        <meta property="og:url" content="{{ env('APP_URL') }}">
        <meta property="og:type" content="Website">
        <meta property="og:title" content="Website Resmi Kabupaten KEPULAUAN MERANTI">
        <meta property="og:description" content="Website Resmi Kabupaten KEPULAUAN MERANTI">
        <meta property="og:image" content="{{ asset('/image/logo-meranti.png') }}">
        <meta name="twitter:card" content="summary_large_image">
        <meta property="twitter:domain" content="{{ env('APP_URL') }}">
        <meta property="twitter:url" content="{{ env('APP_URL') }}">
        <meta name="twitter:title" content="Website Resmi Kabupaten KEPULAUAN MERANTI">
        <meta name="twitter:image" content="{{ asset('/image/logo-meranti.png') }}">
    @endpush

    @push('scripts')
        <script>
            const url = "{{ env('APP_URL') }}";
            const message = "Website Resmi Kabupaten KEPULAUAN MERANTI";

            document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach((el) => {
                new bootstrap.Tooltip(el);
            });

            function whatsapp() {
                const api = `https://wa.me/?text=${encodeURIComponent(url + "\n\n" + message)}`;
                window.open(api, "_blank");
            }

            function facebook() {
                const api = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
                window.open(api, "_blank");
            }

            function twitter() {
                const api =
                    `https://twitter.com/intent/tweet?text=${encodeURIComponent(message + "\n\n" + url)}`;
                window.open(api, "_blank");
            }

            function telegram() {
                const api =
                    `https://t.me/share/url?url=${encodeURIComponent(url)}&text=${encodeURIComponent("\n" + message)}`;
                window.open(api, "_blank");
            }

            function copyLink() {
                const textarea = document.createElement('textarea');
                textarea.value = url;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);
                alert(`${message}\n\nTautan berhasil disalin.`);
            }
        </script>
    @endpush
</x-layouts.app>
