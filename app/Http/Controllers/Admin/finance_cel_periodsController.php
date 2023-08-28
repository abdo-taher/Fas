<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\finance_cel_periodsRequest;
use App\Models\Admin\finance_cel_periodsModel;
use Illuminate\Http\Request;

class finance_cel_periodsController extends Controller
{
    public function index($slug){
        $data = finance_cel_periodsModel::all()->where('FINANCE_YR',$slug);
        return view('finance_cel_periods.index',compact('data','slug'));
    }

    public function add(){
        return view('finance_cel_periodsModel.add');
    }
    public function addDone(finance_cel_periodsRequest $request){
        try{
            finance_cel_periodsModel::insert($request->except(['_token']));
            return redirect()->route('general_settings_view')->with(['success'=>'تم ضافة الشهور المالية بنجاح']);
        }catch (Exception $exception){
            return redirect()->route('general_settings_view')->with(['fail'=>'لم يتم ضافة الشهور المالية بنجاح']);
        }
    }
    public function edit($slug){
        $data = finance_cel_periodsModel::all()->where('company_name',$slug)->first();
        return view('finance_cel_periodsModel.edit',compact('data'));
    }
    public function editDone(finance_cel_periodsRequest $request,$id){

        try {
            $update = finance_cel_periodsModel::find($id);
            if ($request->has('image')){
                $update->update($request->except(['image'=>uploadeImage('company',$request->image)]));
            }
            $update->update($request->except(['_token','image']));
            //      if done
            return redirect()->route('general_settings_view')->with(['success'=>'تم تعديل الشهور الماليه بنجاح']);
        }catch (Exception $exception){

            return redirect()->route('general_settings_view')->with(['fail'=>'لم يتم تعديل الشهور الماليه بنجاح']);
        }
    }



    public function openOr(finance_cel_periodsRequest $request,$id){
        try {
            $update = finance_cel_periodsModel::find($id);
            $update->update($request->except(['_token']));
            //      if done
            return redirect()->route('general_settings_view')->with(['success'=>'تم تعديل القوانين  بنجاح']);
        }catch (Exception $exception){

            return redirect()->route('general_settings_view')->with(['fail'=>'لم يتم تعديل القوانين  بنجاح']);
        }
    }
}
