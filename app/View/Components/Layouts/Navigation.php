<?php

namespace App\View\Components\Layouts;

use Closure;
use App\Models\NavigationMenu;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Navigation extends Component
{
    public $data;

    public function __construct()
    {
        $this->data = NavigationMenu::active()
            ->where('parent_id', -1)
            ->withOnly(['parent', 'children'])
            ->orderBy('order')
            ->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.layouts.navigation', [
            'menu' => $this->data,
        ]);
    }
}
