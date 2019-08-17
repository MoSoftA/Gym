<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

use Illuminate\Http\Exceptions\HttpResponseException;

class ExerciseRequest extends FormRequest
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
           "day"  => "required|unique:exercises",
           "lists"  => "required",
           'user_id' => "required"
        ];
    }
    public function messages(){
        return [
           "day.required"  => "حقل اليوم مطلوب",
           "lists.required"  => "من فضلك ضع التمارين ",
           'user_id.required' => "يجب تحديد المستخدم"
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors()->first()));
    }
}
