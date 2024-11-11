<?php

use Illuminate\Http\UploadedFile;

function responseFailed(string $message = null, int $code = 400): \Illuminate\Http\JsonResponse
{
    return response()->json([
        'message' => __($message) ?? __('Bad request')
    ], $code);
}

function uploadImage(UploadedFile $image):string
{
    $path = $image->storePublicly('avatars');

    return config('app.url')."/storage/$path";
}
