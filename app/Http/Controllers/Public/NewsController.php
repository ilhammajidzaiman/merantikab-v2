<?php

namespace App\Http\Controllers\Public;

use Exception;
use App\Traits\ReadTimeTrait;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    use ReadTimeTrait;

    public function index()
    {
        return view('public.news.index');
    }

    public function show(string $id)
    {
        $item = Http::get(env('API_NEWS') . $id)->object()->data;
        $newsOther = Http::get(env('API_NEWS_CATEGORY') . $item->categorySlug)->object()->data ?? [];

        $data['record'] = $this->getRecord($item);
        $data['newsOther'] = $this->getRecordOther($newsOther);

        return view('public.news.show', $data);
    }

    public function getNews($search = null, $page = 1)
    {
        try {
            $url = ($search === null || $search === '')
                ? env('API_NEWS')
                : rtrim(env('API_NEWS_SEARCH'), '/') . '/' . rawurlencode($search);

            $response = Http::get($url, [
                'page' => $page,
            ]);

            if ($response->failed()) :
                return ['data' => [], 'error' => 'Gagal ambil data berita'];
            endif;

            $json = $response->json();

            return [
                'data'      => $json['data'] ?? [],
                'error'     => null,
                'last_page' => $json['last_page'] ?? 1,
            ];
        } catch (\Exception $e) {
            return ['data' => [], 'error' => $e->getMessage()];
        }
    }


    // public function getNews(?string $search = null): array
    // {
    //     try {
    //         $url = $search === null || $search === ''
    //             ? env('API_NEWS')
    //             : rtrim(env('API_NEWS_SEARCH'), '/') . '/' . rawurlencode($search);
    //         $response = Http::get($url);
    //         if ($response->failed()) :
    //             return [
    //                 'error' => true,
    //                 'data' => collect(),
    //             ];
    //         endif;
    //         return [
    //             'error' => false,
    //             'data' => collect($response->object()->data ?? [])->map(fn($item) => (object) [
    //                 'slug' => $item->slug ?? null,
    //                 'title' => $item->title ?? null,
    //                 'category' => $item->category ?? null,
    //                 'categorySlug' => $item->categorySlug ?? null,
    //                 'date' => $item->date ?? null,
    //                 'institute' => $item->institute ?? null,
    //                 'user' => $item->user ?? null,
    //                 'thumbnail_alt' => $item->thumbnail_alt ?? null,
    //                 'image' => $item->thumbnail ?? null,
    //             ]),
    //         ];
    //     } catch (Exception $e) {
    //         Log::error('API_NEWS error: ' . $e->getMessage());
    //         return [
    //             'error' => true,
    //             'data' => collect(),
    //         ];
    //     }
    // }

    private function getRecord(object $item): object
    {
        return (object) [
            'slug'          => $item->slug ?? null,
            'title'         => $item->title ?? null,
            'category'      => $item->category ?? null,
            'categorySlug'  => $item->categorySlug ?? null,
            'date'          => $item->date ?? null,
            'institute'     => $item->institute ?? null,
            'user'          => $item->user ?? null,
            'thumbnail_alt' => $item->thumbnail_alt ?? null,
            'image'         => $item->thumbnail ?? null,
            'content'       => $item->content ?? null,
            'read_time'     => $this->ReadTimeFormatted($item->content ?? null),
            'images'        => $item->images ?? [],
            'tag'           => $item->tag ?? [],
        ];
    }

    private function getRecordOther(array $items): \Illuminate\Support\Collection
    {
        return collect($items)->map(function ($item) {
            return (object) [
                'slug'          => $item->slug ?? null,
                'title'         => $item->title ?? null,
                'category'      => $item->category ?? null,
                'categorySlug'  => $item->categorySlug ?? null,
                'date'          => $item->date ?? null,
                'institute'     => $item->institute ?? null,
                'user'          => $item->user ?? null,
                'thumbnail_alt' => $item->thumbnail_alt ?? null,
                'image'         => $item->thumbnail ?? null,
            ];
        });
    }
}
