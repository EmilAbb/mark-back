<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AboutSliderRequest extends FormRequest
{

    public function rules(): array
    {
        $data = [
            'image' => [Rule::requiredIf(request()->method == self::METHOD_POST),'image','mimes:jpg,jpeg,png'],
        ];
        return $data;
    }

}
