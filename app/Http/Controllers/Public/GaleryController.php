<?php

namespace App\Http\Controllers\Public;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Traits\FormatDateTimeTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class GaleryController extends Controller
{
    use FormatDateTimeTrait;

    public function index()
    {
        return view('pages.galery.index');
    }

    public function show(string $id)
    {
        $data['record'] = $this->fetchRecord($id);
        $data['other'] = $this->fetchOther($data['record']->slug);
        return view('pages.galery.show', $data);
    }

    // public function fetchData($search = null, $page = 1)
    // {
    //     try {
    //         $url = ($search === null || $search === '')
    //             ? env('API_FOTO_DATA')
    //             : rtrim(env('API_FOTO_SEARCH'), '/') . '/' . rawurlencode($search);
    //         $response = Http::get($url, ['page' => $page,]);
    //         if ($response->failed()) :
    //             return ['data' => collect(), 'error' => 'Gagal ambil data', 'last_page' => 1];
    //         endif;
    //         $json = $response->object();
    //         $data = collect($json->data ?? [])->map(fn($item) => (object) [
    //             'title' => $item->title ?? null,
    //             'slug' => $item->slug ?? null,
    //             'content' => $item->content ?? null,
    //             'image' => $item->image ?? null,
    //             'date' => $this->formatDayDate($item->created_at ?? null),
    //         ]);
    //         return [
    //             'error' => null,
    //             'data' => $data,
    //             'last_page' => $json->last_page ?? 1,
    //         ];
    //     } catch (Exception $e) {
    //         return ['data' => collect(), 'error' => $e->getMessage(), 'last_page' => 1];
    //     }
    // }

    public function fetchData($type = 1, $search = null, $page = 1)
    {
        try {
            if ($type == 1) :
                $url = ($search === null || $search === '')
                    ? env('API_FOTO_DATA')
                    : rtrim(env('API_FOTO_SEARCH'), '/') . '/' . rawurlencode($search);
            else :
                $url = ($search === null || $search === '')
                    ? env('API_VIDEO_DATA')
                    : rtrim(env('API_VIDEO_SEARCH'), '/') . '/' . rawurlencode($search);
            endif;

            $response = Http::get($url, ['page' => $page]);

            if ($response->failed()) {
                return ['data' => collect(), 'error' => 'Gagal ambil data', 'last_page' => 1];
            }

            $json = $response->object();
            if ($type == 1) :
                $data = collect($json->data ?? [])->map(fn($item) => (object) [
                    'title' => $item->title ?? null,
                    'slug' => $item->slug ?? null,
                    'content' => $item->content ?? null,
                    'image' => $item->image ?? null,
                    'date' => $this->formatDayDate($item->created_at ?? null),
                ]);
            else :
                $data = collect($json->data ?? [])->map(fn($item) => (object) [
                    'title' => $item->title ?? null,
                    'url' => $item->url ?? null,
                    'embed' => $item->embed ?? null,
                    'date' => $this->formatDayDate($item->created_at ?? null),
                ]);
            endif;
            return [
                'error' => null,
                'data' => $data,
                'last_page' => $json->last_page ?? 1,
            ];
        } catch (Exception $e) {
            return ['data' => collect(), 'error' => $e->getMessage(), 'last_page' => 1];
        }
    }

    private function fetchRecord(?string $id): object
    {
        $item = Http::get(env('API_FOTO_SHOW') . $id)->object();
        $data = (object) [
            'title' => $item->title ?? null,
            'slug' => $item->slug ?? null,
            'content' => $item->content ?? null,
            'image' => $item->image ?? null,
            'date' => $this->formatDayDate($item->created_at ?? null),
        ];
        return $data;
    }

    private function fetchOther(?string $slug): Collection
    {
        $response = Http::get(env('API_INFOPENGUMUMAN_OTHER') . $slug)->object() ?? [];
        $data = collect($response)
            ->map(function ($item) {
                return (object) [
                    'title' => $item->title ?? null,
                    'slug' => $item->slug ?? null,
                    'content' => $item->content ?? null,
                    'image' => $item->image ?? null,
                    'date' => $this->formatDayDate($item->created_at ?? null),
                ];
            });
        return $data;
    }
}
