<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class disabilities_processesModel extends Model
{
    use HasFactory;
    protected $table = 'disabilities_processes';
    protected $fillable = [
        'name', 'active', 'com_code', 'created_at', 'updated_at'
    ];

    public function added(){
        return $this->belongsTo(\App\Models\Admin\adminModel::class,'added_by');
    }
}
