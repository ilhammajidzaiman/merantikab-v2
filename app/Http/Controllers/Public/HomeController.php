<?php

namespace App\Http\Controllers\Public;

use App\Models\File;
use App\Models\Image;
use App\Models\Video;
use App\Models\AppList;
use App\Models\Carousel;
use App\Models\AppShortcut;
use App\Models\Announcement;
use Illuminate\Support\Collection;
use App\Traits\FormatDateTimeTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    use FormatDateTimeTrait;

    public function index()
    {
        $data['carouselNews'] = $this->getCarouselNews();
        $data['news'] = $this->getNews();
        $data['carouselFull'] = Carousel::active()
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
        return view('public.home.index', $data);
    }

    private function getNews(): Collection
    {
        $response = Http::get(env('API_NEWS'))->object()->data ?? [];
        $data = collect($response)
            ->map(function ($item) {
                return (object) [
                    'slug' => $item->slug ?? null,
                    'title' => $item->title ?? null,
                    'category' => $item->category ?? null,
                    'categorySlug' => $item->categorySlug ?? null,
                    'date' => $this->formatDayDate($item->date ?? null),
                    'institute' => $item->institute ?? null,
                    'user' => $item->user ?? null,
                    'thumbnail_alt' => $item->thumbnail_alt ?? null,
                    'image' => $item->thumbnail ?? null,
                ];
            });
        return $data;
    }

    private function getCarouselNews(): Collection
    {
        $response = Http::get(env('API_NEWS'))->object()->data ?? [];
        $data = collect($response)
            ->take(5)
            ->map(function ($item) {
                return (object) [
                    'slug' => $item->slug ?? null,
                    'title' => $item->title ?? null,
                    'image' => $item->thumbnail ?? null,
                    'thumbnail_alt' => $item->thumbnail_alt ?? null,
                    'category' => $item->category ?? null,
                    'categorySlug' => $item->categorySlug ?? null,
                    'date' => $this->formatDayDate($item->date ?? null),
                    'institute' => $item->institute ?? null,
                    'user' => $item->user ?? null,
                ];
            });
        return $data;
    }
}
