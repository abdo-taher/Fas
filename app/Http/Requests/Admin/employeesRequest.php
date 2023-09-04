<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class employeesRequest extends FormRequest
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
            'emp_name' => 'required',
            'religion_id'=> 'required|numeric|min:1',
            'blood_type_id'=> 'required|numeric|min:1',
            'military_services_id'=> 'required|numeric|min:1',
            'branch_id'=> 'required|numeric|min:1',
            'emp_nationality_id' => 'required|numeric|min:1',
            'country_id' => 'required|numeric|min:1',
        ];
    }


    public function messages()
    {
        return [
            //            select rouls

            'emp_nationality_id.numeric' => 'الرجاء اختيار الجنسية',
            'military_service_id.numeric' => 'الرجاء اختيار النوع',
            'country_id.numeric' => 'الرجاء اختيار الدولة',
            'emp_name.unique'=>'الموظف موجود من قبل',
            'emp_name.required'=>'الرجاءادخال اسم الموظف',
            'fingerprint_code.required' => 'الرجاء ادخال كود البصمة',
            'emp_gender.required' => 'الرجاء اختار نوع الجنس',
            'blood_type_id.numeric' => 'الرجاء اختيار فصيلة الدم',
            'employees_code.required'=> 'الرجاء ادخال البيانات',
            'religion_id.numeric'=> 'الرجاء ادخال البيانات',
            'children_number.required'=> 'الرجاء ادخال البيانات',
            'marital_status_id.numeric'=> 'الرجاء ادخال البيانات',
            'military_services_id.numeric'=> 'الرجاء ادخال البيانات',
            'does_has_Driving_License.required'=> 'الرجاء ادخال البيانات',
            'Functiona_status.required'=> 'الرجاء ادخال البيانات',
            'MotivationType.required'=> 'الرجاء ادخال البيانات',
            'sal_cach_or_visa.required'=> 'الرجاء ادخال البيانات',
            'is_Disabilities_processes.required'=> 'الرجاء ادخال البيانات',
            'has_Relatives.required'=> 'الرجاء ادخال البيانات',
            'shift_type_id.required'=> 'الرجاء ادخال البيانات',
            'isSocialnsurance.required'=> 'الرجاء ادخال البيانات',
            'ismedicalinsurance.required'=> 'الرجاء ادخال البيانات',
            'Does_have_fixed_allowances.required'=> 'الرجاء ادخال البيانات',
            'does_has_ateendance.required'=> 'الرجاء ادخال البيانات',
            'is_done_Vaccation_formula.required'=> 'الرجاء ادخال البيانات',
            'is_active_for_Vaccation.required'=> 'الرجاء ادخال البيانات',
            'is_Sensitive_manager_data.required'=> 'الرجاء ادخال هذا البند',
            'branch_id.numeric'=> 'الرجاء اختيار القسم',


        ];
    }
}
