<?php

namespace App\Http\Controllers\Public;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Traits\FormatDateTimeTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class InformationController extends Controller
{
    use FormatDateTimeTrait;

    public function index()
    {
        return view('public.information.index');
    }

    public function show(string $id)
    {
        $data['record'] = $this->getRecord($id);
        $data['other'] = $this->getOther($data['record']->slug);
        return view('public.information.show', $data);
    }

    public function getInformation($searchInformation = null, $page = 1)
    {
        try {
            $url = ($searchInformation === null || $searchInformation === '')
                ? env('API_INFOPENGUMUMAN_DATA')
                : rtrim(env('API_INFOPENGUMUMAN_SEARCH'), '/') . '/' . rawurlencode($searchInformation);
            $response = Http::get($url, ['page' => $page,]);
            if ($response->failed()) :
                return ['data' => collect(), 'error' => 'Gagal ambil data berita', 'last_page' => 1];
            endif;
            $json = $response->object();
            $data = collect($json->data ?? [])->map(fn($item) => (object) [
                'title' => $item->title ?? null,
                'slug' => $item->slug ?? null,
                'content' => $item->content ?? null,
                'image' => $item->image ?? null,
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

    private function getRecord(?string $id): object
    {
        $item = Http::get(env('API_INFOPENGUMUMAN_DETAIL') . $id)->object();

        // dd($item);
        $data = (object) [
            'title' => $item->title ?? null,
            'slug' => $item->slug ?? null,
            'content' => $item->content ?? null,
            'image' => $item->image ?? null,
            'date' => $this->formatDayDate($item->created_at ?? null),
        ];
        return $data;
    }

    private function getOther(?string $slug): Collection
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
