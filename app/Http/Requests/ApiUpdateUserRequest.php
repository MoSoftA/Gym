<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class ApiUpdateUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
           
            "email"     => "email|required",
            "password"  => "required|min:6",
            "name"      => "required|min:2",
        ];
    }

    public function messages(){
        return [
            "email.email" => "يرجي ادخال بريد الكتروني صالح",
            "email.required" => "البريد الالكتروني مطلوب",
            "email.unique"  => "البريد الالكتروني مستخدم من قبل",
            "name.required" => "الاسم مطلوب",
            "name.min"  => "الاسم قصير جدا",
            "password.required"  => "كلمة السر مطلوبة",
            "password.min"  => "يجب ان لا تقل كلمة السر عن 6 احرف"
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors()->first()));
    }
}
