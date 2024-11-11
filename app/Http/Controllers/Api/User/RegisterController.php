<?php

namespace App\Http\Controllers\Api\User;

use App\Facade\UserFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;


class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request)
    {

        return UserFacade::store($request->data());
    }
}
