<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class occasionsModel extends Model
{
    use HasFactory;


    use HasFactory;
    protected $table = 'occasions';
    protected $fillable = [
        'name','start_date','end_date','total_day', 'added_by', 'updated_by', 'active', 'com_code', 'created_at', 'updated_at'
    ];

    public function added(){
        return $this->belongsTo(\App\Models\Admin\adminModel::class,'added_by');
    }
}
