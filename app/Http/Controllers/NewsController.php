<?php

namespace App\Http\Controllers;

use App\Traits\ReadTimeTrait;
use App\Traits\FormatDateTimeTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    use ReadTimeTrait, FormatDateTimeTrait;

    public function index()
    {
        return view('pages.news.index');
    }

    public function show(string $id)
    {

        $response = Http::get(env('API_NEWS') . $id)->json();
        $responseOther = Http::get(env('API_NEWS'))->json();
        $data['record'] = collect($response['data']);
        $data['newsOther'] = collect($responseOther['data']);
        return view('pages.news.show', $data);
    }
}
