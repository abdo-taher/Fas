<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\job_categorieRequest;
use App\Models\Admin\departmentModel;
use App\Models\Admin\job_categorieModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class job_categorieController extends Controller

{
    public function index(){
        $com_code = auth()->user()->company_code;
        $data = job_categorieModel::where('com_code',$com_code)->paginate(5);
        $departement = departmentModel::all();
        return view('job_categries.index',compact('data','departement'));
    }

    public function add(){
        $departement = departmentModel::all();
        return view('job_categries.add',compact('departement'));
    }

    public function addDone(job_categorieRequest $request){
        try {
                $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
                job_categorieModel::insert($request->except(['_token']));
                return redirect()->route('job_categories')->with(['success'=>'تم اضافة الوظيفة بنجاح']);
        }catch (Exception $exception){
            return redirect()->route('job_categories')->with(['fail'=>'لم تم اضافة الوظيفة بنجاح']);
        }
    }

    public function edit($slug){
        $data = job_categorieModel::all()->where('name',$slug);
        if ($data->com_code = auth()->user()->company_code){
            $data = $data->first();
            $departement = departmentModel::all();
            return view('job_categries.edit',compact('data','departement'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(job_categorieRequest $request , $id){
        try{
            $request->request->add(['updated_by' =>auth()->user()->id]);
            $findRow = job_categorieModel::find($id);
            if($findRow){
                $findRow->update($request->except(['_token']));
                return redirect()->route('job_categories')->with(['success'=>' تم تعديل الوظيفة بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('job_categories')->with(['fail'=>'لم يتم تعديل الوظيفة بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = job_categorieModel::find($id);
            $status = $findRow->active == 0 ? 1 : 0;
            $findRow->update(['active'=>$status]);
            if($status == 0){
                return redirect()->route('job_categories')->with(['fail'=>'تم الغاء تنشيط الوظيفة بنجاح']);
            }elseif ($status == 1){
                return redirect()->route('job_categories')->with(['success'=>'تم  تنشيط الوظيفة بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('job_categories')->with(['fail'=>'لم يتم تعديل الوظيفة بنجاح']);
        }



    }

    public function delete($id){
        $findRow = job_categorieModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('job_categories')->with(['success'=>'تم  حذف الفترة بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('job_categories')->with(['fail'=>'لم يتم حذف الوظيفة لانها مفتوحه علي النظام']);
        }
    }


    public function ajaxSearch(Request $request)
    {
        if ($request->ajax()) {
            $searchInput = $request->inputSearch;
            $searchSelect = $request->selectSearch;
            if (isset($searchInput)){
                $data = job_categorieModel::Where('name', 'like', '%' . $searchInput . '%')->get();
            }elseif (isset($searchSelect)){
                if ($searchSelect == 0){
                    $data=job_categorieModel::all();
                }else{
                $data=job_categorieModel::Where('departments_id',$searchSelect)->get();
                }
            }



            return view('job_categries.ajaxSearch',compact('data'));
        }

    }


}
