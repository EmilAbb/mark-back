<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactMessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|min:2,max:255',
            'phone' => 'required|min:2,max:255',
            'email' => 'required|min:2,max:255',
            'message' => 'required|min:2,max:1000'
        ];
    }
}
