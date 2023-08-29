<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departmentModel extends Model
{
    use HasFactory;

    protected $table = 'departments';
    protected $fillable = [
        'name', 'phone', 'notes', 'added_by', 'updated_by', 'active', 'com_code', 'created_at', 'updated_at'
    ];

    public function added(){
        return $this->belongsTo(\App\Models\Admin\adminModel::class,'added_by');
    }

}
