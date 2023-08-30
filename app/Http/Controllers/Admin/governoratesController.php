<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\governoratesRequest;
use App\Models\Admin\countrysModel;
use App\Models\Admin\governoratesModel;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class governoratesController extends Controller
{
    public function index(){
        $com_code = auth()->user()->company_code;
        $select = countrysModel::all();
        $data = governoratesModel::where('com_code',$com_code)->paginate(5);
        return view('governorates.index',compact('data','select'));
    }

    public function add(){
        $select = countrysModel::all();
        return view('governorates.add',compact('select'));
    }

    public function addDone(governoratesRequest $request){
        try {

            $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
            if ($request->country_id == 0){
                return redirect()->route('governorates')->with(['fail'=>'الرجاء اختيار الدولة التابع لها المحافطة']);
            }
            governoratesModel::insert($request->except(['_token']));
            return redirect()->route('governorates')->with(['success'=>'تم اضافة المحافظة  بنجاح']);


        }catch (Exception $exception){
            return redirect()->route('governorates')->with(['fail'=>'لم يتم المحافظة  بنجاح']);
        }
    }

    public function edit($slug){
        $data = governoratesModel::all()->where('name',$slug);
        if ($data->com_code = auth()->user()->company_code){
            $data = $data->first();
            $select = countrysModel::all();
            return view('governorates.edit',compact('data','select'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(governoratesRequest $request , $id){
        try{
            $request->request->add(['updated_by' =>auth()->user()->id]);
            $findRow = governoratesModel::find($id);
            if($findRow){
                $findRow->update($request->except(['_token']));
                return redirect()->route('governorates')->with(['success'=>' تم تعديل المحافظة  بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('branches')->with(['fail'=>'لم يتم تعديل المحافظة  بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = governoratesModel::find($id);
            $status = $findRow->active == 0 ? 1 : 0;
            $findRow->update(['active'=>$status]);
            if($status == 0){
                return redirect()->route('governorates')->with(['fail'=>'تم الغاء تنشيط المحافظة  بنجاح']);
            }elseif ($status == 1){
                return redirect()->route('governorates')->with(['success'=>'تم  تنشيط المحافظة  بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('governorates')->with(['fail'=>'لم يتم تعديل المحافظة  بنجاح']);
        }



    }

    public function delete($id){
        $findRow = governoratesModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('governorates')->with(['success'=>'تم  حذف المحافظة  بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('governorates')->with(['fail'=>'لم يتم حذف المحافظة  لانه مفتوح علي النظام']);
        }
    }


    public function governoratesSearch(Request $request)
    {
        if ($request->ajax()) {
            $searchInput = $request->inputSearch;
            $searchSelect = $request->selectSearch;
            if (isset($searchInput)){
                $data = governoratesModel::Where('name', 'like', '%' . $searchInput . '%')->get();
            }elseif (isset($searchSelect)){
                if ($searchSelect == 0){
                    $data=governoratesModel::all();
                }else{
                    $data=governoratesModel::Where('country_id',$searchSelect)->get();
                }
            }

            return view('governorates.ajaxSearch',compact('data'));
        }


    }
}
