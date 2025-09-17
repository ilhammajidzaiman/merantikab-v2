<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Traits\ReadTimeTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    use ReadTimeTrait;

    public function index()
    {
        // $data['news'] = collect(Http::get(env('API_NEWS'))->object()->data ?? [])
        //     ->map(function ($item) {
        //         return (object) [
        //             'slug' => $item->slug ?? null,
        //             'title' => $item->title ?? null,
        //             'category' => $item->category ?? null,
        //             'categorySlug' => $item->categorySlug ?? null,
        //             'date' => $item->date ?? null,
        //             'institute' => $item->institute ?? null,
        //             'user' => $item->user ?? null,
        //             'thumbnail_alt' => $item->thumbnail_alt ?? null,
        //             'image' => $item->thumbnail ?? null,
        //         ];
        //     });
        // return view('public.news.index', $data);

        $data['news'] = collect(Http::get(env('API_NEWS'))->object()->data ?? [])
            ->map(function ($item) {
                return (object) [
                    'slug' => $item->slug ?? null,
                    'title' => $item->title ?? null,
                    'category' => $item->category ?? null,
                    'categorySlug' => $item->categorySlug ?? null,
                    'date' => $item->date ?? null,
                    'institute' => $item->institute ?? null,
                    'user' => $item->user ?? null,
                    'thumbnail_alt' => $item->thumbnail_alt ?? null,
                    'image' => $item->thumbnail ?? null,
                ];
            });

        return view('public.news.index', $data);
    }

    public function show(string $id)
    {
        $item = Http::get(env('API_NEWS') . $id)->object()->data;
        $data['record'] = (object) [
            'slug' => $item->slug ?? null,
            'title' => $item->title ?? null,
            'category' => $item->category ?? null,
            'categorySlug' => $item->categorySlug ?? null,
            'date' => $item->date ?? null,
            'institute' => $item->institute ?? null,
            'user' => $item->user ?? null,
            'thumbnail_alt' => $item->thumbnail_alt ?? null,
            'image' => $item->thumbnail ?? null,
            'content' => $item->content ?? null,
            'read_time' => $this->ReadTimeFormatted($item->content ?? null),
            'images' => $item->images ?? [],
            'tag' => $item->tag ?? [],
        ];
        $data['newsOther'] = collect(Http::get(env('API_NEWS_CATEGORY') . $item->categorySlug)->object()->data ?? [])
            ->map(function ($item) {
                return (object) [
                    'slug' => $item->slug ?? null,
                    'title' => $item->title ?? null,
                    'category' => $item->category ?? null,
                    'categorySlug' => $item->categorySlug ?? null,
                    'date' => $item->date ?? null,
                    'institute' => $item->institute ?? null,
                    'user' => $item->user ?? null,
                    'thumbnail_alt' => $item->thumbnail_alt ?? null,
                    'image' => $item->thumbnail ?? null,
                ];
            });
        return view('public.news.show', $data);
    }
}
