<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

use Illuminate\Http\Exceptions\HttpResponseException;

class TrainerRequest extends FormRequest
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
          // 'name'=> 'required', 
          // 'email'=>'email|required',
          //'image' =>'image|required', 
           //'info' =>'required',
            //'phone' =>'required',
        ];
    }

      public function messages(){
        return [
          "name.required"  => "من فضلك ضع الاسم",
           "email.required"  => "حقل الاميل مطلوب",
           "email.unique"  => "هذا البريد مستخدم من قبل ",
           "email.email"  => "هذا الحقل مخصص فقط للبريد الالكتروني  ",
           'image.image' => "هذا الحقل مخصص للصورة فقط ",
           'image.required' => "من فضلك ضع صورة للمدرب",
           'info.required' => 'لم يتم وضع نبذه مختصرة عن المدرب',
           'phone.required' => 'من فضلك ضع رقم الهاتف'

        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors()->first()));
    }
}
