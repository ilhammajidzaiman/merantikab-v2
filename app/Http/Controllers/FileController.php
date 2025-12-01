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

    public function download($file)
    {
        $url = env('APP_URL_ASSET') . $file;
        $content = @file_get_contents($url);
        if (!$content) :
            abort(404, 'File tidak ditemukan.');
        endif;
        $filename = basename($file);
        $tempPath = storage_path('app/tmp_' . $filename);
        file_put_contents($tempPath, $content);
        return response()
            ->download($tempPath, $filename, [
                'Content-Type' => 'application/octet-stream',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"'
            ])
            ->deleteFileAfterSend(true);
    }
}
