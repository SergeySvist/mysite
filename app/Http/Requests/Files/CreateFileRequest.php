<?php

namespace App\Http\Requests\Files;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateFileRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'file' => 'required|file|max:51200', // 50MB
        ];
    }
}
