<?php

namespace App\Http\Controllers\Api\User;

use App\Facade\UserFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        return UserFacade::login($request->data());
    }
}
