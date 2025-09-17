<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Http\Controllers\Public\UserController;

class SearchUser extends Component
{
    public $search = '';

    public function render()
    {
        $controller = new UserController();
        $users = $controller->index()->getData()['users'] // ambil data dari controller
            ->filter(function ($user) {
                return $this->search === '' || str_contains(strtolower($user->name), strtolower($this->search));
            });

        return view('livewire.search-user', [
            'users' => $users,
        ]);
    }
}
