<?php

namespace UniSharp\LaravelFilemanager\Controllers;

use Illuminate\Support\Facades\Storage;

class DownloadController extends LfmController
{
    public function getDownload()
    {
        $file = $this->lfm->setName(request('file'));

        $storage = Storage::disk($this->helper->config('disk'));

        if (!$storage->exists($file->path('storage'))) {
            abort(404);
        }

        return $storage->download($file->path('absolute'));
    }
}
