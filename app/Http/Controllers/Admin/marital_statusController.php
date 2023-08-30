<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\marital_statusRequest;
use App\Models\Admin\marital_statusModel;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class marital_statusController extends Controller
{
    public function index(){
        $com_code = auth()->user()->company_code;
        $data = marital_statusModel::where('com_code',$com_code)->paginate(5);
        return view('marital_status.index',compact('data'));
    }

    public function add(){
        return view('marital_status.add');
    }

    public function addDone(marital_statusRequest $request){
        try {
            $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
            marital_statusModel::insert($request->except(['_token']));
            return redirect()->route('marital_status')->with(['success'=>'تم اضافة الحالة الاجتماعية بنجاح']);


        }catch (Exception $exception){
            return redirect()->route('marital_status')->with(['fail'=>'لم تم الحالة الاجتماعية بنجاح']);
        }
    }

    public function edit($slug){
        $data = marital_statusModel::all()->where('name',$slug);
        if ($data->com_code = auth()->user()->company_code){
            $data = $data->first();
            return view('marital_status.edit',compact('data'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(marital_statusRequest $request , $id){
        try{
            $request->request->add(['updated_by' =>auth()->user()->id]);
            $findRow = marital_statusModel::find($id);
            if($findRow){
                $findRow->update($request->except(['_token']));
                return redirect()->route('marital_status')->with(['success'=>' تم تعديل الحالة الاجتماعية بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('branches')->with(['fail'=>'لم يتم تعديل الحالة الاجتماعية بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = marital_statusModel::find($id);
            $status = $findRow->active == 0 ? 1 : 0;
            $findRow->update(['active'=>$status]);
            if($status == 0){
                return redirect()->route('marital_status')->with(['fail'=>'تم الغاء تنشيط الحالة الاجتماعية بنجاح']);
            }elseif ($status == 1){
                return redirect()->route('marital_status')->with(['success'=>'تم  تنشيط الحالة الاجتماعية بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('marital_status')->with(['fail'=>'لم يتم تعديل الحالة الاجتماعية بنجاح']);
        }



    }

    public function delete($id){
        $findRow = marital_statusModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('marital_status')->with(['success'=>'تم  حذف الحالة الاجتماعية بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('marital_status')->with(['fail'=>'لم يتم حذف الحالة الاجتماعية لانه مفتوح علي النظام']);
        }
    }


    public function marital_statusSearch(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->inputSearch;
            $data=marital_statusModel::Where('name', 'like', '%' . $search . '%')->get();
            return view('marital_status.ajaxSearch',compact('data'));
        }


    }
}
