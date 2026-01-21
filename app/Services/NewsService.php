<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use App\Traits\FormatDateTimeTrait;

class NewsService
{
    use FormatDateTimeTrait;

    public function getNews($search = null, $page = 1)
    {
        try {
            $url = ($search === null || $search === '')
                ? env('API_NEWS')
                : rtrim(env('API_NEWS_SEARCH'), '/') . '/' . rawurlencode($search);
            $response = Http::get($url, ['page' => $page]);
            if ($response->failed()) :
                return collect();
            endif;
            return collect($response->object()->data ?? [])->map(fn($item) => (object) [
                'slug' => $item->slug ?? null,
                'title' => $item->title ?? null,
                'category' => $item->category ?? null,
                'categorySlug' => $item->categorySlug ?? null,
                'date' => $this->formatDayDate($item->date ?? null),
                'institute' => $item->institute ?? null,
                'user' => $item->user ?? null,
                'thumbnail_alt' => $item->thumbnail_alt ?? null,
                'image' => env('API_SIPB') . $item->thumbnail ?? null,
            ]);
        } catch (Exception) {
            return collect();
        }
    }


    public function getNewsCarousel()
    {
        try {
            $response = Http::get(env('API_NEWS'))->object()->data ?? [];
            return collect($response)
                ->take(5)
                ->map(fn($item) => (object) [
                    'slug' => $item->slug ?? null,
                    'title' => $item->title ?? null,
                    'image' => env('API_SIPB') . $item->thumbnail ?? null,
                    'thumbnail_alt' => $item->thumbnail_alt ?? null,
                    'category' => $item->category ?? null,
                    'categorySlug' => $item->categorySlug ?? null,
                    'date' => $this->formatDayDate($item->date ?? null),
                    'institute' => $item->institute ?? null,
                    'user' => $item->user ?? null,
                ]);
        } catch (Exception) {
            return collect();
        }
    }
}
