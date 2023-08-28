<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branchesModel extends Model
{
    use HasFactory;
    protected $table  ='branches';
    protected $fillable = [
        'name', 'address', 'phones', 'email', 'active', 'com_code', 'added_by', 'updated_by', 'created_at', 'updated_at'
    ];

    public function added(){
        return $this->belongsTo(\App\Models\Admin\adminModel::class,'added_by');
    }
}
