<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadFile
{
    public function uploadFile($request, $path)
    {
        $image = null;

        if($request->file('file')){
            $file = $request->file('file');
            $file->storeAs($path, $file->hashName());
        }

        return $file;
    }

    public function updateFile($path, $data, $name)
    {
        Storage::disk('local')->delete($path. basename($data->file));

        $data->update([
            'file' => $name,
        ]);
    }
}