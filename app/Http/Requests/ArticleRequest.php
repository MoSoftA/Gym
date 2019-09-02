<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

use Illuminate\Http\Exceptions\HttpResponseException;

class ArticleRequest extends FormRequest
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
            'title' => "required",
            'info' => 'required',
            // 'img' => 'image',    
            'body' => 'required'
        ];
    }

       public function messages(){
        return [
            "title.required" => "عنوان المقال مطلوب"  ,
            "img.image" => "مخصص للصور فقط",
            "info.required"  => "من فضلك ضع نبذة مختصرة عن المقال",
            "body.required"  => "برجاء وضع محتوي المقال "
        ];
    }


    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors()->first()));
    }
}
