<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driving_licensesModel extends Model
{
    use HasFactory;
    protected $table = 'driving_licenses';
    protected $fillable = [
        'name', 'added_by', 'updated_by', 'active', 'com_code', 'created_at', 'updated_at'
    ];

    public function added(){
        return $this->belongsTo(\App\Models\Admin\adminModel::class,'added_by');
    }
}
