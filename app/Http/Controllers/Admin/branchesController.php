<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\branchesRequest;
use App\Models\Admin\branchesModel;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class branchesController extends Controller
{
    public function index(){
        $com_code = auth()->user()->company_code;
        $data = branchesModel::all()->where('com_code',$com_code);
        return view('branches.index',compact('data'));
    }

    public function add(){
        return view('branches.add');
    }

    public function addDone(branchesRequest $request){
        try {
            $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
            $insert = branchesModel::insert($request->except(['_token']));
            return redirect()->route('branches')->with(['success'=>'تم اضافة الفرع بنجاح']);
        }catch (Exception $exception){
            return redirect()->route('branches')->with(['fail'=>'لم تم اضافة الفرع بنجاح']);
        }
    }

    public function edit($slug){
        $data = branchesModel::all()->where('name',$slug);
        if ($data->com_code = auth()->user()->company_code){
            $data = $data->first();
            return view('branches.edit',compact('data','slug'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(branchesRequest $request , $id){
        try{
            $request->request->add(['updated_by' =>auth()->user()->id]);
            $findRow = branchesModel::find($id);
            if($findRow){
                $findRow->update($request->except(['_token']));
                return redirect()->route('branches')->with(['success'=>'تم تعديل الفرع بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('branches')->with(['fail'=>'لم يتم تعديل الفرع بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = branchesModel::find($id);
            $status = $findRow->active == 0 ? 1 : 0;
            $findRow->update(['active'=>$status]);
            if($status = 0){
                return redirect()->route('branches')->with(['success'=>'تم الغاء تنشيط الفرع بنجاح']);
            }elseif ($status = 1){
                return redirect()->route('branches')->with(['success'=>'تم  تنشيط الفرع بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('branches')->with(['fail'=>'لم يتم تعديل الفرع بنجاح']);
        }



    }

    public function delete($id){
        $findRow = branchesModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('branches')->with(['success'=>'تم  حذف الفرع بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('branches')->with(['fail'=>'لم يتم حذف الفرع لانه مفتوح علي النظام']);
        }
    }
}
