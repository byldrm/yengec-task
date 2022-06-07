<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class IntegrationRequest extends FormRequest
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

        if(request()->routeIs('integrations.store')){
            $uniqueRule = Rule::unique('integrations')->where('user_id', Auth::id());
        }elseif (request()->routeIs('integrations.update')){
            $uniqueRule  = Rule::unique('integrations')->where('user_id', Auth::id())->ignore(app('request')->segment(3));
        }
        $rules = [
            'username'=> 'required',
            'password'=> 'required',
            'marketplace' =>  [
                'required',
                Rule::In(['trendyol', 'n11']),
                $uniqueRule

            ],

        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'marketplace.required' => 'Pazaryeri zorunlu alan.',
            'marketplace.unique' => 'Entegrasyon zaten var.',
            'marketplace.in' => 'Entegrasyon ismi n11 veya trendyol olmalı.',
            'username.required' => 'Kullanıcı adı zorunlu alan.',
            'password.required' => 'Şifre zorunlu alan.',
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
