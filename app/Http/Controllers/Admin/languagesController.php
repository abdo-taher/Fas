<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\languagesRequest;
use App\Models\Admin\languagesModel;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class languagesController extends Controller
{
    public function index(){
        $com_code = auth()->user()->company_code;
        $data = languagesModel::where('com_code',$com_code)->paginate(5);
        return view('languages.index',compact('data'));
    }

    public function add(){
        return view('languages.add');
    }

    public function addDone(languagesRequest $request){
        try {
            $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
            languagesModel::insert($request->except(['_token']));
            return redirect()->route('languages')->with(['success'=>'تم اضافة نوع اللغة العمل بنجاح']);


        }catch (Exception $exception){
            return redirect()->route('languages')->with(['fail'=>'لم يتم نوع اللغة العمل بنجاح']);
        }
    }

    public function edit($slug){
        $data = languagesModel::all()->where('name',$slug);
        if ($data->com_code = auth()->user()->company_code){
            $data = $data->first();
            return view('languages.edit',compact('data'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(languagesRequest $request , $id){
        try{
            $request->request->add(['updated_by' =>auth()->user()->id]);
            $findRow = languagesModel::find($id);
            if($findRow){
                $findRow->update($request->except(['_token']));
                return redirect()->route('languages')->with(['success'=>' تم تعديل نوع اللغة العمل بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('branches')->with(['fail'=>'لم يتم تعديل نوع اللغة العمل بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = languagesModel::find($id);
            $status = $findRow->active == 0 ? 1 : 0;
            $findRow->update(['active'=>$status]);
            if($status == 0){
                return redirect()->route('languages')->with(['fail'=>'تم الغاء تنشيط نوع اللغة العمل بنجاح']);
            }elseif ($status == 1){
                return redirect()->route('languages')->with(['success'=>'تم  تنشيط نوع اللغة العمل بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('languages')->with(['fail'=>'لم يتم تعديل نوع اللغة العمل بنجاح']);
        }



    }

    public function delete($id){
        $findRow = languagesModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('languages')->with(['success'=>'تم  حذف نوع اللغة العمل بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('languages')->with(['fail'=>'لم يتم حذف نوع اللغة العمل لانه مفتوح علي النظام']);
        }
    }


    public function languagesSearch(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->inputSearch;
            $data=languagesModel::Where('name', 'like', '%' . $search . '%')->get();
            return view('languages.ajaxSearch',compact('data'));
        }


    }
}
