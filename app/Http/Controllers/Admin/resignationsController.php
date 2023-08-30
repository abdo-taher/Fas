<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\resignationsRequest;
use App\Models\Admin\resignationsModel;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class resignationsController extends Controller
{
    public function index(){
        $com_code = auth()->user()->company_code;
        $data = resignationsModel::where('com_code',$com_code)->paginate(5);
        return view('resignations.index',compact('data'));
    }

    public function add(){
        return view('resignations.add');
    }

    public function addDone(resignationsRequest $request){
        try {
            $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
            resignationsModel::insert($request->except(['_token']));
            return redirect()->route('resignations')->with(['success'=>'تم اضافة نوع ترك العمل بنجاح']);


        }catch (Exception $exception){
            return redirect()->route('resignations')->with(['fail'=>'لم تم نوع ترك العمل بنجاح']);
        }
    }

    public function edit($slug){
        $data = resignationsModel::all()->where('name',$slug);
        if ($data->com_code = auth()->user()->company_code){
            $data = $data->first();
            return view('resignations.edit',compact('data'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(resignationsRequest $request , $id){
        try{
            $request->request->add(['updated_by' =>auth()->user()->id]);
            $findRow = resignationsModel::find($id);
            if($findRow){
                $findRow->update($request->except(['_token']));
                return redirect()->route('resignations')->with(['success'=>' تم تعديل نوع ترك العمل بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('branches')->with(['fail'=>'لم يتم تعديل نوع ترك العمل بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = resignationsModel::find($id);
            $status = $findRow->active == 0 ? 1 : 0;
            $findRow->update(['active'=>$status]);
            if($status == 0){
                return redirect()->route('resignations')->with(['fail'=>'تم الغاء تنشيط نوع ترك العمل بنجاح']);
            }elseif ($status == 1){
                return redirect()->route('resignations')->with(['success'=>'تم  تنشيط نوع ترك العمل بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('resignations')->with(['fail'=>'لم يتم تعديل نوع ترك العمل بنجاح']);
        }



    }

    public function delete($id){
        $findRow = resignationsModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('resignations')->with(['success'=>'تم  حذف نوع ترك العمل بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('resignations')->with(['fail'=>'لم يتم حذف نوع ترك العمل لانه مفتوح علي النظام']);
        }
    }


    public function resignationsSearch(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->inputSearch;
            $data=resignationsModel::Where('name', 'like', '%' . $search . '%')->get();
            return view('resignations.ajaxSearch',compact('data'));
        }


    }
}
