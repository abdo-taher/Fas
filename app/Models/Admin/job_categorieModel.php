<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_categorieModel extends Model
{
    use HasFactory;

    protected $table = 'job_categories';
    protected $fillable = [
        'name', 'departments_id', 'added_by', 'updated_by', 'active', 'com_code', 'created_at', 'updated_at'
    ];

    public function added(){
        return $this->belongsTo(\App\Models\Admin\adminModel::class,'added_by');
    }

    public function departments(){
        return $this->belongsTo(\App\Models\Admin\departmentModel::class,'departments_id');
    }
}
