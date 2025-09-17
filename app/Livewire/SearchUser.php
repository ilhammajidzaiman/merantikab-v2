<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchUser extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.search-user', [
            // 'users' => User::where('name', 'ilike', '%' . $this->search . '%')->get(),
            'users' => User::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->search) . '%'])->get(),
        ]);
    }
}
