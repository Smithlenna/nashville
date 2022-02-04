<?php

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

function uploadImage($file, $dir)
{
    return Storage::put($dir, $file);
}

function imageUrl($dir, $image)
{
    if ($image != null && file_exists('storage/' . $dir . '/' . $image)) {
        $url = asset('storage/' . $dir . '/' . $image);
    } else {
        $url = null;
    }
    return $url;
}
