<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PracticeRequest extends FormRequest
{

    public function rules(): array
    {
        $data = [
        ];
        return $this->mapLangValidations($data);
    }
    private function mapLangValidations($data)
    {
        foreach (config('app.languages') as $lang){
            $data[$lang] = 'required|array';
            $data["$lang.title"] = 'required|string|min:2';
            $data["$lang.text"] = 'required|string|min:2';
        }

        return $data;
    }
}
