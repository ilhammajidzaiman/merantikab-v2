<?php

namespace App\Livewire;

use App\Models\File;
use App\Models\AppList;
use Livewire\Component;
use App\Models\Announcement;
use App\Services\NewsService;

class SearchGlobal extends Component
{
    public $keyword = '';
    public $announcement = [];
    public $file = [];
    public $appList = [];
    public $news = [];

    public function updatedKeyword()
    {
        $this->announcement = [];
        $this->file = [];
        $this->appList = [];
        $this->news = [];
        if (strlen($this->keyword) > 2) {
            $this->announcement = Announcement::where('title', 'ilike', '%' . $this->keyword . '%')
                ->latest()
                ->take(10)
                ->get();
            $this->file = File::where('title', 'ilike', '%' . $this->keyword . '%')
                ->latest()
                ->take(10)
                ->get();
            $this->appList = AppList::where('title', 'ilike', '%' . $this->keyword . '%')
                ->latest()
                ->take(10)
                ->get();
            $newsService = app(NewsService::class);
            $result = $newsService->getNews($this->keyword);
            $this->news = $result->take(10)->values()->toArray();
        }
    }

    public function goToAnnouncement($id)
    {
        // return redirect()->route('article.show', $id);
    }

    public function goToFile($id)
    {
        // return redirect()->route('category.show', $id);
    }

    public function goToAppList($id)
    {
        // return redirect()->route('category.show', $id);
    }

    public function goToNews($slug)
    {
        // return redirect()->route('news.show', $slug);
    }

    public function render()
    {
        return view('livewire.search-global');
    }
}
