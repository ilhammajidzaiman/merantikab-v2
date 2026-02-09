<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Image;
use App\Models\Video;
use App\Models\AppList;
use App\Models\Carousel;
use App\Models\AppShortcut;
use App\Models\Announcement;
use App\Traits\FormatDateTimeTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    use FormatDateTimeTrait;

    public function index()
    {
        $response = Http::get(env('API_NEWS'))->json();
        $data['carouselNews'] = collect($response['data'])->take(5);
        $data['news'] = collect($response['data']);
        $data['carouselFull'] = Carousel::active()
            ->orderByDesc('id')
            ->latest()
            ->take(10)
            ->get();
        $data['appShortcut'] = AppShortcut::active()
            ->withOnly(['appList', 'appList.link'])
            ->orderBy('order')
            ->latest()
            ->take(10)
            ->get();
        $data['announcement'] = Announcement::active()
            ->orderByDesc('id')
            ->latest()
            ->take(6)
            ->get();
        $data['appList'] = AppList::active()
            ->orderByDesc('id')
            ->latest()
            ->take(8)
            ->get();
        $data['file'] = File::active()
            ->orderByDesc('id')
            ->latest()
            ->take(6)
            ->get();
        $data['image'] = Image::active()
            ->orderByDesc('id')
            ->latest()
            ->take(4)
            ->get();
        $data['video'] = Video::active()
            ->orderByDesc('id')
            ->latest()
            ->take(1)
            ->get();
        return view('pages.home.index', $data);
    }
}
