<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\shitfts_typeRequest;
use App\Models\Admin\shitfts_typeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use function NunoMaduro\Collision\Exceptions\__toString;
use function Symfony\Component\HttpKernel\Log\format;

class shifts_typeController extends Controller
{
    public function index(){
        $com_code = auth()->user()->company_code;
        $data = shitfts_typeModel::where('com_code',$com_code)->paginate(5);
        return view('shifts.index',compact('data'));
    }

    public function add(){
        return view('shifts.add');
    }

    public function addDone(shitfts_typeRequest $request){
        try {
            $oldShifts = shitfts_typeModel::all()->where('type',$request->type)->first();
            if (empty($oldShifts)){
                $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
                 shitfts_typeModel::insert($request->except(['_token']));
                return redirect()->route('shifts')->with(['success'=>'تم اضافة فترة العمل بنجاح']);
            }
            if ($oldShifts->total_hour != $request->total_hour and $oldShifts->from_time != $request->from_time and $oldShifts->to_time != $request->to_time){
                if($request->total_hour>0){
                $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
                $insert = shitfts_typeModel::insert($request->except(['_token']));
                return redirect()->route('shifts')->with(['success'=>'تم اضافة فترة العمل بنجاح']);
                }else{
                    return redirect()->route('shifts')->with(['fail'=>'الرجاء ادخال عدد ساعات العمل']);
                }
            }else{

                return redirect()->route('shifts')->with(['fail'=>'تم اضافة فترة العمل من قبل']);

            }

        }catch (Exception $exception){
            return redirect()->route('shifts')->with(['fail'=>'لم تم اضافة فترة العمل بنجاح']);
        }
    }

    public function edit($id){
        $data = shitfts_typeModel::all()->where('id',$id);
        if ($data->com_code = auth()->user()->company_code){
            $data = $data->first();
            return view('shifts.edit',compact('data'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(shitfts_typeRequest $request , $id){
        try{
            $request->request->add(['updated_by' =>auth()->user()->id]);
            $findRow = shitfts_typeModel::find($id);
            if($findRow){
                $findRow->update($request->except(['_token']));
                return redirect()->route('shifts')->with(['success'=>' تم تعديل فترة العمل بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('shifts')->with(['fail'=>'لم يتم تعديل فترة العمل بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = shitfts_typeModel::find($id);
            $status = $findRow->active == 0 ? 1 : 0;
            $findRow->update(['active'=>$status]);
            if($status == 0){
                return redirect()->route('shifts')->with(['fail'=>'تم الغاء تنشيط فترة العمل بنجاح']);
            }elseif ($status == 1){
                return redirect()->route('shifts')->with(['success'=>'تم  تنشيط فترة العمل بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('shifts')->with(['fail'=>'لم يتم تعديل فترة العمل بنجاح']);
        }



    }

    public function delete($id){
        $findRow = shitfts_typeModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('shifts')->with(['success'=>'تم  حذف الفترة بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('shifts')->with(['fail'=>'لم يتم حذف فترة العمل لانها مفتوحه علي النظام']);
        }
    }


    public function ajaxSearch(Request $request)
    {
        if ($request->ajax()) {
            $type_search = $request->type;
            if ($type_search == '0') {
//هنا نعمل شرط دائم التحقق
                $field1 = "id";
                $operator1 = ">";
                $value1 = 0;
            } else {
                $field1 = "type";
                $operator1 = "=";
                $value1 = $type_search;
            }
            }
            $data=shitfts_typeModel::select("*")->where($field1,$operator1,$value1)->orderby('id','DESC')->paginate(5);
            return view('shifts.ajaxSearch',compact('data'));

    }


}
