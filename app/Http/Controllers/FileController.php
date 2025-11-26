<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function index()
    {
        return view('pages.file.index');
    }

    public function show(string $id)
    {
        $data['record'] = File::active()
            ->where('slug', $id)
            ->first();
        return view('pages.file.show', $data);
    }

    public function download(string $slug)
    {
        $record = $this->fetchRecord($slug);
        $fileUrl = env('API_ADMIN') . $record->attachment;
        $tempFile = tempnam(sys_get_temp_dir(), 'doc');
        file_put_contents($tempFile, file_get_contents($fileUrl));
        return response()->download($tempFile, $record->slug . '.' . pathinfo($fileUrl, PATHINFO_EXTENSION));
    }
}
