<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\View\Component;
use App\Models\NavigationFooter;
use Illuminate\Contracts\View\View;

class Footer extends Component
{
    public $footer;

    public function __construct()
    {
        $this->footer = NavigationFooter::active()
            ->where('parent_id', -1)
            ->withOnly(['parent', 'children'])
            ->orderBy('order')
            ->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.layouts.footer', [
            'footer' => $this->footer,
        ]);
    }
}
