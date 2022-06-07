<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'İsim alanı zorunlu.',
            'name.min' => 'İsim en az 4 karakter olmalı',
            'email.required' => 'Email alanı zorunlu.',
            'email.email' => 'Email alanı email formatında olmalı.',
            'email.unique' => 'Email adresi kullanılıyor.',
            'password.required' => 'Şifre alanı zorunlu.',
            'password.min' => 'Şifre en az 8 karakter olmalı',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'errors'      => $validator->errors()
        ]));
    }
}
