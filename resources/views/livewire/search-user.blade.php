<div>
    <input wire:model.live="search">
    <span wire:loading>
        mencari berita...
    </span>
    @if ($error)
        <p>
            gagal mengambil data dari server.
        </p>
    @else
        <ol>
            @forelse ($data as $item)
                <li>{{ $item->name }}</li>
            @empty
                <li>data tidak ditemukan</li>
            @endforelse
        </ol>
    @endif
</div>
