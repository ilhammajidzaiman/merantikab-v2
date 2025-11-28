<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.page.index');
    }

    public function show(string $id)
    {
        $data['record'] = Page::active()
            ->where('slug', $id)
            ->first();
        return view('pages.page.show', $data);
    }
}
