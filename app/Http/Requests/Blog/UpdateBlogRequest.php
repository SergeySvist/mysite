<?php

namespace App\Http\Requests\Blog;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'sometimes|string|max:128',
            'main_text' => 'sometimes|string',
            'avatar' => 'sometimes|file|mimes:jpeg,jpg,png|max:10240', // 10mb=10240kb
        ];
    }
}
