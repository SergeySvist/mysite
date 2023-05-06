<?php

namespace App\Http\Requests;

class AddTagRequest extends ApiRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tag' => 'required|string|max:32',
        ];
    }
}
