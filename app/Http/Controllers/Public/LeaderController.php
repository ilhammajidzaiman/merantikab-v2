<?php

namespace App\Http\Controllers\Public;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class LeaderController extends Controller
{
    public function index()
    {
        $data['data'] = $this->fetchData();
        return view('pages.leader.index', $data);
    }
    public function fetchData($search = null, $page = 1)
    {
        try {
            $url = ($search === null || $search === '')
                ? env('API_KEPEMIMPINAN_DATA')
                : rtrim(env('API_KEPEMIMPINAN_SEARCH'), '/') . '/' . rawurlencode($search);

            $response = Http::get($url, ['page' => $page]);

            if ($response->failed()) {
                return collect(); // kosongkan kalau gagal
            }

            $json = $response->object();

            // Ambil hanya bagian data, cast ke object biar bisa pakai $item->name_1
            return collect($json->data ?? [])->map(fn($item) => (object) [
                'periode'        => $item->periode        ?? null,
                'masa_jabatan'   => $item->masa_jabatan   ?? null,
                'image_1'        => $item->image_1        ?? null,
                'name_1'         => $item->name_1         ?? null,
                'jabatan_1'      => $item->jabatan_1      ?? null,
                'biografi_1'     => $item->biografi_1     ?? null,
                'image_2'        => $item->image_2        ?? null,
                'name_2'         => $item->name_2         ?? null,
                'jabatan_2'      => $item->jabatan_2      ?? null,
                'biografi_2'     => $item->biografi_2     ?? null,
                'status_jabatan' => $item->status_jabatan ?? null,
            ]);
        } catch (\Exception $e) {
            return collect(); // kosongkan kalau error
        }
    }


    public function fetchDatas($search = null, $page = 1)
    {
        try {
            $url = ($search === null || $search === '')
                ? env('API_KEPEMIMPINAN_DATA')
                : rtrim(env('API_KEPEMIMPINAN_SEARCH'), '/') . '/' . rawurlencode($search);
            $response = Http::get($url, ['page' => $page,]);
            if ($response->failed()) :
                return ['data' => collect(), 'error' => 'Gagal ambil data berita', 'last_page' => 1];
            endif;
            $json = $response->object();
            $data = collect($json->data ?? [])->map(fn($item) => (object) [
                'periode ' => $item->periode ?? null,
                'masa_jabatan ' => $item->masa_jabatan ?? null,
                'image_1 ' => $item->image_1 ?? null,
                'name_1 ' => $item->name_1 ?? null,
                'jabatan_1 ' => $item->jabatan_1 ?? null,
                'biografi_1 ' => $item->biografi_1 ?? null,
                'image_2 ' => $item->image_2 ?? null,
                'name_2 ' => $item->name_2 ?? null,
                'jabatan_2 ' => $item->jabatan_2 ?? null,
                'biografi_2 ' => $item->biografi_2 ?? null,
                'status_jabatan ' => $item->status_jabatan ?? null,
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
}
