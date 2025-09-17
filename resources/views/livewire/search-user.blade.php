<div>
    <input wire:model.live="search">
    <div wire:loading>
        mencari berita...
    </div>
    <ol>
        @forelse ($users as $user)
            <li>{{ $user->name }}</li>
        @empty
            <li>Tidak ada hasil</li>
        @endforelse
    </ol>
</div>
