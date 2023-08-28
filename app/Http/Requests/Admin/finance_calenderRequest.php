<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class finance_calenderRequest extends FormRequest
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
            'FINANCE_YR' => 'required|unique:finance_calenders,FINANCE_YR,'.$this->id,
            'FINANCE_YR_DESC' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ];
    }
    public function messages()
    {
        return [
        'FINANCE_YR.unique' => 'السنة موجودة بالفعل',
        'FINANCE_YR.required' => 'يلزم ادخال السنة',
        'FINANCE_YR_DESC.required' => 'يلزم ادخال وصف السنة',
        'start_date.required' => 'يلزم ادخال تاريخ بداية السنة',
        'end_date.required' => 'يلزم ادخال تاريخ نهاية السنة',
        ];

    }
}
