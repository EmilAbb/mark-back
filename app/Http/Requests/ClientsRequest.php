<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientsRequest extends FormRequest
{

    public function rules(): array
    {
        $data = [
            'image' => [Rule::requiredIf(request()->method == self::METHOD_POST),'image','mimes:jpg,jpeg,png'],

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
