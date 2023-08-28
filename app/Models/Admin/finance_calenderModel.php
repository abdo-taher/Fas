<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finance_calenderModel extends Model
{

    use HasFactory;
    protected $table="finance_calenders";
    protected $fillable=[
        'FINANCE_YR', 'FINANCE_YR_DESC', 'start_date', 'end_date', 'is_open', 'com_ocode', 'added_by', 'updated_by', 'created_at', 'updated_at'

    ];
    public function added(){
        return $this->belongsTo(\App\Models\Admin\adminModel::class,'added_by');
    }
    public function updatedby(){
        return $this->belongsTo(\App\Models\Admin\adminModel::class,'updated_by');
    }

}
