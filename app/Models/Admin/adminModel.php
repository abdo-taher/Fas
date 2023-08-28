<?php

namespace App\Models\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class adminModel extends Authenticatable
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'admins';
    protected $fillable = [
        'username', 'email', 'password', 'image', 'role_as', 'company_code', 'remember_token', 'is_active', 'created_at', 'updated_at'
    ];

    public function role_as(){
        $superAdmin = general_settingsModel::all()->where('role_as',0);
        $normalAdmin = general_settingsModel::all()->where('role_as',1);
        $employee = general_settingsModel::all()->where('role_as',2);
        if (isset($superAdmin)){
            return 'Super Admin';
        }
        if (isset($normalAdmin)){
            return 'Normal Admin';
        }
        if (isset($employee)){
            return 'Employee';
        }
    }

//    public function whoEdit(){
//        return $this->hasMany(general_settingsModel::class,'id','updated_by');
//    }
//    public function whoAdd(){
//        return $this->hasMany(general_settingsModel::class,'id','added_by');
//    }

}
