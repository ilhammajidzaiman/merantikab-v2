<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $data['carouselFull'] = collect(Http::get(env('API_CAROUSEL'))->object() ?? [])
            ->map(function ($item) {
                return (object) [
                    'title' => $item->title ?? null,
                    'description' => $item->subtitle ?? null,
                    'image' => $item->image ?? null,
                ];
            });

        $data['news'] = collect(Http::get(env('API_NEWS'))->object()->data ?? [])
            ->map(function ($item) {
                return (object) [
                    'slug' => 'https://sipb.merantikab.go.id/' . $item->slug ?? null,
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

        $data['carouselNews'] = collect(Http::get(env('API_NEWS'))->object()->data ?? [])
            ->take(5)
            ->map(function ($item) {
                return (object) [
                    'slug' => 'https://sipb.merantikab.go.id/' . $item->slug ?? null,
                    'title' => $item->title ?? null,
                    'image' => $item->thumbnail ?? null,
                    'thumbnail_alt' => $item->thumbnail_alt ?? null,
                    'category' => $item->category ?? null,
                    'categorySlug' => $item->categorySlug ?? null,
                    'date' => $item->date ?? null,
                    'institute' => $item->institute ?? null,
                    'user' => $item->user ?? null,
                ];
            });

        $data['infoPengumumans'] = collect(Http::get(env('API_INFOPENGUMUMAN'))->object() ?? [])
            ->map(function ($item) {
                return (object) [
                    'title' => $item->title ?? null,
                    'slug' => $item->slug ?? null,
                    'content' => $item->content ?? null,
                    'date' => $item->created_at ?? null,
                    'image' => $item->image ?? null,
                ];
            });

        $data['documents'] = collect(Http::get(env('API_DOCUMENT'))->object()->data ?? [])
            ->take(6)
            ->map(function ($item) {
                return (object) [
                    'title' => $item->name ?? null,
                    'description' => $item->description ?? null,
                    'file' => $item->file ?? null,
                    'date' => $item->created_at ?? null,
                    'slug' => $item->slug ?? null,
                    'image' => $item->cover ?? null,
                ];
            });

        $data['appShortcut'] = collect(Http::get(env('API_LINK'))->object()->data ?? [])
            ->take(8)
            ->map(function ($item) {
                return (object) [
                    'title' => $item->title,
                    'link' => $item->link,
                    'image' => $item->image,
                    'description' => $item->description,
                    'date' => $item->created_at,
                ];
            });

        $data['heroShortcut'] = [
            (object) [
                'image' => asset('image/apps/dashboard.png'),
                'title' => 'Smart City',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus repudiandae quo nemo.',
                'link' => 'https://smartcity.merantikab.go.id/',
            ],
            (object) [
                'image' => asset('image/apps/compliant.png'),
                'title' => 'JDIH',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias aspernatur doloremque facilis magni, velit porro.',
                'link' => 'https://jdih.merantikab.go.id/',
            ],
            (object) [
                'image' => asset('image/apps/book.png'),
                'title' => 'PPID',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium harum expedita exercitationem facere.',
                'link' => 'https://smartcity.merantikab.go.id/',
            ],
            (object) [
                'image' => asset('image/apps/data.png'),
                'title' => 'Statistik',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem ex recusandae voluptates excepturi natus ratione. Aliquam, inventore?',
                'link' => 'https://statistik.merantikab.go.id/',
            ],
            (object) [
                'image' => asset('image/apps/lapor.png'),
                'title' => 'Lapor',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, harum placeat.',
                'link' => 'https://www.lapor.go.id/',
            ],
        ];

        return view('public.home', $data);
    }
}
