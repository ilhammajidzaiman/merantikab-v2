<?php

namespace App\Http\Controllers\Public;

use Illuminate\Support\Collection;
use App\Traits\FormatDateTimeTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    use FormatDateTimeTrait;

    public function index()
    {
        $data['carouselFull'] = $this->getCarouselFull();
        $data['carouselNews'] = $this->getCarouselNews();
        $data['news'] = $this->getNews();
        $data['infoPengumuman'] = $this->getInfoPengumuman();
        $data['document'] = $this->getDocument();
        $data['heroShortcut'] = $this->getHeroShortcut();
        $data['appShortcut'] = $this->getAppShortcut();
        $data['video'] = $this->getVideo();
        $data['foto'] = $this->getFoto();
        return view('public.home', $data);
    }

    private function getCarouselFull(): Collection
    {
        $response = Http::get(env('API_CAROUSEL'))->object() ?? [];
        return collect($response)
            ->map(function ($item) {
                return (object) [
                    'title' => $item->title ?? null,
                    'description' => $item->subtitle ?? null,
                    'image' => $item->image ?? null,
                ];
            });
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

    private function getInfoPengumuman(): Collection
    {
        $response = Http::get(env('API_INFOPENGUMUMAN'))->object() ?? [];
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

    private function getDocument(): Collection
    {
        $response = Http::get(env('API_PUBLIKASIDOKUMEN'))->object() ?? [];
        $data = collect($response)
            ->take(6)
            ->map(function ($item) {
                return (object) [
                    'title' => $item->name ?? null,
                    'description' => $item->description ?? null,
                    'file' => $item->file ?? null,
                    'date' => $this->formatDayDate($item->created_at ?? null),
                    'slug' => $item->slug ?? null,
                    'image' => $item->cover ?? null,
                ];
            });
        return $data;
    }

    private function getHeroShortcut(): Collection
    {
        $response = Http::get(env('API_HEROICON'))->object()->data ?? [];
        $data = collect($response)
            ->map(function ($item) {
                return (object) [
                    'title' => $item->title,
                    'link' => $item->link,
                    'image' => $item->image,
                ];
            });
        return $data;
    }

    private function getAppShortcut(): Collection
    {
        $response = Http::get(env('API_LINK'))->object()->data ?? [];
        $data = collect($response)
            ->take(8)
            ->map(function ($item) {
                return (object) [
                    'title' => $item->title,
                    'link' => $item->link,
                    'image' => $item->image,
                    'description' => $item->description,
                    'date' => $this->formatDayDate($item->created_at ?? null),
                ];
            });
        return $data;
    }

    private function getFoto(): Collection
    {
        $response = Http::get(env('API_FOTO'))->object() ?? [];
        $data = collect($response)
            ->take(4)
            ->map(function ($item) {
                return (object) [
                    'title' => $item->title ?? null,
                    'description' => $item->description ?? null,
                    'image' => $item->image ?? null,
                    'date' => $this->formatDayDate($item->created_at ?? null),
                ];
            });
        return $data;
    }

    private function getVideo(): object
    {
        $item = Http::get(env('API_VIDEO'))->object();
        $data = (object) [
            'title' => $item->title ?? null,
            'url' => $item->url ?? null,
            'embed' => $item->embed ?? null,
            'is_active' => $item->is_active ?? null,
            'date' => $this->formatDayDate($item->created_at ?? null),
        ];
        return $data;
    }
}
