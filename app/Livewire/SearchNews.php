<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\Public\NewsController;

class SearchNews extends Component
{
    public $search = '';

    public function render()
    {
        $controller = new NewsController();
        $news = $controller->index()->getData()['news'] // ambil data dari controller
            ->filter(function ($item) {
                return $this->search === '' || str_contains(strtolower($item->title), strtolower($this->search));
            });

        return view('livewire.search-news', [
            'news' => $news,
        ]);
    }
}
