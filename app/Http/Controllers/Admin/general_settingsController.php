<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\general_settingsRequest;
use App\Models\Admin\general_settingsModel;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class general_settingsController extends Controller
{
    public function index(){
        $data = general_settingsModel::all()->first();
        return view('general_settings.index',compact('data'));
    }

    public function edit(general_settingsRequest $request,$id){

        try {
            $update = general_settingsModel::find($id);
            if ($request->has('image')){
                $update->update($request->except(['image'=>uploadeImage('company',$request->image)]));
            }
            $update->update($request->except(['_token','image']));
                //      if done
            return redirect()->route('general_settings_view')->with(['success'=>'تم تعديل الاعدادات بنجاح']);
        }catch (Exception $exception){

        return redirect()->route('general_settings_view')->with(['fail'=>'لم يتم تعديل الاعدادات بنجاح']);
        }
    }

    public function edit_view($slug){
        $data = general_settingsModel::all()->where('company_name',$slug)->first();
        return view('general_settings.edit',compact('data'));
    }

   public function edit_rules(general_settingsRequest $request,$id){
       try {
           $update = general_settingsModel::find($id);
           $update->update($request->except(['_token']));
           //      if done
           return redirect()->route('general_settings_view')->with(['success'=>'تم تعديل القوانين  بنجاح']);
       }catch (Exception $exception){

           return redirect()->route('general_settings_view')->with(['fail'=>'لم يتم تعديل القوانين  بنجاح']);
       }
   }
}
