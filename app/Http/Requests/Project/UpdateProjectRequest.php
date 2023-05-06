<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends ApiRequest
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
            'link' => 'sometimes|string|max:128',
            'description' => 'sometimes|string|max:1024',
            'avatar' => 'sometimes|file|mimes:jpeg,jpg,png|max:10240', // 10mb=10240kb
        ];
    }
}
