<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class monthesModel extends Model
{
    use HasFactory;

    protected $table = 'monthes';
    protected $fillable = [
        'name',
        'name_en'
    ];

}
