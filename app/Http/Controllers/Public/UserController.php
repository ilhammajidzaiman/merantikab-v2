<?php

namespace App\Http\Controllers\Public;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        return view('user');
    }

    // public function getUsers(?string $search = null): Collection
    // {
    //     $url = $search === null || $search === ''
    //         ? env('API_NEWS')
    //         : rtrim(env('API_NEWS_SEARCH'), '/') . '/' . rawurlencode($search);
    //     $response = Http::get($url)->object();
    //     return collect($response->data ?? [])
    //         ->map(function ($item) {
    //             return (object) [
    //                 'name' => $item->title ?? null,
    //             ];
    //         });
    // }

    public function getUsers(?string $search = null): array
    {
        try {
            $url = $search === null || $search === ''
                ? env('API_NEWS')
                : rtrim(env('API_NEWS_SEARCH'), '/') . '/' . rawurlencode($search);
            $response = Http::get($url);
            if ($response->failed()) :
                return [
                    'error' => true,
                    'data' => collect(),
                ];
            endif;
            return [
                'error' => false,
                'data' => collect($response->object()->data ?? [])->map(fn($item) => (object) [
                    'name' => $item->title ?? null,
                ]),
            ];
        } catch (Exception $e) {
            Log::error('API_NEWS error: ' . $e->getMessage());
            return [
                'error' => true,
                'data' => collect(),
            ];
        }
    }
}
