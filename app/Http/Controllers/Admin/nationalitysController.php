<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\nationalitysRequest;
use App\Models\Admin\nationalitysModel;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class nationalitysController extends Controller
{
    public function index(){
        $com_code = auth()->user()->company_code;
        $data = nationalitysModel::where('com_code',$com_code)->paginate(5);
        return view('nationalitys.index',compact('data'));
    }

    public function add(){
        return view('nationalitys.add');
    }

    public function addDone(nationalitysRequest $request){
        try {
            $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
            nationalitysModel::insert($request->except(['_token']));
            return redirect()->route('nationalitys')->with(['success'=>'تم اضافة الجنسية بنجاح']);


        }catch (Exception $exception){
            return redirect()->route('nationalitys')->with(['fail'=>'لم تم الجنسية بنجاح']);
        }
    }

    public function edit($slug){
        $data = nationalitysModel::all()->where('name',$slug);
        if ($data->com_code = auth()->user()->company_code){
            $data = $data->first();
            return view('nationalitys.edit',compact('data'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(nationalitysRequest $request , $id){
        try{
            $request->request->add(['updated_by' =>auth()->user()->id]);
            $findRow = nationalitysModel::find($id);
            if($findRow){
                $findRow->update($request->except(['_token']));
                return redirect()->route('nationalitys')->with(['success'=>' تم تعديل الجنسية بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('branches')->with(['fail'=>'لم يتم تعديل الجنسية بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = nationalitysModel::find($id);
            $status = $findRow->active == 0 ? 1 : 0;
            $findRow->update(['active'=>$status]);
            if($status == 0){
                return redirect()->route('nationalitys')->with(['fail'=>'تم الغاء تنشيط الجنسية بنجاح']);
            }elseif ($status == 1){
                return redirect()->route('nationalitys')->with(['success'=>'تم  تنشيط الجنسية بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('nationalitys')->with(['fail'=>'لم يتم تعديل الجنسية بنجاح']);
        }



    }

    public function delete($id){
        $findRow = nationalitysModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('nationalitys')->with(['success'=>'تم  حذف الجنسية بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('nationalitys')->with(['fail'=>'لم يتم حذف الجنسية لانه مفتوح علي النظام']);
        }
    }


    public function nationalitysSearch(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->inputSearch;
            $data=nationalitysModel::Where('name', 'like', '%' . $search . '%')->get();
            return view('nationalitys.ajaxSearch',compact('data'));
        }


    }
}
