<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\military_servicesRequest;
use App\Models\Admin\military_servicesModel;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class military_servicesController extends Controller
{
    public function index(){
        $com_code = auth()->user()->company_code;
        $data = military_servicesModel::where('com_code',$com_code)->paginate(5);
        return view('military_services.index',compact('data'));
    }

    public function add(){
        return view('military_services.add');
    }

    public function addDone(military_servicesRequest $request){
        try {
            $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
            military_servicesModel::insert($request->except(['_token']));
            return redirect()->route('military_services')->with(['success'=>'تم اضافة نوع الخدمة العسكرية بنجاح']);


        }catch (Exception $exception){
            return redirect()->route('military_services')->with(['fail'=>'لم تم نوع الخدمة العسكرية بنجاح']);
        }
    }

    public function edit($slug){
        $data = military_servicesModel::all()->where('name',$slug);
        if ($data->com_code = auth()->user()->company_code){
            $data = $data->first();
            return view('military_services.edit',compact('data'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(military_servicesRequest $request , $id){
        try{
            $request->request->add(['updated_by' =>auth()->user()->id]);
            $findRow = military_servicesModel::find($id);
            if($findRow){
                $findRow->update($request->except(['_token']));
                return redirect()->route('military_services')->with(['success'=>' تم تعديل نوع الخدمة العسكرية بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('branches')->with(['fail'=>'لم يتم تعديل نوع الخدمة العسكرية بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = military_servicesModel::find($id);
            $status = $findRow->active == 0 ? 1 : 0;
            $findRow->update(['active'=>$status]);
            if($status == 0){
                return redirect()->route('military_services')->with(['fail'=>'تم الغاء تنشيط نوع الخدمة العسكرية بنجاح']);
            }elseif ($status == 1){
                return redirect()->route('military_services')->with(['success'=>'تم  تنشيط نوع الخدمة العسكرية بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('military_services')->with(['fail'=>'لم يتم تعديل نوع الخدمة العسكرية بنجاح']);
        }



    }

    public function delete($id){
        $findRow = military_servicesModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('military_services')->with(['success'=>'تم  حذف نوع الخدمة العسكرية بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('military_services')->with(['fail'=>'لم يتم حذف نوع الخدمة العسكرية لانه مفتوح علي النظام']);
        }
    }


    public function military_servicesSearch(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->inputSearch;
            $data=military_servicesModel::Where('name', 'like', '%' . $search . '%')->get();
            return view('military_services.ajaxSearch',compact('data'));
        }


    }
}
