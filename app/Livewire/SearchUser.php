<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Public\UserController;

class SearchUser extends Component
{
    public $search = null;

    // public function render()
    // {
    //     $controller = new UserController();
    //     $users = $controller->index()->getData()['users']
    //         ->filter(function ($user) {
    //             return $this->search === '' || str_contains(strtolower($user->name), strtolower($this->search));
    //         });

    //     return view('livewire.search-user', [
    //         'users' => $users,
    //     ]);
    // }

    public function render()
    {
        $controller = new UserController();
        $result = $controller->getUsers($this->search);
        return view('livewire.search-user', [
            'data' => $result['data'],
            'error' => $result['error'],
        ]);
    }
}
