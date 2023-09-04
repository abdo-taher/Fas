<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employeesModel extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $guarded =[];

    public function status(){
        $Functiona_status = $this->Functiona_status;
        return $Functiona_status == 1 ? "موظف مفعل" : "موظف موقوف" ;
    }
    public function added(){
        return $this->belongsTo(\App\Models\Admin\adminModel::class,'added_by');
    }
    public function religion(){
        return $this->belongsTo(\App\Models\Admin\religionsModel::class,'religion_id');
    }
    public function bloodType (){
        return $this->belongsTo(\App\Models\Admin\blood_typesModel::class,'blood_type_id');
    }
    public function maritalStatus(){
        return $this->belongsTo(\App\Models\Admin\marital_statusModel::class,'marital_status_id');
    }
    public function militaryStatus(){
        return $this->belongsTo(\App\Models\Admin\military_servicesModel::class,'military_services_id');
    }
    public function drivingLicense(){
        return $this->belongsTo(\App\Models\Admin\driving_licensesModel::class,'driving_license_id');
    }
    public function qualifType(){
        return $this->belongsTo(\App\Models\Admin\qualif_typeModel::class,'qualif_type_id');
    }
    public function qualification(){
        return $this->belongsTo(\App\Models\Admin\qualificationModel::class,'Qualifications_id');
    }
    public function graduationEstimate(){
        return $this->belongsTo(\App\Models\Admin\graduation_estimatesModel::class,'graduation_estimate_id');
    }
    public function DisabilitiesProcesses(){
        return $this->belongsTo(\App\Models\Admin\disabilities_processesModel::class,'Disabilities_processes_id');
    }
    public function nationality(){
        return $this->belongsTo(\App\Models\Admin\nationalitysModel::class,'emp_nationality_id');
    }
    public function languages(){
        return $this->belongsTo(\App\Models\Admin\languagesModel::class,'language_id');
    }
    public function countrys(){
        return $this->belongsTo(\App\Models\Admin\countrysModel::class,'country_id');
    }
    public function governorates(){
        return $this->belongsTo(\App\Models\Admin\governoratesModel::class,'governorate_id');
    }
    public function centers(){
        return $this->belongsTo(\App\Models\Admin\centersModel::class,'center_id');
    }
    public function departments(){
        return $this->belongsTo(\App\Models\Admin\departmentModel::class,'emp_Departments_id');
    }
    public function jobCategories(){
        return $this->belongsTo(\App\Models\Admin\job_categorieModel::class,'emp_jobs_id');
    }
    public function branch(){
        return $this->belongsTo(\App\Models\Admin\branchesModel::class,'branch_id');
    }
    public function drivingLicenses(){
        return $this->belongsTo(\App\Models\Admin\driving_licensesModel::class,'branch_id');
    }
    public function shitfts_type(){
        return $this->belongsTo(\App\Models\Admin\shitfts_typeModel::class,'branch_id');
    }
}
