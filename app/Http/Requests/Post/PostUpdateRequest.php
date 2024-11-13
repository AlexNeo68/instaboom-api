<?php

namespace App\Http\Requests\Post;

use App\Services\Post\Data\PostUpdateData;
use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'description' => ['nullable', 'max:255'],
        ];
    }

    public function data(): PostUpdateData
    {
        return PostUpdateData::from($this->validated());
    }
}
