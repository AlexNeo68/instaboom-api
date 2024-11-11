<?php

namespace App\Http\Requests\User;

use App\Services\User\Data\LoginData;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'nullable|email|max:255',
            'login' => 'nullable|string|max:255',
            'password' => 'required',
        ];
    }


    public function data(): LoginData
    {
        return LoginData::from($this->validated());
    }
}
