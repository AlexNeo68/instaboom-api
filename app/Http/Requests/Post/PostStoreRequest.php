<?php

namespace App\Http\Requests\Post;

use App\Services\Post\Data\PostStoreData;
use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'photo' => 'required|image',
            'description' => 'nullable|max:255',
        ];
    }

    public function data(): PostStoreData
    {
        return PostStoreData::from([
            'photo' => $this->file('photo'),
            'description' => $this->input('description'),
        ]);
    }
}
