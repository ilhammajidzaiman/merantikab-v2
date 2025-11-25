<?php

namespace App\Http\Controllers;

use App\Traits\FormatDateTimeTrait;
use App\Http\Controllers\Controller;

class AppListController extends Controller
{
    use FormatDateTimeTrait;

    public function index()
    {
        return view('pages.app-list.index');
    }
}
