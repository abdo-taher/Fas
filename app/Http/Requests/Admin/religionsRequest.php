<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class religionsRequest extends FormRequest
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
            'name' => 'required|unique:religions,name,'.$this->id,

        ];
    }


    public function messages()
    {
        return [
            'name.unique'=>'الديانة موجود من قبل',
            'name.required'=>'الرجاءادخال الديانة',
        ];
    }
}
