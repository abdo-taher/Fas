<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\occasionsRequest;
use App\Models\Admin\occasionsModel;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class occasionsController extends Controller
{
    public function index(){
        $com_code = auth()->user()->company_code;
        $data = occasionsModel::where('com_code',$com_code)->paginate(5);
        return view('occasions.index',compact('data'));
    }

    public function add(){
        return view('occasions.add');
    }

    public function addDone(occasionsRequest $request){
        try {
            $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
            occasionsModel::insert($request->except(['_token']));
            return redirect()->route('occasions')->with(['success'=>'تم اضافة العطلة الرسمية بنجاح']);


        }catch (Exception $exception){
            return redirect()->route('occasions')->with(['fail'=>'لم تم العطلة الرسمية بنجاح']);
        }
    }

    public function edit($slug){
        $data = occasionsModel::all()->where('name',$slug);
        if ($data->com_code = auth()->user()->company_code){
            $data = $data->first();
            return view('occasions.edit',compact('data'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(occasionsRequest $request , $id){
        try{
            $request->request->add(['updated_by' =>auth()->user()->id]);
            $findRow = occasionsModel::find($id);
            if($findRow){
                $findRow->update($request->except(['_token']));
                return redirect()->route('occasions')->with(['success'=>' تم تعديل العطلة الرسمية بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('branches')->with(['fail'=>'لم يتم تعديل العطلة الرسمية بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = occasionsModel::find($id);
            $status = $findRow->active == 0 ? 1 : 0;
            $findRow->update(['active'=>$status]);
            if($status == 0){
                return redirect()->route('occasions')->with(['fail'=>'تم الغاء تنشيط العطلة الرسمية بنجاح']);
            }elseif ($status == 1){
                return redirect()->route('occasions')->with(['success'=>'تم  تنشيط العطلة الرسمية بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('occasions')->with(['fail'=>'لم يتم تعديل العطلة الرسمية بنجاح']);
        }



    }

    public function delete($id){
        $findRow = occasionsModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('occasions')->with(['success'=>'تم  حذف العطلة الرسمية بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('occasions')->with(['fail'=>'لم يتم حذف العطلة الرسمية لانها مفتوحه علي النظام']);
        }
    }


    public function occasionsSearch(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->inputSearch;
            $data=occasionsModel::Where('name', 'like', '%' . $search . '%')->get();
            return view('occasions.ajaxSearch',compact('data'));
        }


    }

}
