<?php

namespace App\Http\Requests\Links;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreatelinkRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'link' => 'required|string|max:256',
            'title' => 'required|string|max:32',
        ];
    }
}
