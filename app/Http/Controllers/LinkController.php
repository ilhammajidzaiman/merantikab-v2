<?php

namespace App\Http\Controllers;

use Exception;
use App\Traits\FormatDateTimeTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class LinkController extends Controller
{
    use FormatDateTimeTrait;

    public function index()
    {
        return view('pages.link.index');
    }

    public function show(string $id)
    {
        $data['record'] = $this->fetchRecord($id);
        return view('pages.link.show', $data);
    }

    public function fetchData($search = null, $page = 1)
    {
        try {
            $url = ($search === null || $search === '')
                ? env('API_LINK_DATA')
                : rtrim(env('API_LINK_SEARCH'), '/') . '/' . rawurlencode($search);
            $response = Http::get($url, ['page' => $page,]);
            if ($response->failed()) :
                return ['data' => collect(), 'error' => 'Gagal ambil data berita', 'last_page' => 1];
            endif;
            $json = $response->object();
            $data = collect($json->data ?? [])->map(fn($item) => (object) [
                'title' => $item->title,
                'link' => $item->link,
                'image' => $item->image,
                'description' => $item->description,
                'date' => $this->formatDayDate($item->created_at ?? null),
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

    private function fetchRecord(?string $id): object
    {
        $item = Http::get(env('API_LINK_DETAIL') . $id)->object();
        $data = (object) [
            'title' => $item->title,
            'link' => $item->link,
            'image' => $item->image,
            'description' => $item->description,
            'date' => $this->formatDayDate($item->created_at ?? null),
        ];
        return $data;
    }
}
