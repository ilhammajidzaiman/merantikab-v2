<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\Public\InformationController;

class Information extends Component
{
    public $searchInformation = '';
    public $page = 1;
    public $lastPage = 1;
    public $error = null;
    public $data;

    public function mount()
    {
        $this->data = collect();
        $this->fetchNews();
    }

    public function updatedSearchInformation()
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
        $controller = new InformationController();
        $result = $controller->getInformation($this->searchInformation, $this->page);
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
        return view('livewire.information', [
            'data' => $this->data,
            'error' => $this->error,
            'hasMore' => $this->page < $this->lastPage,
        ]);
    }
}
