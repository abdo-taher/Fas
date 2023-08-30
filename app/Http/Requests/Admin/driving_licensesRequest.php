<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class driving_licensesRequest extends FormRequest
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
            'name' => 'required|unique:driving_licenses,name,'.$this->id,

        ];
    }


    public function messages()
    {
        return [
            'name.unique'=>'نوع رخصة القيادة موجود من قبل',
            'name.required'=>'الرجاءادخال رخصة القيادة',
        ];
    }
}
