<?php

namespace App\Facade;

use App\Services\User\UserService;
use Illuminate\Support\Facades\Facade;

class UserFacade extends Facade
{

    protected static function getFacadeAccessor(): string
    {
        return UserService::class;
    }
}
