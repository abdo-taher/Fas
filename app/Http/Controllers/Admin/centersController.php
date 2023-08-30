<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\centersRequest;
use App\Models\Admin\centersModel;
use App\Models\Admin\governoratesModel;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class centersController extends Controller
{
    public function index(){
        $com_code = auth()->user()->company_code;
        $data = centersModel::where('com_code',$com_code)->paginate(5);
        $select = governoratesModel::all();
        return view('centers.index',compact('data','select'));
    }

    public function add(){
        $select = governoratesModel::all();
        return view('centers.add',compact('select'));
    }

    public function addDone(centersRequest $request){
        try {
            $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
            if ($request->governorate_id == 0){
                return redirect()->route('centers')->with(['fail'=>'الرجاء اختيار المحافظة التابع له المركز']);
            }
            centersModel::insert($request->except(['_token']));
            return redirect()->route('centers')->with(['success'=>'تم اضافة المركز العمل بنجاح']);


        }catch (Exception $exception){
            return redirect()->route('centers')->with(['fail'=>'لم يتم المركز العمل بنجاح']);
        }
    }

    public function edit($slug){
        $data = centersModel::all()->where('name',$slug);
        if ($data->com_code = auth()->user()->company_code){
            $data = $data->first();
            $select = governoratesModel::all();
            return view('centers.edit',compact('data','select'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(centersRequest $request , $id){
        try{
            $request->request->add(['updated_by' =>auth()->user()->id]);
            $findRow = centersModel::find($id);
            if($findRow){
                $findRow->update($request->except(['_token']));
                return redirect()->route('centers')->with(['success'=>' تم تعديل المركز العمل بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('branches')->with(['fail'=>'لم يتم تعديل المركز العمل بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = centersModel::find($id);
            $status = $findRow->active == 0 ? 1 : 0;
            $findRow->update(['active'=>$status]);
            if($status == 0){
                return redirect()->route('centers')->with(['fail'=>'تم الغاء تنشيط المركز العمل بنجاح']);
            }elseif ($status == 1){
                return redirect()->route('centers')->with(['success'=>'تم  تنشيط المركز العمل بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('centers')->with(['fail'=>'لم يتم تعديل المركز العمل بنجاح']);
        }



    }

    public function delete($id){
        $findRow = centersModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('centers')->with(['success'=>'تم  حذف المركز العمل بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('centers')->with(['fail'=>'لم يتم حذف المركز العمل لانه مفتوح علي النظام']);
        }
    }


    public function centersSearch(Request $request)
    {
        if ($request->ajax()) {
            $searchInput = $request->inputSearch;
            $searchSelect = $request->selectSearch;
            if (isset($searchInput)){
                $data = centersModel::Where('name', 'like', '%' . $searchInput . '%')->get();
            }elseif (isset($searchSelect)){
                if ($searchSelect == 0){
                    $data=centersModel::all();
                }else{
                    $data=centersModel::Where('governorate_id',$searchSelect)->get();
                }
            }
            return view('centers.ajaxSearch',compact('data'));
        }
    }
}
