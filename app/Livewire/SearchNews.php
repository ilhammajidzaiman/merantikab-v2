<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Public\NewsController;

// class SearchNews extends Component
// {
//     // public $search = null;
//     // public $perPage = 4;

//     // public function loadMore()
//     // {
//     //     $this->perPage += 4;
//     // }

//     // public function render()
//     // {
//     //     $controller = new NewsController();
//     //     $result = $controller->getNews($this->search);
//     //     $data = collect($result['data'])->take($this->perPage);
//     //     return view('livewire.search-news', [
//     //         'data' => $data,
//     //         'error' => $result['error'],
//     //         'hasMore' => count($result['data']) > $this->perPage,
//     //     ]);
//     // }
//     public $search = null;
//     public $page = 1; // mulai dari page 1
//     public $data = [];
//     public $lastPage = null;
//     public $error = null;

//     public function mount()
//     {
//         $this->fetchNews();
//     }

//     public function fetchNews()
//     {
//         $controller = new NewsController();
//         $result = $controller->getNews($this->search, $this->page);

//         if ($result['error']) {
//             $this->error = $result['error'];
//             return;
//         }

//         // gabungkan hasil lama dengan hasil baru
//         $this->data = array_merge($this->data, $result['data']);

//         // simpan info halaman terakhir
//         $this->lastPage = $result['last_page'];
//     }

//     public function loadMore()
//     {
//         if ($this->page < $this->lastPage) {
//             $this->page++;
//             $this->fetchNews();
//         }
//     }

//     public function render()
//     {
//         return view('livewire.search-news', [
//             'data' => $this->data,
//             'error' => $this->error,
//             'hasMore' => $this->page < $this->lastPage,
//         ]);
//     }
// }

class SearchNews extends Component
{
    // public $search = '';
    // public $page = 1;
    // public $data = [];
    // public $lastPage = null;
    // public $error = null;

    // protected $updatesQueryString = ['search'];

    // public function updatedSearch()
    // {
    //     $this->reset(['page', 'data', 'error']);
    //     $this->page = 1;
    //     $this->fetchNews();
    // }

    // public function mount()
    // {
    //     $this->fetchNews();
    // }

    // // public function fetchNews()
    // // {
    // //     $controller = new NewsController();
    // //     $result = $controller->getNews($this->search, $this->page);

    // //     if ($result['error']) {
    // //         $this->error = $result['error'];
    // //         return;
    // //     }



    // //     $this->data = array_merge($this->data, $result['data']);
    // //     $this->lastPage = $result['last_page'];
    // // }


    // public function loadMore()
    // {
    //     if ($this->page < $this->lastPage) {
    //         $this->page++;
    //         $this->fetchNews();
    //     }
    // }

    // public function render()
    // {
    //     return view('livewire.search-news', [
    //         'data' => $this->data,
    //         'error' => $this->error,
    //         'hasMore' => $this->page < $this->lastPage,
    //     ]);
    // }



    public $search = '';
    public $page = 1;
    public $lastPage = 1;
    public $error = null;

    /** @var \Illuminate\Support\Collection */
    public $data;

    public function mount()
    {
        // pastikan collection
        $this->data = collect();
        $this->fetchNews();
    }

    public function updatedSearch()
    {
        // reset ketika ada pencarian baru
        $this->resetPage();
        $this->data = collect();
        $this->fetchNews();
    }

    public function resetPage()
    {
        $this->page = 1;
    }

    // public function fetchNews()
    // {
    //     $controller = new NewsController();
    //     $result = $controller->getNews($this->search, $this->page);

    //     if ($result['error']) {
    //         $this->error = $result['error'];
    //         return;
    //     }
    //     $items = $result['data'] instanceof Collection ? $result['data'] : collect($result['data']);

    //     $this->data = $this->data->merge($items);
    //     $this->lastPage = $result['last_page'] ?? 1;
    // }


    // public function fetchNews()
    // {
    //     $controller = new NewsController();
    //     $result = $controller->getNews($this->search, $this->page);

    //     if ($result['error']) {
    //         $this->error = $result['error'];
    //         return;
    //     }

    //     // array biasa → bisa langsung pakai array_merge
    //     $this->data = array_merge($this->data, $result['data']);
    //     $this->lastPage = $result['last_page'];
    // }

    public function fetchNews()
    {
        $controller = new NewsController();
        $result = $controller->getNews($this->search, $this->page);

        if ($result['error']) {
            $this->error = $result['error'];
            return;
        }

        // merge Collection
        $this->data = $this->data->merge($result['data']);
        $this->lastPage = $result['last_page'];
    }

    public function loadMore()
    {
        if ($this->page < $this->lastPage) {
            $this->page++;
            $this->fetchNews();
        }
    }

    public function render()
    {
        return view('livewire.search-news', [
            'data' => $this->data,
            'error' => $this->error,
            'hasMore' => $this->page < $this->lastPage,
        ]);
    }
}
