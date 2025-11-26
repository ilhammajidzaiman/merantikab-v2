<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\NewsController;

class News extends Component
{
    public $search = '';
    public $page = 1;
    public $lastPage = 1;
    public $error = null;
    public $data;

    public function mount()
    {
        $this->data = collect();
        $this->fetchNews();
    }

    public function updatedSearch()
    {
        $this->resetPage();
        $this->data = collect();
        $this->fetchNews();
    }

    public function resetPage()
    {
        $this->page = 1;
    }

    public function fetchNews()
    {
        $controller = new NewsController();
        $result = $controller->getNews($this->search, $this->page);
        if ($result['error']) :
            $this->error = $result['error'];
            return;
        endif;
        $this->data = $this->data->merge($result['data']);
        $this->lastPage = $result['last_page'];
    }

    public function loadMore()
    {
        if ($this->page < $this->lastPage) :
            $this->page++;
            $this->fetchNews();
        endif;
    }

    public function render()
    {
        return view('livewire.news', [
            'data' => $this->data,
            'error' => $this->error,
            'hasMore' => $this->page < $this->lastPage,
        ]);
    }
}
