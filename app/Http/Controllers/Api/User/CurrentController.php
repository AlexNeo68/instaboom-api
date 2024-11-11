<?php

namespace App\Http\Controllers\Api\User;

use App\Facade\UserFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateAvatarRequest;
use App\Http\Resources\User\CurrentUserResource;
use Illuminate\Http\Request;

class CurrentController extends Controller
{

    public function me(): CurrentUserResource
    {
        return new CurrentUserResource(auth()->user());
    }

    public function avatar(UpdateAvatarRequest $request): CurrentUserResource
    {
        return new CurrentUserResource(UserFacade::updateAvatar($request->data()));
    }
}
