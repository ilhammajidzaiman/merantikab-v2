<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\Public\GaleryController;

// class Galery extends Component
// {
//     public $search = '';
//     public $page = 1;
//     public $lastPage = 1;
//     public $error = null;
//     public $data;

//     public function mount()
//     {
//         $this->data = collect();
//         $this->fetchNews();
//     }

//     public function updatedSearch()
//     {
//         $this->resetPage();
//         $this->data = collect();
//         $this->fetchNews();
//     }

//     public function resetPage()
//     {
//         $this->page = 1;
//     }

//     public function fetchNews()
//     {
//         $controller = new GaleryController();
//         $result = $controller->fetchData($this->search, $this->page);
//         if ($result['error']):
//             $this->error = $result['error'];
//             return;
//         endif;
//         $this->data = $this->data->merge($result['data']);
//         $this->lastPage = $result['last_page'];
//     }

//     public function loadMore()
//     {
//         if ($this->page < $this->lastPage) :
//             $this->page++;
//             $this->fetchNews();
//         endif;
//     }

//     public function render()
//     {
//         return view('livewire.galery', [
//             'data' => $this->data,
//             'error' => $this->error,
//             'hasMore' => $this->page < $this->lastPage,
//         ]);
//     }
// }


class Galery extends Component
{
    public $search = '';
    public $type = 1; // default foto
    public $page = 1;
    public $lastPage = 1;
    public $error = null;
    public $data;

    public function mount()
    {
        $this->data = collect();
        $this->fetchData();
    }

    public function updatedSearch()
    {
        $this->resetPage();
        $this->data = collect();
        $this->fetchData();
    }

    public function updatedType()
    {
        $this->resetPage();
        $this->data = collect();
        $this->fetchData();
    }

    public function resetPage()
    {
        $this->page = 1;
    }

    public function fetchData()
    {
        $controller = new GaleryController();
        $result = $controller->fetchData($this->type, $this->search, $this->page);

        if ($result['error']) {
            $this->error = $result['error'];
            return;
        }

        $this->data = $this->data->merge($result['data']);
        $this->lastPage = $result['last_page'];
    }

    public function loadMore()
    {
        if ($this->page < $this->lastPage) {
            $this->page++;
            $this->fetchData();
        }
    }

    public function render()
    {
        return view('livewire.galery', [
            'data' => $this->data,
            'error' => $this->error,
            'hasMore' => $this->page < $this->lastPage,
        ]);
    }
}
