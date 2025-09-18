<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\Public\NewsController;

class SearchNews extends Component
{
    public $search = null;

    public function render()
    {
        // $controller = new NewsController();
        // $news = $controller->getNews($this->search);

        // return view('livewire.search-news', [
        //     'news' => $news,
        // ]);

        $controller = new NewsController();
        $result = $controller->getNews($this->search);
        return view('livewire.search-news', [
            'data' => $result['data'],
            'error' => $result['error'],
        ]);
    }
}
