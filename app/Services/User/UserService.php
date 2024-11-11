<?php

namespace App\Services\User;

use App\Exceptions\User\UserInvalidCredentialException;
use App\Http\Resources\User\CurrentUserResource;
use App\Models\User;
use App\Services\User\Data\LoginData;
use App\Services\User\Data\RegisterUserData;
use Illuminate\Http\UploadedFile;

class UserService
{

    public function store(RegisterUserData $data): CurrentUserResource
    {
        return new CurrentUserResource(User::create($data->toArray()));
    }

    /**
     * @throws UserInvalidCredentialException
     */
    public function login(LoginData $data): array
    {
        if(!auth()->guard('web')->attempt($data->toArray())){
            throw new UserInvalidCredentialException(__('Invalid User credentials'));
        }

        $token = auth()->user()->createToken('api_login');

        return ['token'=>$token->plainTextToken];
    }

    public function updateAvatar(UploadedFile $image): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        auth()->user()->update([
            'avatar' => $this->uploadAvatar($image)
        ]);
        return auth()->user();
    }

    private function uploadAvatar(UploadedFile $image):string
    {
        $path = $image->storePublicly('avatars');

        return config('app.url')."/storage/$path";
    }

}
