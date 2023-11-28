<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HeaderRequest extends FormRequest
{

    public function rules(): array
    {
        $data = [
            'image' => [Rule::requiredIf(request()->method == self::METHOD_POST),'image','mimes:jpg,jpeg,png'],
            'header_icon' => [Rule::requiredIf(request()->method == self::METHOD_POST),'image','mimes:jpg,jpeg,png'],
            'header_phone_number' => 'required|string',

        ];
        return $this->mapLangValidations($data);
    }
    private function mapLangValidations($data)
    {
        foreach (config('app.languages') as $lang){
            $data[$lang] = 'required|array';
            $data["$lang.header_name"] = 'required|string|min:2';
            $data["$lang.header_name_text"] = 'required|string|min:2';
            $data["$lang.header_title"] = 'required|string|min:2';
            $data["$lang.header_phone_title"] = 'required|string|min:2';

        }

        return $data;
    }
}
