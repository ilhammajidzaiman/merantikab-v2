<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Traits\FormatDateTimeTrait;
use App\Http\Controllers\Controller;

class AnnouncementController extends Controller
{
    use FormatDateTimeTrait;

    public function index()
    {
        return view('pages.announcement.index');
    }

    public function show(string $id)
    {
        $data['record'] = Announcement::active()
            ->where('slug', $id)
            ->first();
        return view('pages.announcement.show', $data);
    }
}
