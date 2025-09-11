<?php

namespace App\Livewire;

use Livewire\Component;

class CarouselFull extends Component
{
    public $carouselFull = [];

    public $active = 0;

    public function mount($carouselFull = [])
    {
        $this->carouselFull = collect($carouselFull);
    }

    public function next()
    {
        $this->active = ($this->active + 1) % count($this->carouselFull);
    }

    public function previous()
    {
        $this->active = ($this->active - 1 + count($this->carouselFull)) % count($this->carouselFull);
    }

    public function goTo($index)
    {
        $this->active = $index;
    }

    public function render()
    {
        return view('livewire.carousel-full');
    }
}
