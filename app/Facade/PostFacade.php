<?php

namespace App\Facade;

use App\Services\Post\PostService;
use Illuminate\Support\Facades\Facade;

class PostFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return PostService::class;
    }
}
