<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\qualif_typeRequest;
use App\Models\Admin\qualif_typeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class qualif_typeController extends Controller
{
    public function index(){
        $com_code = auth()->user()->company_code;
        $data = qualif_typeModel::where('com_code',$com_code)->paginate(5);
        return view('qualif_types.index',compact('data'));
    }

    public function add(){
        return view('qualif_types.add');
    }

    public function addDone(qualif_typeRequest $request){
        try {
            $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
            qualif_typeModel::insert($request->except(['_token']));
            return redirect()->route('qualif_types')->with(['success'=>'تم اضافة نوع المؤهل بنجاح']);


        }catch (Exception $exception){
            return redirect()->route('qualif_types')->with(['fail'=>'لم تم نوع المؤهل بنجاح']);
        }
    }

    public function edit($id){
        $data = qualif_typeModel::all()->where('id',$id);
        if ($data->com_code = auth()->user()->company_code){
            $data = $data->first();
            return view('qualif_types.edit',compact('data'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(qualif_typeRequest $request , $id){
        try{
            $request->request->add(['updated_by' =>auth()->user()->id]);
            $findRow = qualif_typeModel::find($id);
            if($findRow){
                $findRow->update($request->except(['_token']));
                return redirect()->route('qualif_types')->with(['success'=>' تم تعديل نوع المؤهل بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('branches')->with(['fail'=>'لم يتم تعديل نوع المؤهل بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = qualif_typeModel::find($id);
            $status = $findRow->active == 0 ? 1 : 0;
            $findRow->update(['active'=>$status]);
            if($status == 0){
                return redirect()->route('qualif_types')->with(['fail'=>'تم الغاء تنشيط نوع المؤهل بنجاح']);
            }elseif ($status == 1){
                return redirect()->route('qualif_types')->with(['success'=>'تم  تنشيط نوع المؤهل بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('qualif_types')->with(['fail'=>'لم يتم تعديل نوع المؤهل بنجاح']);
        }



    }

    public function delete($id){
        $findRow = qualif_typeModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('qualif_types')->with(['success'=>'تم  حذف نوع المؤهل بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('qualif_types')->with(['fail'=>'لم يتم حذف نوع المؤهل لانها مفتوحه علي النظام']);
        }
    }


    public function qualif_typesSearch(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->inputSearch;
            $data=qualif_typeModel::Where('name', 'like', '%' . $search . '%')->get();
            return view('qualif_types.ajaxSearch',compact('data'));
        }


    }

}
