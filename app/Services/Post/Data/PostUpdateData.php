<?php

namespace App\Services\Post\Data;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PostUpdateData extends Data
{
    public function __construct(
        public string|Optional $description,
    ) {}
}
