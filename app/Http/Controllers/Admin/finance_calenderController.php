<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\finance_calenderRequest;
use App\Models\Admin\finance_calenderModel;
use App\Models\Admin\finance_cel_periodsModel;
use App\Models\Admin\monthesModel;
use Faker\Core\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use function PHPUnit\Framework\isEmpty;

class finance_calenderController extends Controller
{

    public function index(){
        $data = finance_calenderModel::all();
        return view('finance_calender.index',compact('data'));
    }

    public function add(){
        return view('finance_calender.add');
    }
    public function addDone(finance_calenderRequest $request){
        try{
            DB::beginTransaction();
            $request->company_code = auth()->user()->company_code;
            $request->request->add([
                'company_code'=>auth()->user()->company_code,
                'added_by'=>auth()->user()->id
                ]);
            $parent_id = finance_calenderModel::insertGetId($request->except(['_token']));
            if ($parent_id){
                 $startDate = new \DateTime($request->start_date);
                $endDate = new \DateTime($request->end_date);
                $dateInterval = new \DateInterval('P1M');
                $datePerioud = new \DatePeriod($startDate,$dateInterval,$endDate);

                foreach ($datePerioud as $date){
                    $monthDate['finance_calenders_id'] = $parent_id;
                    $monthName_en = $date->format('F');
                    $dateParentMonth =monthesModel::select('id')->where('name_en',$monthName_en)->first();
                    $monthDate['MONTH_ID'] =$dateParentMonth['id'];
                    $monthDate['FINANCE_YR'] = $request->FINANCE_YR;
                    $monthDate['START_DATE_M'] =date('Y-m-01',strtotime($date->format('Y-m-d')));
                    $monthDate['END_DATE_M'] =date('Y-m-t',strtotime($date->format('Y-m-d')));
                    $monthDate['year_and_month'] =date('Y-M',strtotime($date->format('Y-m-d')));
                    $dateDiff = strtotime($monthDate['END_DATE_M'])-strtotime($monthDate['START_DATE_M']);
                    $monthDate['number_of_days']=round($dateDiff/(60*60*24))+1;
                    $monthDate['com_code']=auth()->user()->company_code;
                    $monthDate['added_by']=auth()->user()->id;
                    $monthDate['updated_by']=auth()->user()->id;
                    $monthDate['start_date_for_pasma']=date('Y-m-01',strtotime($date->format('Y-m-d')));
                    $monthDate['end_date_for_pasma']=date('Y-m-t',strtotime($date->format('Y-m-d')));
                    $monthDate['created_at']=date('Y-m-d H:i:s');
                    $monthDate['updated_at']=date('Y-m-d H:i:s');
                finance_cel_periodsModel::insert($monthDate);

                }
            }
            DB::commit();
            return redirect()->route('finance_calender')->with(['success'=>'تم ضافة السنة المالية بنجاح']);
        }catch (Exception $exception){
            DB::rollBack();
            return redirect()->route('finance_calender')->with(['fail'=>'لم يتم ضافة السنة المالية بنجاح']);
            }
    }
    public function edit($slug){
        $find = finance_calenderModel::all()->where('FINANCE_YR',$slug)->first();
        if ($find->is_open == 0){
            $data = finance_calenderModel::all()->where('FINANCE_YR',$slug)->first();
            return view('finance_calender.edit',compact('data'));
        }else{
            return redirect()->route('finance_calender')->with(['fail'=>'لا يمكن تعديل  السنة لانها مفتوحة علي النظام']);
        }
    }
    public function editDone(finance_calenderRequest $request,$id){

        try {

//            check if new data equal old data
            DB::beginTransaction();
        $oldData = finance_calenderModel::all()->where('id',$id);
        if ($oldData->first()->start_date != $request->start_date or $oldData->first()->end_date != $request->end_date){

            $month = finance_cel_periodsModel::where('finance_calenders_id',$id)->delete();
            if ($month){
                $startDate = new \DateTime($request->start_date);
                $endDate = new \DateTime($request->end_date);
                $dateInterval = new \DateInterval('P1M');
                $datePerioud = new \DatePeriod($startDate,$dateInterval,$endDate);

                foreach ($datePerioud as $date) {
                    $monthDate['finance_calenders_id'] = $id;
                    $monthName_en = $date->format('F');
                    $dateParentMonth = monthesModel::select('id')->where('name_en', $monthName_en)->first();
                    $monthDate['MONTH_ID'] = $dateParentMonth['id'];
                    $monthDate['FINANCE_YR'] = $request->FINANCE_YR;
                    $monthDate['START_DATE_M'] = date('Y-m-01', strtotime($date->format('Y-m-d')));
                    $monthDate['END_DATE_M'] = date('Y-m-t', strtotime($date->format('Y-m-d')));
                    $monthDate['year_and_month'] = date('Y-M', strtotime($date->format('Y-m-d')));
                    $dateDiff = strtotime($monthDate['END_DATE_M']) - strtotime($monthDate['START_DATE_M']);
                    $monthDate['number_of_days'] = round($dateDiff / (60 * 60 * 24)) + 1;
                    $monthDate['com_code'] = auth()->user()->company_code;
                    $monthDate['added_by'] = auth()->user()->id;
                    $monthDate['updated_by'] = auth()->user()->id;
                    $monthDate['start_date_for_pasma'] = date('Y-m-01', strtotime($date->format('Y-m-d')));
                    $monthDate['end_date_for_pasma'] = date('Y-m-t', strtotime($date->format('Y-m-d')));
                    $monthDate['created_at'] = date('Y-m-d H:i:s');
                    $monthDate['updated_at'] = date('Y-m-d H:i:s');
                    finance_cel_periodsModel::insert($monthDate);
//                                is done
                }
                $update = finance_calenderModel::find($id);
                $update->update($request->except(['_token']));
                DB::commit();
                return redirect()->route('finance_calender')->with(['success'=>'تم تعديل السنة الماليه بنجاح']);

            }
        }else{
            return redirect()->route('finance_calender')->with(['success'=>'تم تعديل السنة الماليه بنجاح']);
        }
        }catch (Exception $exception){
            DB::rollBack();
            return redirect()->route('finance_calender')->with(['fail'=>'لم يتم تعديل السنة الماليه بنجاح']);
        }
    }



