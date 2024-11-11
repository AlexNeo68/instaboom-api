<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrentUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'login' => $this->login,
            'subscribers' => 0,
            'publications' => 0,
            'avatar' => $this->avatar,
            'about' => $this->about,
            'isVerified' => $this->is_verified,
            'registeredAt' => $this->created_at->format('d/m/Y H:i'),
        ];
    }
}
