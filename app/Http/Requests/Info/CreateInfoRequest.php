<?php

namespace App\Http\Requests\Info;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateInfoRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:32',
            'surname' => 'required|string|max:32',
            'description' => 'required|string|max:1024',
            'cv' => 'required|mimes:pdf|max:51200', // 50mb=51200kb
            'avatar' => 'required|file|mimes:jpeg,jpg,png|max:10240', // 10mb=10240kb
            'language' => 'required|string|max:32',
        ];
    }
}
