<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Image as Model1;
use App\Models\Video as Model2;

class Galery extends Component
{
    public $search = '';
    public $type = 1;
    public $page = 1;
    public $perPage = 9;
    public $lastPage = 1;
    public $more = false;
    public $data;

    public function mount()
    {
        $this->data = collect();
        $this->fetchData();
    }

    public function updatedSearch()
    {
        $this->resetList();
    }

    public function updatedType()
    {
        $this->resetList();
    }

    public function resetList()
    {
        $this->data = collect();
        $this->page = 1;
        $this->fetchData();
    }

    public function fetchData()
    {
        $model = $this->type == 1 ? Model1::class : Model2::class;
        $query = $model::active()
            ->orderByDesc('id')
            ->when($this->search, function ($q) {
                $q->where('title', 'ilike', '%' . $this->search . '%');
            });
        $paginator = $query->paginate($this->perPage, ['*'], 'page', $this->page);
        $this->lastPage = $paginator->lastPage();
        $this->more = $this->page < $this->lastPage;
        $this->data = $this->data->concat($paginator->items())->values();
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
        return view('livewire.galery');
    }
}
