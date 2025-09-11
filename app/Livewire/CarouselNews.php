<?php

namespace App\Livewire;

use Livewire\Component;

class CarouselNews extends Component
{
    public $carouselNews = [];

    public $active = 0;

    public function mount($carouselNews = [])
    {
        $this->carouselNews = collect($carouselNews);
    }

    public function next()
    {
        $this->active = ($this->active + 1) % count($this->carouselNews);
    }

    public function previous()
    {
        $this->active = ($this->active - 1 + count($this->carouselNews)) % count($this->carouselNews);
    }

    public function render()
    {
        return view('livewire.carousel-news');
    }
}
