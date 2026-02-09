<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class News extends Component
{
    public $data = [];
    public $page = 1;
    public $perPage = 8;
    public $more = true;
    public $search = null;

    public function mount()
    {
        $this->fetchData();
    }

    public function updatedSearch()
    {
        $this->resetData();
        $this->fetchData();
    }

    public function resetData()
    {
        $this->data = [];
        $this->page = 1;
        $this->more = true;
    }

    public function fetchData()
    {
        $url = $this->search
            ? env('API_NEWS_SEARCH') . $this->search
            : env('API_NEWS');

        $response = Http::timeout(5)->get($url, [
            'page' => $this->page,
            'per_page' => $this->perPage,
        ])->json();

        $items = collect($response['data'] ?? []);

        $this->data = collect($this->data)
            ->merge($items)
            ->values()
            ->toArray();

        if ($items->count() < $this->perPage) {
            $this->more = false;
        }
    }

    public function loadMore()
    {
        $this->page++;
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.news');
    }
}
