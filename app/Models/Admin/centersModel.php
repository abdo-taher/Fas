<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class centersModel extends Model
{
    use HasFactory;
    protected $table = 'centers';
    protected $fillable = [
        'name', 'added_by','governorate_id', 'updated_by', 'active', 'com_code', 'created_at', 'updated_at'
    ];

    public function added(){
        return $this->belongsTo(\App\Models\Admin\adminModel::class,'added_by');
    }
    public function governorate(){
        return $this->belongsTo(\App\Models\Admin\governoratesModel::class,'governorate_id');
    }
}
