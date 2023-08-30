<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\qualificationRequest;
use App\Models\Admin\qualif_typeModel;
use App\Models\Admin\qualificationModel;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class qualificationcontroller extends Controller
{
    public function index(){
        $com_code = auth()->user()->company_code;
        $data = qualificationModel::where('com_code',$com_code)->paginate(5);
        $qualif_type = qualif_typeModel::all();
        return view('qualifications.index',compact('data','qualif_type'));
    }

    public function add(){
        $qualif_type = qualif_typeModel::all();
        return view('qualifications.add',compact('qualif_type'));
    }

    public function addDone(qualificationRequest $request){
        try {
            $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
            qualificationModel::insert($request->except(['_token']));
            return redirect()->route('qualifications')->with(['success'=>'تم اضافة المؤهل الدراسي بنجاح']);
        }catch (Exception $exception){
            return redirect()->route('qualifications')->with(['fail'=>'لم تم اضافة المؤهل الدراسي بنجاح']);
        }
    }

    public function edit($slug){
        $data = qualificationModel::all()->where('name',$slug);
        if ($data->com_code = auth()->user()->company_code){
            $data = $data->first();
            $qualif_type = qualif_typeModel::all();
            return view('qualifications.edit',compact('data','qualif_type'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(qualificationRequest $request , $id){
        try{
            $request->request->add(['updated_by' =>auth()->user()->id]);
            $findRow = qualificationModel::find($id);
            if($findRow){
                $findRow->update($request->except(['_token']));
                return redirect()->route('qualifications')->with(['success'=>' تم تعديل المؤهل الدراسي بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('qualifications')->with(['fail'=>'لم يتم تعديل المؤهل الدراسي بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = qualificationModel::find($id);
            $status = $findRow->active == 0 ? 1 : 0;
            $findRow->update(['active'=>$status]);
            if($status == 0){
                return redirect()->route('qualifications')->with(['fail'=>'تم الغاء تنشيط المؤهل الدراسي بنجاح']);
            }elseif ($status == 1){
                return redirect()->route('qualifications')->with(['success'=>'تم  تنشيط المؤهل الدراسي بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('qualifications')->with(['fail'=>'لم يتم تعديل المؤهل الدراسي بنجاح']);
        }



    }

    public function delete($id){
        $findRow = qualificationModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('qualifications')->with(['success'=>'تم  حذف المؤهل الدراسي بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('qualifications')->with(['fail'=>'لم يتم حذف المؤهل الدراسي لانها مفتوحه علي النظام']);
        }
    }


    public function qualificationsSearch(Request $request)
    {
        if ($request->ajax()) {
            $searchInput = $request->inputSearch;
            $searchSelect = $request->selectSearch;
            if (isset($searchInput)){
                $data = qualificationModel::Where('name', 'like', '%' . $searchInput . '%')->get();
            }elseif (isset($searchSelect)){
                if ($searchSelect == 0){
                    $data=qualificationModel::all();
                }else{
                    $data=qualificationModel::Where('qualif_id',$searchSelect)->get();
                }
            }

            return view('qualifications.ajaxSearch',compact('data'));
        }

    }
}
