<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;

class CarouselFull extends Component
{
    public Collection $carouselFull;

    public $active = 0;

    public function mount($carouselFull = [])
    {
        $this->carouselFull = collect($carouselFull);
    }

    public function next()
    {
        if ($this->carouselFull->isEmpty()) :
            return;
        endif;
        $this->active = ($this->active + 1) % $this->carouselFull->count();
    }

    public function previous()
    {
        if ($this->carouselFull->isEmpty()) :
            return;
        endif;
        $this->active = ($this->active - 1 + $this->carouselFull->count()) % $this->carouselFull->count();
    }

    public function goTo($index)
    {
        if ($this->carouselFull->isEmpty()) :
            return;
        endif;
        if ($index >= 0 && $index < $this->carouselFull->count()) :
            $this->active = $index;
        endif;
    }

    public function render()
    {
        return view('livewire.carousel-full');
    }
}
