<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AboutRequest extends FormRequest
{

    public function rules(): array
    {
        $data = [
            'url' => 'nullable|string',

        ];
        return $this->mapLangValidations($data);
    }
    private function mapLangValidations($data)
    {
        foreach (config('app.languages') as $lang){
            $data[$lang] = 'required|array';
            $data["$lang.link"] = 'required|string|min:2';
        }

        return $data;
    }
}
