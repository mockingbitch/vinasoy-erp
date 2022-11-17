<?php

namespace App\Services;

class ImageService
{
    public function imageProcessing($file, $folder = '')
    {
        $image = uniqid('', true) . $file->getClientOriginalName();
        $file->move('upload/images/' . $folder, $image);

        return $image;
    }
}