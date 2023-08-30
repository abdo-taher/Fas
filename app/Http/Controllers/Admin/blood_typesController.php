<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\blood_typesRequest;
use App\Models\Admin\blood_typesModel;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class blood_typesController extends Controller
{
    public function index(){
        $com_code = auth()->user()->company_code;
        $data = blood_typesModel::where('com_code',$com_code)->paginate(5);
        return view('blood_types.index',compact('data'));
    }

    public function add(){
        return view('blood_types.add');
    }

    public function addDone(blood_typesRequest $request){
        try {
            $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
            blood_typesModel::insert($request->except(['_token']));
            return redirect()->route('blood_types')->with(['success'=>'تم اضافة فصيلة الدم بنجاح']);


        }catch (Exception $exception){
            return redirect()->route('blood_types')->with(['fail'=>'لم تم فصيلة الدم بنجاح']);
        }
    }

    public function edit($slug){
        $data = blood_typesModel::all()->where('name',$slug);
        if ($data->com_code = auth()->user()->company_code){
            $data = $data->first();
            return view('blood_types.edit',compact('data'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(blood_typesRequest $request , $id){
        try{
            $request->request->add(['updated_by' =>auth()->user()->id]);
            $findRow = blood_typesModel::find($id);
            if($findRow){
                $findRow->update($request->except(['_token']));
                return redirect()->route('blood_types')->with(['success'=>' تم تعديل فصيلة الدم بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('branches')->with(['fail'=>'لم يتم تعديل فصيلة الدم بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = blood_typesModel::find($id);
            $status = $findRow->active == 0 ? 1 : 0;
            $findRow->update(['active'=>$status]);
            if($status == 0){
                return redirect()->route('blood_types')->with(['fail'=>'تم الغاء تنشيط فصيلة الدم بنجاح']);
            }elseif ($status == 1){
                return redirect()->route('blood_types')->with(['success'=>'تم  تنشيط فصيلة الدم بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('blood_types')->with(['fail'=>'لم يتم تعديل فصيلة الدم بنجاح']);
        }



    }

    public function delete($id){
        $findRow = blood_typesModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('blood_types')->with(['success'=>'تم  حذف فصيلة الدم بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('blood_types')->with(['fail'=>'لم يتم حذف فصيلة الدم لانه مفتوح علي النظام']);
        }
    }


    public function blood_typesSearch(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->inputSearch;
            $data=blood_typesModel::Where('name', 'like', '%' . $search . '%')->get();
            return view('blood_types.ajaxSearch',compact('data'));
        }


    }
}
