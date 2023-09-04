<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nette\Utils\DateTime;

class shitfts_typeModel extends Model
{
    use HasFactory;
    protected $table = 'shitfts_type';
    protected $fillable = [
        'type', 'from_time', 'to_time', 'total_hour', 'added_by', 'updated_by', 'com_code', 'active', 'created_at', 'updated_at'
    ];

    public function type_shift($id){
        $type = shitfts_typeModel::all()->where('id',$id)->first()->type;
        return $type == 1 ? "صباحي" : "مسائي" ;
    }

    public function added(){
        return $this->belongsTo(\App\Models\Admin\adminModel::class,'added_by');
    }
    public function shift_detalis ($id){
        $type = shitfts_typeModel::all()->where('id',$id)->first();
        $name = $this->type_shift($id);
        $start = new DateTime($type->from_time);
        $timeStart = $start ->format('h:i');
        $end = new DateTime($type->to_time);
        $timeEnd = $end ->format('h:i');
        return "الشفت يبدء من " . $timeStart . "وينتهي عند" . $timeEnd  . "(" . $name  . ")";
    }

}
