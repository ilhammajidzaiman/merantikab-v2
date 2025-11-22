<?php

namespace App\Http\Controllers\Public;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Traits\FormatDateTimeTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class DocumentController extends Controller
{
    use FormatDateTimeTrait;

    public function index()
    {
        return view('pages.document.index');
    }

    public function show(string $id)
    {
        $data['record'] = $this->fetchRecord($id);
        return view('pages.document.show', $data);
    }

    public function download(string $slug)
    {
        $record = $this->fetchRecord($slug);
        $fileUrl = env('API_ADMIN') . $record->attachment;
        $tempFile = tempnam(sys_get_temp_dir(), 'doc');
        file_put_contents($tempFile, file_get_contents($fileUrl));
        return response()->download($tempFile, $record->slug . '.' . pathinfo($fileUrl, PATHINFO_EXTENSION));
    }

    public function fetchDocument($searchDocument = null, $page = 1)
    {
        try {
            $url = ($searchDocument === null || $searchDocument === '')
                ? env('API_DOCUMENT_DATA')
                : rtrim(env('API_DOCUMENT_SEARCH'), '/') . '/' . rawurlencode($searchDocument);
            $response = Http::get($url, ['page' => $page,]);
            if ($response->failed()) :
                return ['data' => collect(), 'error' => 'Gagal ambil data berita', 'last_page' => 1];
            endif;
            $json = $response->object();
            $data = collect($json->data ?? [])->map(fn($item) => (object) [
                'title' => $item->name ?? null,
                'slug' => $item->slug ?? null,
                'content' => $item->description ?? null,
                'image' => $item->cover ?? null,
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
        $item = Http::get(env('API_DOCUMENT_DETAIL') . $id)->object();
        $data = (object) [
            'title' => $item->name ?? null,
            'slug' => $item->slug ?? null,
            'content' => $item->description ?? null,
            'image' => $item->cover ?? null,
            'attachment' => $item->file ?? null,
            'date' => $this->formatDayDate($item->created_at ?? null),
        ];
        return $data;
    }
}
