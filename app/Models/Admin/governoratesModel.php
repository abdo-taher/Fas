<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class governoratesModel extends Model
{
    use HasFactory;
    protected $table = 'governorates';
    protected $fillable = [
        'name','country_id', 'added_by', 'updated_by', 'active', 'com_code', 'created_at', 'updated_at'
    ];

    public function added(){
        return $this->belongsTo(\App\Models\Admin\adminModel::class,'added_by');
    }
    public function country(){
        return $this->belongsTo(\App\Models\Admin\countrysModel::class,'country_id');
    }
}
