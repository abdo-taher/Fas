<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\graduation_estimatesRequest;
use App\Models\Admin\graduation_estimatesModel;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class graduation_estimatesController extends Controller
{
    public function index(){
        $com_code = auth()->user()->company_code;
        $data = graduation_estimatesModel::where('com_code',$com_code)->paginate(5);
        return view('graduation_estimates.index',compact('data'));
    }

    public function add(){
        return view('graduation_estimates.add');
    }

    public function addDone(graduation_estimatesRequest $request){
        try {
            $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
            graduation_estimatesModel::insert($request->except(['_token']));
            return redirect()->route('graduation_estimates')->with(['success'=>'تم اضافة نوع التقدير  بنجاح']);


        }catch (Exception $exception){
            return redirect()->route('graduation_estimates')->with(['fail'=>'لم يتم نوع التقدير  بنجاح']);
        }
    }

    public function edit($slug){
        $data = graduation_estimatesModel::all()->where('name',$slug);
        if ($data->com_code = auth()->user()->company_code){
            $data = $data->first();
            return view('graduation_estimates.edit',compact('data'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(graduation_estimatesRequest $request , $id){
        try{
            $request->request->add(['updated_by' =>auth()->user()->id]);
            $findRow = graduation_estimatesModel::find($id);
            if($findRow){
                $findRow->update($request->except(['_token']));
                return redirect()->route('graduation_estimates')->with(['success'=>' تم تعديل نوع التقدير  بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('branches')->with(['fail'=>'لم يتم تعديل نوع التقدير  بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = graduation_estimatesModel::find($id);
            $status = $findRow->active == 0 ? 1 : 0;
            $findRow->update(['active'=>$status]);
            if($status == 0){
                return redirect()->route('graduation_estimates')->with(['fail'=>'تم الغاء تنشيط نوع التقدير  بنجاح']);
            }elseif ($status == 1){
                return redirect()->route('graduation_estimates')->with(['success'=>'تم  تنشيط نوع التقدير  بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('graduation_estimates')->with(['fail'=>'لم يتم تعديل نوع التقدير  بنجاح']);
        }



    }

    public function delete($id){
        $findRow = graduation_estimatesModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('graduation_estimates')->with(['success'=>'تم  حذف نوع التقدير  بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('graduation_estimates')->with(['fail'=>'لم يتم حذف نوع التقدير  لانه مفتوح علي النظام']);
        }
    }


    public function graduation_estimatesSearch(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->inputSearch;
            $data=graduation_estimatesModel::Where('name', 'like', '%' . $search . '%')->get();
            return view('graduation_estimates.ajaxSearch',compact('data'));
        }


    }
}
