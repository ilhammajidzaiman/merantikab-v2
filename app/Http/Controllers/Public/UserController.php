<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    // public function index()
    // {
    //     // Ambil data dari API
    //     $users = collect(Http::get(env('API_NEWS'))->object()->data ?? [])
    //         ->map(function ($item) {
    //             return (object) [
    //                 'name' => $item->title ?? null,
    //             ];
    //         });

    //     // Kirim ke view
    //     return view('user', compact('users'));
    // }


    public function index()
    {
        $data['users'] = collect(Http::get(env('API_NEWS'))->object()->data ?? [])
            ->map(function ($item) {
                return (object) [
                    'slug' => $item->slug ?? null,
                    'name' => $item->title ?? null,
                    'category' => $item->category ?? null,
                    'categorySlug' => $item->categorySlug ?? null,
                    'date' => $item->date ?? null,
                    'institute' => $item->institute ?? null,
                    'user' => $item->user ?? null,
                    'thumbnail_alt' => $item->thumbnail_alt ?? null,
                    'image' => $item->thumbnail ?? null,
                ];
            });

        return view('user', $data);
    }
}
