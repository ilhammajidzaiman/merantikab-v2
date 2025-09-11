<?php

namespace App\Livewire;

use Livewire\Component;

class Carousel extends Component
{
    public function mount()
    {
        $this->carousel = collect(
            [
                (object)[
                    'title' => 'Lorem.',
                    'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus repudiandae quo nemo.',
                    'image' => 'https://images.unsplash.com/photo-1612103183244-7598b792bb05?q=80&w=1073&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                ],
                (object)[
                    'title' => 'Lorem, ipsum.',
                    'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias aspernatur doloremque facilis magni, velit porro.',
                    'image' => 'https://images.unsplash.com/photo-1528046652967-217fde4a4529?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                ],
                (object)[
                    'title' => 'Lorem, ipsum dolor.',
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium harum expedita exercitationem facere.',
                    'image' => 'https://plus.unsplash.com/premium_photo-1680435083006-32b1a77b790f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                ],
                (object)[
                    'title' => 'Lorem ipsum dolor sit.',
                    'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem ex recusandae voluptates excepturi natus ratione. Aliquam, inventore?',
                    'image' => 'https://images.unsplash.com/photo-1533656274249-01a343657cea?q=80&w=765&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                ],
                (object)[
                    'title' => 'Lorem ipsum dolor sit amet.',
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, harum placeat.',
                    'image' => 'https://images.unsplash.com/photo-1610208405071-fbb514399c58?q=80&w=1074&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                ],
                // (object)[
                //     'title' => 'Lorem ipsum dolor sit amet consectetur.',
                //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae suscipit facilis non et illo.',
                //     'image' => 'https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/05/17/mie-sagu-selat-selatan-3952383480.jpg',
                // ],
                // (object)[
                //     'title' => 'Lorem, ipsum dolor sit amet consectetur adipisicing.',
                //     'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam aliquam nostrum laudantium adipisci id assumenda totam.',
                //     'image' => 'https://cdn.rri.co.id/berita/Pekanbaru/o/1727144725112-Lempeng_Sagu/b7ftggshi0vn89m.jpeg',
                // ],
                // (object)[
                //     'title' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.',
                //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint saepe possimus et, aut molestiae ex laborum accusantium dicta!',
                //     'image' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjk6SbeucV4xhlKnCgghHiPbbKGlv5noACTmxGpKs_bjN2zQHgcbeEH57g2UbuVpH-zda6Qwr7OLX99bUV5Lq80hZr4PIcUgIi48sx1nvnCGepHVhG7u-qlKWnzZunaCEloWk2sIdjtaPY/s1600/Sempolet+Siput+-+Kelana+Riau.jpg',
                // ],
            ]
        );
    }

    public $carousel = [];

    public $active = 0;

    public function next()
    {
        $this->active = ($this->active + 1) % count($this->carousel);
    }

    public function previous()
    {
        $this->active = ($this->active - 1 + count($this->carousel)) % count($this->carousel);
    }

    public function goTo($index)
    {
        $this->active = $index;
    }

    public function render()
    {
        return view('livewire.carousel');
    }
}
