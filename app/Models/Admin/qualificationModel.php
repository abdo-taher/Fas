<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qualificationModel extends Model
{
    use HasFactory;
    protected $table = 'qualifications';
    protected $fillable = [
        'name', 'qualif_id ', 'added_by', 'updated_by', 'active', 'com_code', 'created_at', 'updated_at'
    ];

    public function added(){
        return $this->belongsTo(\App\Models\Admin\adminModel::class,'added_by');
    }

    public function qualification(){
        return $this->belongsTo(\App\Models\Admin\qualif_typeModel::class,'qualif_id');
    }
}
