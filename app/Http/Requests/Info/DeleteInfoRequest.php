<?php

namespace App\Http\Requests\Info;

use App\Http\Requests\ApiRequest;
use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;

class DeleteInfoRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'lang' => 'required|string|in:' . implode(',', array_map(function ($obj){ return $obj['slug']; },Language::get('slug')->toArray())),
        ];
    }
}
