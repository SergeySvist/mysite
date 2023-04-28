<?php

namespace App\Http\Requests\Info;

use App\Http\Requests\ApiRequest;
use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;

class PatchInfoRequest extends ApiRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'sometimes|string|max:32',
            'surname' => 'sometimes|string|max:32',
            'description' => 'sometimes|string|max:1024',
            'cv' => 'sometimes|mimes:pdf|max:51200', // 50mb=51200kb
            'avatar' => 'sometimes|file|mimes:jpeg,jpg,png|max:10240', // 10mb=10240kb
            'language' => 'sometimes|string|max:32',
            'lang' => 'required|string|in:' . implode(',', array_map(function ($obj){ return $obj['slug']; },Language::get('slug')->toArray())),

        ];
    }
}
