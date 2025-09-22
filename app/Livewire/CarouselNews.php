<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;

class CarouselNews extends Component
{
    public Collection $carouselNews;

    public $active = 0;

    public function mount($carouselNews = [])
    {
        $this->carouselNews = collect($carouselNews);
    }

    public function next()
    {
        if ($this->carouselNews->isEmpty()) :
            return;
        endif;
        $this->active = ($this->active + 1) % $this->carouselNews->count();
    }

    public function previous()
    {
        if ($this->carouselNews->isEmpty()) :
            return;
        endif;
        $this->active = ($this->active - 1 + $this->carouselNews->count()) % $this->carouselNews->count();
    }

    public function render()
    {
        return view('livewire.carousel-news');
    }
}
