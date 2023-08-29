<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class shitfts_typeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required',
            'total_hour' => 'required',
            'from_time' => 'required',
            'to_time' => 'required',
        ];
    }


    public function messages()
    {
        return [
          'type.required'=>'الرجاءادخال نوع الفترة',
          'total_hour.required'=>'الرجاء ادخال مجموع الساعات',
          'from_time.required'=>'الرجاء ادخال وقت بدايةالفترة',
          'to_time.required'=>'الرجاء ادخال وقت نهاية الفترة',
        ];
    }
}
