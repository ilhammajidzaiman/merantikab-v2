<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\Public\DocumentController;

class Document extends Component
{
    public $searchDocument = '';
    public $page = 1;
    public $lastPage = 1;
    public $error = null;
    public $data;

    public function mount()
    {
        $this->data = collect();
        $this->fetchData();
    }

    public function updatedSearchDocument()
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
        $controller = new DocumentController();
        $result = $controller->fetchDocument($this->searchDocument, $this->page);
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
            $this->fetchData();
        }
    }

    public function render()
    {
        return view('livewire.document', [
            'data' => $this->data,
            'error' => $this->error,
            'hasMore' => $this->page < $this->lastPage,
        ]);
    }
}
