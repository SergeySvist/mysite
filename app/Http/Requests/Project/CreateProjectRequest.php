<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\ApiRequest;
use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends ApiRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:128',
            'link' => 'required|string|max:128',
            'description' => 'required|string|max:1024',
            'avatar' => 'required|file|mimes:jpeg,jpg,png|max:10240', // 10mb=10240kb
            'lang' => 'required|string|in:' . implode(',', array_map(function ($obj){ return $obj['slug']; },Language::get('slug')->toArray())),
        ];
    }
}
