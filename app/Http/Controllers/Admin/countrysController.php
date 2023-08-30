<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\countrysRequest;
use App\Models\Admin\countrysModel;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class countrysController extends Controller
{
    public function index(){
        $com_code = auth()->user()->company_code;
        $data = countrysModel::where('com_code',$com_code)->paginate(5);
        return view('countrys.index',compact('data'));
    }

    public function add(){
        return view('countrys.add');
    }

    public function addDone(countrysRequest $request){
        try {
            $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
            countrysModel::insert($request->except(['_token']));
            return redirect()->route('countrys')->with(['success'=>'تم اضافة الدولة العمل بنجاح']);


        }catch (Exception $exception){
            return redirect()->route('countrys')->with(['fail'=>'لم يتم الدولة العمل بنجاح']);
        }
    }

    public function edit($slug){
        $data = countrysModel::all()->where('name',$slug);
        if ($data->com_code = auth()->user()->company_code){
            $data = $data->first();
            return view('countrys.edit',compact('data'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(countrysRequest $request , $id){
        try{
            $request->request->add(['updated_by' =>auth()->user()->id]);
            $findRow = countrysModel::find($id);
            if($findRow){
                $findRow->update($request->except(['_token']));
                return redirect()->route('countrys')->with(['success'=>' تم تعديل الدولة العمل بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('branches')->with(['fail'=>'لم يتم تعديل الدولة العمل بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = countrysModel::find($id);
            $status = $findRow->active == 0 ? 1 : 0;
            $findRow->update(['active'=>$status]);
            if($status == 0){
                return redirect()->route('countrys')->with(['fail'=>'تم الغاء تنشيط الدولة العمل بنجاح']);
            }elseif ($status == 1){
                return redirect()->route('countrys')->with(['success'=>'تم  تنشيط الدولة العمل بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('countrys')->with(['fail'=>'لم يتم تعديل الدولة العمل بنجاح']);
        }



    }

    public function delete($id){
        $findRow = countrysModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('countrys')->with(['success'=>'تم  حذف الدولة العمل بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('countrys')->with(['fail'=>'لم يتم حذف الدولة العمل لانه مفتوح علي النظام']);
        }
    }


    public function countrysSearch(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->inputSearch;
            $data=countrysModel::Where('name', 'like', '%' . $search . '%')->get();
            return view('countrys.ajaxSearch',compact('data'));
        }


    }
}
