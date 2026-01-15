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

            $response = Http::timeout(5)->get($url, [
                'page' => $page
            ]);

            // Jika request gagal (4xx / 5xx)
            if ($response->failed()) {
                return (object)[
                    'status' => false,
                    'message' => 'Gagal mengambil data dari server berita',
                    'data' => collect()
                ];
            }

            $data = collect($response->object()->data ?? []);

            // Jika data kosong
            if ($data->isEmpty()) {
                return (object)[
                    'status' => true,
                    'message' => 'Data berita tidak ditemukan',
                    'data' => collect()
                ];
            }

            return (object)[
                'status' => true,
                'message' => 'Data berhasil diambil',
                'data' => $data->map(fn($item) => (object) [
                    'slug' => $item->slug ?? null,
                    'title' => $item->title ?? null,
                    'category' => $item->category ?? null,
                    'categorySlug' => $item->categorySlug ?? null,
                    'date' => $this->formatDayDate($item->date ?? null),
                    'institute' => $item->institute ?? null,
                    'user' => $item->user ?? null,
                    'thumbnail_alt' => $item->thumbnail_alt ?? null,
                    'image' => isset($item->thumbnail)
                        ? env('API_SIPB') . $item->thumbnail
                        : null,
                ])
            ];
        } catch (\Throwable $e) {
            return (object)[
                'status' => false,
                'message' => 'Terjadi kesalahan sistem',
                'data' => collect()
            ];
        }
    }



    public function getNewsCarousel()
    {
        try {
            $response = Http::timeout(5)->get(env('API_NEWS'));

            // Jika request gagal
            if ($response->failed()) {
                return (object)[
                    'status' => false,
                    'message' => 'Gagal mengambil data carousel berita',
                    'data' => collect()
                ];
            }

            $data = collect($response->object()->data ?? []);

            // Jika data kosong
            if ($data->isEmpty()) {
                return (object)[
                    'status' => true,
                    'message' => 'Data carousel tidak tersedia',
                    'data' => collect()
                ];
            }

            return (object)[
                'status' => true,
                'message' => 'Data carousel berhasil diambil',
                'data' => $data
                    ->take(5)
                    ->map(fn($item) => (object) [
                        'slug' => $item->slug ?? null,
                        'title' => $item->title ?? null,
                        'image' => isset($item->thumbnail)
                            ? env('API_SIPB') . $item->thumbnail
                            : null,
                        'thumbnail_alt' => $item->thumbnail_alt ?? null,
                        'category' => $item->category ?? null,
                        'categorySlug' => $item->categorySlug ?? null,
                        'date' => $this->formatDayDate($item->date ?? null),
                        'institute' => $item->institute ?? null,
                        'user' => $item->user ?? null,
                    ])
            ];
        } catch (\Throwable $e) {
            return (object)[
                'status' => false,
                'message' => 'Terjadi kesalahan sistem pada carousel',
                'data' => collect()
            ];
        }
    }
}
