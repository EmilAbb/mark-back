<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HomeSliderRequest extends FormRequest
{

    public function rules(): array
    {
        $data = [
            'image' => [Rule::requiredIf(request()->method == self::METHOD_POST),'image','mimes:jpg,jpeg,png'],
            'background_img_one' => [Rule::requiredIf(request()->method == self::METHOD_POST),'image','mimes:jpg,jpeg,png'],
            'background_img_two' => [Rule::requiredIf(request()->method == self::METHOD_POST),'image','mimes:jpg,jpeg,png'],
            'icon' => 'nullable|string',
            'onclick' => 'nullable|string'


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