    public function openOr($id){
        try {
            $data = finance_calenderModel::all()->where('is_open',1);
            $open = finance_calenderModel::find($id);
            if ($data->count() == 0){
                $open->update(['is_open'=>1]);
                return redirect()->route('finance_calender')->with(['success'=>'تم فتح السنة  بنجاح']);
            }elseif($data->count() > 0){
                if ($open->is_open = 0){
                    $open->update(['is_open'=>1]);
                    return redirect()->route('finance_calender')->with(['success'=>'تم فتح السنة  بنجاح']);
                }elseif ($open->is_open = 1){
                    $open->update(['is_open'=>0]);
                    return redirect()->route('finance_calender')->with(['fail'=>'الرجاء غلق السنوات المفتوحه']);
                }
            }
        }catch (Exception $exception){
            return redirect()->route('finance_calender')->with(['fail'=>'لم يتم فتح  بنجاح']);
        }
    }

    public function delete($id){
        try {
            $find = finance_calenderModel::find($id);
            if ($find->is_open == 0){
                $find->delete();
                return redirect()->route('finance_calender')->with(['success'=>'تم حذف السنة وكل متعلقاتها']);
            }else{
                return redirect()->route('finance_calender')->with(['fail'=>'لم يمكن حذف السنة لانها مفتوحة علي النظام']);
            }
        }catch (Exception $exception){}
        return redirect()->route('finance_calender')->with(['fail'=>'لم يتم الحذف  بنجاح']);
    }



    public function MonthsIndex(Request $request){
        if($request->ajax()){
            echo "ajax";
        }
    }
}
