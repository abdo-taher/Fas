<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\departmentRequest;
use App\Models\Admin\departmentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class departmentcontroller extends Controller
{
    public function index(){
        $com_code = auth()->user()->company_code;
        $data = departmentModel::where('com_code',$com_code)->paginate(5);
        return view('departments.index',compact('data'));
    }

    public function add(){
        return view('departments.add');
    }

    public function addDone(departmentRequest $request){
        try {
                $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
                departmentModel::insert($request->except(['_token']));
                return redirect()->route('departments')->with(['success'=>'تم اضافة الادارة بنجاح']);


        }catch (Exception $exception){
            return redirect()->route('departments')->with(['fail'=>'لم تم الادارة بنجاح']);
        }
    }

    public function edit($id){
        $data = departmentModel::all()->where('id',$id);
        if ($data->com_code = auth()->user()->company_code){
            $data = $data->first();
            return view('departments.edit',compact('data'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(departmentRequest $request , $id){
        try{
            $request->request->add(['updated_by' =>auth()->user()->id]);
            $findRow = departmentModel::find($id);
            if($findRow){
                $findRow->update($request->except(['_token']));
                return redirect()->route('departments')->with(['success'=>' تم تعديل الادارة بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('branches')->with(['fail'=>'لم يتم تعديل الادارة بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = departmentModel::find($id);
            $status = $findRow->active == 0 ? 1 : 0;
            $findRow->update(['active'=>$status]);
            if($status == 0){
                return redirect()->route('departments')->with(['fail'=>'تم الغاء تنشيط الادارة بنجاح']);
            }elseif ($status == 1){
                return redirect()->route('departments')->with(['success'=>'تم  تنشيط الادارة بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('departments')->with(['fail'=>'لم يتم تعديل الادارة بنجاح']);
        }



    }

    public function delete($id){
        $findRow = departmentModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('departments')->with(['success'=>'تم  حذف الادارة بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('departments')->with(['fail'=>'لم يتم حذف الادارة لانها مفتوحه علي النظام']);
        }
    }


    public function departments_Search(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->input;
            DB::table('departments')->where('name',"==",$search)->get();
//            departmentModel::select("*")->where('name',$search)
            $data=departmentModel::Where('name', 'like', '%' . $search . '%')->get();
            return view('departments.ajaxSearch',compact('data'));
        }


    }


}
