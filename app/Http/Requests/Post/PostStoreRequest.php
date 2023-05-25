<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PostStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        //dd($this->all);
        $url = $this->server('HTTP_REFERER');
        $userId = explode('/', $url)[5];
        //dd($userId);
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'title' => 'required|string|unique:posts',
            'content' => 'required|string'
        ];
    }
}
