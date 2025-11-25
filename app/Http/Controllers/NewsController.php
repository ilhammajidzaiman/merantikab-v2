<?php

namespace App\Http\Controllers;

use Exception;
use App\Traits\ReadTimeTrait;
use Illuminate\Support\Collection;
use App\Traits\FormatDateTimeTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    use ReadTimeTrait, FormatDateTimeTrait;

    public function index()
    {
        return view('pages.news.index');
    }

    public function show(string $id)
    {
        $data['record'] = $this->getRecord($id);
        $data['newsOther'] = $this->getNewsOther($data['record']->categorySlug);
        return view('pages.news.show', $data);
    }

    public function getNews($search = null, $page = 1)
    {
        try {
            $url = ($search === null || $search === '')
                ? env('API_NEWS')
                : rtrim(env('API_NEWS_SEARCH'), '/') . '/' . rawurlencode($search);
            $response = Http::get($url, ['page' => $page,]);
            if ($response->failed()) :
                return ['data' => collect(), 'error' => 'Gagal ambil data berita', 'last_page' => 1];
            endif;
            $json = $response->object();
            $data = collect($json->data ?? [])->map(fn($item) => (object) [
                'slug' => $item->slug ?? null,
                'title' => $item->title ?? null,
                'category' => $item->category ?? null,
                'categorySlug' => $item->categorySlug ?? null,
                'date' => $this->formatDayDate($item->date ?? null),
                'institute' => $item->institute ?? null,
                'user' => $item->user ?? null,
                'thumbnail_alt' => $item->thumbnail_alt ?? null,
                'image' => $item->thumbnail ?? null,
            ]);
            return [
                'error' => null,
                'data' => $data,
                'last_page' => $json->last_page ?? 1,
            ];
        } catch (Exception $e) {
            return ['data' => collect(), 'error' => $e->getMessage(), 'last_page' => 1];
        }
    }

    private function getRecord(?string $id): object
    {
        $item = Http::get(env('API_NEWS') . $id)->object()->data;
        $data = (object) [
            'slug' => $item->slug ?? null,
            'title' => $item->title ?? null,
            'category' => $item->category ?? null,
            'categorySlug' => $item->categorySlug ?? null,
            'date' => $this->formatDayDate($item->date ?? null),
            'institute' => $item->institute ?? null,
            'user' => $item->user ?? null,
            'thumbnail_alt' => $item->thumbnail_alt ?? null,
            'image' => $item->thumbnail ?? null,
            'content' => $item->content ?? null,
            'read_time' => $this->ReadTimeFormatted($item->content ?? null),
            'images' => $item->images ?? [],
            'tag' => $item->tag ?? [],
        ];
        return $data;
    }

    private function getNewsOther(?string $categorySlug): Collection
    {
        $response = Http::get(env('API_NEWS_CATEGORY') . $categorySlug)->object()->data ?? [];
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
}
