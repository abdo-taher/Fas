<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\religionsRequest;
use App\Models\Admin\religionsModel;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class religionsController extends Controller
{
    public function index(){
        $com_code = auth()->user()->company_code;
        $data = religionsModel::where('com_code',$com_code)->paginate(5);
        return view('religions.index',compact('data'));
    }

    public function add(){
        return view('religions.add');
    }

    public function addDone(religionsRequest $request){
        try {
            $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
            religionsModel::insert($request->except(['_token']));
            return redirect()->route('religions')->with(['success'=>'تم اضافة نوع الديانة العمل بنجاح']);


        }catch (Exception $exception){
            return redirect()->route('religions')->with(['fail'=>'لم يتم نوع الديانة العمل بنجاح']);
        }
    }

    public function edit($slug){
        $data = religionsModel::all()->where('name',$slug);
        if ($data->com_code = auth()->user()->company_code){
            $data = $data->first();
            return view('religions.edit',compact('data'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(religionsRequest $request , $id){
        try{
            $request->request->add(['updated_by' =>auth()->user()->id]);
            $findRow = religionsModel::find($id);
            if($findRow){
                $findRow->update($request->except(['_token']));
                return redirect()->route('religions')->with(['success'=>' تم تعديل نوع الديانة العمل بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('branches')->with(['fail'=>'لم يتم تعديل نوع الديانة العمل بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = religionsModel::find($id);
            $status = $findRow->active == 0 ? 1 : 0;
            $findRow->update(['active'=>$status]);
            if($status == 0){
                return redirect()->route('religions')->with(['fail'=>'تم الغاء تنشيط نوع الديانة العمل بنجاح']);
            }elseif ($status == 1){
                return redirect()->route('religions')->with(['success'=>'تم  تنشيط نوع الديانة العمل بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('religions')->with(['fail'=>'لم يتم تعديل نوع الديانة العمل بنجاح']);
        }



    }

    public function delete($id){
        $findRow = religionsModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('religions')->with(['success'=>'تم  حذف نوع الديانة العمل بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('religions')->with(['fail'=>'لم يتم حذف نوع الديانة العمل لانه مفتوح علي النظام']);
        }
    }


    public function religionsSearch(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->inputSearch;
            $data=religionsModel::Where('name', 'like', '%' . $search . '%')->get();
            return view('religions.ajaxSearch',compact('data'));
        }


    }
}
