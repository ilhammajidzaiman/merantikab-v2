<?php

namespace App\View\Components\Layouts;

use Closure;
use App\Models\SettingSosmed;
use Illuminate\View\Component;
use App\Models\NavigationFooter;
use Illuminate\Contracts\View\View;

class Footer extends Component
{
    public $footer;
    public $sosmed;

    public function __construct()
    {
        $this->footer = NavigationFooter::active()
            ->where('parent_id', -1)
            ->withOnly(['parent', 'children'])
            ->orderBy('order')
            ->get();
        $this->sosmed = SettingSosmed::show()
            ->take(5)
            ->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.layouts.footer', [
            'footer' => $this->footer,
            'sosmed' => $this->sosmed,
        ]);
    }
}
