<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class general_settingsModel extends Model
{
    use HasFactory;
    protected $table = 'general_settings';
    protected $fillable = [
        'company_name', 'system_status', 'image', 'phones', 'address', 'email', 'added_by', 'updated_by', 'company_code', 'after_minutes_calculate_delay', 'after_minutes_calculate_early_departure', 'after_minutes_quarter_day', 'after_time_half_day_cut', 'after_time_all_day_day_cut', 'monthly_vacation_balance', 'after_days_begin_vacation', 'first_balance_begin_vacation', 'sanctions_value_first_absence', 'sanctions_value_second_absence', 'sanctions_value_third_absence', 'sanctions_value_forth_absence', 'created_at', 'updated_at'
    ];

    public function status($id){
        $system = general_settingsModel::find($id)->system_status;
        if($system = 1){
            return "الشركة مفعله";
        }
        if($system = 0){
            return "الشركة مفعله";
        }
    }
}
