<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\driving_licensesRequest;
use App\Models\Admin\driving_licensesModel;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class driving_licensesController extends Controller
{
    public function index(){
        $com_code = auth()->user()->company_code;
        $data = driving_licensesModel::where('com_code',$com_code)->paginate(5);
        return view('driving_licenses.index',compact('data'));
    }

    public function add(){
        return view('driving_licenses.add');
    }

    public function addDone(driving_licensesRequest $request){
        try {
            $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
            driving_licensesModel::insert($request->except(['_token']));
            return redirect()->route('driving_licenses')->with(['success'=>'تم اضافة نوع رخصة القيادة العمل بنجاح']);


        }catch (Exception $exception){
            return redirect()->route('driving_licenses')->with(['fail'=>'لم يتم نوع رخصة القيادة العمل بنجاح']);
        }
    }

    public function edit($slug){
        $data = driving_licensesModel::all()->where('name',$slug);
        if ($data->com_code = auth()->user()->company_code){
            $data = $data->first();
            return view('driving_licenses.edit',compact('data'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(driving_licensesRequest $request , $id){
        try{
            $request->request->add(['updated_by' =>auth()->user()->id]);
            $findRow = driving_licensesModel::find($id);
            if($findRow){
                $findRow->update($request->except(['_token']));
                return redirect()->route('driving_licenses')->with(['success'=>' تم تعديل نوع رخصة القيادة العمل بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('branches')->with(['fail'=>'لم يتم تعديل نوع رخصة القيادة العمل بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = driving_licensesModel::find($id);
            $status = $findRow->active == 0 ? 1 : 0;
            $findRow->update(['active'=>$status]);
            if($status == 0){
                return redirect()->route('driving_licenses')->with(['fail'=>'تم الغاء تنشيط نوع رخصة القيادة العمل بنجاح']);
            }elseif ($status == 1){
                return redirect()->route('driving_licenses')->with(['success'=>'تم  تنشيط نوع رخصة القيادة العمل بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('driving_licenses')->with(['fail'=>'لم يتم تعديل نوع رخصة القيادة العمل بنجاح']);
        }



    }

    public function delete($id){
        $findRow = driving_licensesModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('driving_licenses')->with(['success'=>'تم  حذف نوع رخصة القيادة العمل بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('driving_licenses')->with(['fail'=>'لم يتم حذف نوع رخصة القيادة العمل لانه مفتوح علي النظام']);
        }
    }


    public function driving_licensesSearch(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->inputSearch;
            $data=driving_licensesModel::Where('name', 'like', '%' . $search . '%')->get();
            return view('driving_licenses.ajaxSearch',compact('data'));
        }


    }
}
