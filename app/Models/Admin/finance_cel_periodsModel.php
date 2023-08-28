<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finance_cel_periodsModel extends Model
{

    use HasFactory;

    protected $table="finance_cln_periods";
    protected $fillable=[
        'finance_calenders_id', 'number_of_days', 'year_and_month', 'FINANCE_YR', 'MONTH_ID', 'START_DATE_M', 'END_DATE_M', 'is_open', 'start_date_for_pasma', 'end_date_for_pasma', 'added_by', 'updated', 'com_code', 'created_at', 'updated_at'
    ];

    public function added(){
        return $this->belongsTo(\App\Models\Admin\adminModel::class,'added_by');
    }
    public function updatedby(){
        return $this->belongsTo(\App\Models\Admin\adminModel::class,'updated_by');
    }
    public function Month(){
        return $this->hasMany(monthesModel::class,'id','MONTH_ID');
    }

}
