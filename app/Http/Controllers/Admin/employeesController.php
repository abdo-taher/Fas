<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\employeesRequest;
use App\Models\Admin\blood_typesModel;
use App\Models\Admin\branchesModel;
use App\Models\Admin\centersModel;
use App\Models\Admin\countrysModel;
use App\Models\Admin\departmentModel;
use App\Models\Admin\disabilities_processesModel;
use App\Models\Admin\driving_licensesModel;
use App\Models\Admin\employeesModel;
use App\Models\Admin\governoratesModel;
use App\Models\Admin\graduation_estimatesModel;
use App\Models\Admin\job_categorieModel;
use App\Models\Admin\languagesModel;
use App\Models\Admin\marital_statusModel;
use App\Models\Admin\military_servicesModel;
use App\Models\Admin\nationalitysModel;
use App\Models\Admin\qualif_typeModel;
use App\Models\Admin\qualificationModel;
use App\Models\Admin\religionsModel;
use App\Models\Admin\shitfts_typeModel;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class employeesController extends Controller
{
    public function index(){
        $com_code = auth()->user()->company_code;
        $data = employeesModel::where('com_code',$com_code)->paginate(5);
        return view('employees.index',compact('data',));
    }
    public function details($emp_code){
        $com_code = auth()->user()->company_code;
        $data = employeesModel::where('com_code',$com_code)->orWhere('employees_code',$emp_code)->first();
        return view('employees.details',compact('data',));
    }

    public function add(){
        $allData['departements'] = departmentModel::get(['id','name']);
        $allData['job_categorie'] = job_categorieModel::get(['id','name']);
        $allData['shitfts_type'] = shitfts_typeModel::all();
        $allData['branches'] =  branchesModel::get(['id','name']);
        $allData['qualif_type'] =  qualif_typeModel::get(['id','name']);
        $allData['qualification'] =  qualificationModel::get(['id','name']);
        $allData['graduation_estimates'] =  graduation_estimatesModel::get(['id','name']);
        $allData['blood_types'] =  blood_typesModel::get(['id','name']);
        $allData['nationalitys'] =  nationalitysModel::get(['id','name']);
        $allData['religions'] =  religionsModel::get(['id','name']);
        $allData['countrys'] = countrysModel::get(['id','name']);
        $allData['governorates'] = governoratesModel::get(['id','name']);
        $allData['centers'] = centersModel::get(['id','name']);
        $allData['military_services'] = military_servicesModel::get(['id','name']);
        $allData['marital_status'] = marital_statusModel::get(['id','name']);
        $allData['driving_licenses'] =driving_licensesModel::get(['id','name']);
        $allData['disabilities_processes'] =disabilities_processesModel::get(['id','name']);
        $allData['languages'] =languagesModel::get(['id','name']);
//        return $allData;
        return view('employees.add',compact('allData'));
    }

    public function addDone(employeesRequest $request){
        try {
            if ($request->has('emp_photo')){
               $request->emp_photo = uploadeImage('Photo',$request->emp_photo);
            }if ($request->has('emp_cv')){
               $request->emp_cv = uploadeFile('Cv',$request->emp_cv);
            }

            $employees_code = rand(000000000,999999999);
            $request->request->add(['employees_code'=>$employees_code]);
            $request->request->add(['com_code'=> auth()->user()->company_code , 'added_by' =>auth()->user()->id]);
            employeesModel::insert($request->except(['_token','emp_cv_ask','emp_photo_ask']));
            return redirect()->route('employees')->with(['success'=>'تم اضافة الموظف بنجاح']);


        }catch (Exception $exception){
            return redirect()->route('employees')->with(['fail'=>'لم يتم الموظف بنجاح']);
        }
    }

    public function edit($code){
        $data = employeesModel::all()->where('employees_code',$code);
        if ($data->com_code = auth()->user()->company_code){
            $allData['data'] = $data->first();;
            $allData['departements'] = departmentModel::get(['id','name']);
            $allData['job_categorie'] = job_categorieModel::get(['id','name']);
            $allData['shitfts_type'] = shitfts_typeModel::all();
            $allData['branches'] =  branchesModel::get(['id','name']);
            $allData['qualif_type'] =  qualif_typeModel::get(['id','name']);
            $allData['qualification'] =  qualificationModel::get(['id','name']);
            $allData['graduation_estimates'] =  graduation_estimatesModel::get(['id','name']);
            $allData['blood_types'] =  blood_typesModel::get(['id','name']);
            $allData['nationalitys'] =  nationalitysModel::get(['id','name']);
            $allData['religions'] =  religionsModel::get(['id','name']);
            $allData['countrys'] = countrysModel::get(['id','name']);
            $allData['governorates'] = governoratesModel::get(['id','name']);
            $allData['centers'] = centersModel::get(['id','name']);
            $allData['military_services'] = military_servicesModel::get(['id','name']);
            $allData['marital_status'] = marital_statusModel::get(['id','name']);
            $allData['driving_licenses'] =driving_licensesModel::get(['id','name']);
            $allData['disabilities_processes'] =disabilities_processesModel::get(['id','name']);
            $allData['languages'] =languagesModel::get(['id','name']);
            return view('employees.edit',compact('allData'));
        }else{
            return redirect()->back()->withErrors();
        }

    }

    public function editDone(employeesRequest $request , $id){
            try {
            $request->request->add(['updated_by' =>auth()->user()->id]);
                $update =  employeesModel::find($id);

                if ($request->has('emp_photo')){
                    $image = uploadeFile('Photo',$request->emp_photo);
                    $update->update(['emp_photo' => $image]);
                }if($request->has('emp_cv')) {
                    $cv = uploadeFile('Cv',$request->emp_cv);
                    $update->update(['emp_cv' => $cv]);
                }


               $update -> update($request->except(['_token','emp_cv_ask','emp_photo_ask','emp_photo','emp_cv']));
                return redirect()->route('employees')->with(['success'=>'تم تعديل الموظف بنجاح']);

        }catch (Exception $exception){
            return redirect()->route('branches')->with(['fail'=>'لم يتم تعديل الموظف بنجاح']);
        }
    }
    public function active($id){

        try{

            $findRow = employeesModel::find($id);
            $status = $findRow->Functiona_status == 0 ? 1 : 0;
            $findRow->update(['Functiona_status'=>$status]);
            if($status == 0){
                return redirect()->route('employees')->with(['fail'=>'تم الغاء تنشيط الموظف بنجاح']);
            }elseif ($status == 1){
                return redirect()->route('employees')->with(['success'=>'تم  تنشيط الموظف بنجاح']);
            }

        }catch (Exception $exception){
            return redirect()->route('employees')->with(['fail'=>'لم يتم تعديل الموظف بنجاح']);
        }



    }

    public function delete($id){
        $findRow = employeesModel::find($id);
        $checkActive = $findRow->active;
        if ($checkActive==0){
            $findRow->delete();
            return redirect()->route('employees')->with(['success'=>'تم  حذف الموظف بنجاح']);
        }elseif ($checkActive==1){
            return redirect()->route('employees')->with(['fail'=>'لم يتم حذف الموظف لانه مفتوح علي النظام']);
        }
    }


    public function employeesSearch(Request $request)
    {
        if ($request->ajax()) {
            if($request->governorate_id != null){
                $comeBack = 'centers';
                $search = $request->governorate_id;
                $data=centersModel::Where('governorate_id', $search )->get();
                return view('employees.ajaxSearch',compact('data','comeBack'));
            }
            if($request->country_id != null){
                $comeBack = 'governorates';
                $search = $request->country_id;
                $data=governoratesModel::Where('country_id', $search )->get();
                return view('employees.ajaxSearch',compact('data','comeBack'));
            }
            if($request->departments_job != null){
                $comeBack = 'emp_jobs_id';
                $search = $request->departments_job;
                $data=job_categorieModel::Where('departments_id', $search )->get();
                return view('employees.ajaxSearch',compact('data','comeBack'));
            }
            if($request->qualif_type_id != null){
                $comeBack = 'qualif_type';
                $search = $request->qualif_type_id;
                $data=qualificationModel::Where('qualif_id', $search )->get();
                return view('employees.ajaxSearch',compact('data','comeBack'));
            }

        }


    }
}
