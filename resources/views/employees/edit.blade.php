@extends('layouts.blade')

@section('title')
    تعديل موظف
@endsection

@section('employees_add')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">تعديل بيانات  {{$allData['data']['emp_name']}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item"><a href="{{route('employees')}}">قائمة الموظفين</a></li>
                            <li class="breadcrumb-item active">تعديل</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <form action="{{route('employees_editDone',$allData['data']['id'])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <div class="card">
                    <div id="card-header" class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#personal_data" data-toggle="tab">البيانات الشخصية</a></li>
                            <li class="nav-item"><a class="nav-link" href="#functional_data"  data-toggle="tab">البيانات الوظيفية</a></li>
                            <li class="nav-item"><a id="Ok" class="nav-link" href="#additional_data" data-toggle="tab">البيانات الاضافية</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div  class="tab-pane active" id="personal_data">
                                <div class="row" >
                                    <div class="form-group col-md-8">
                                        <label> اسم الموظف كاملا</label>
                                        <input name="emp_name" type="text" class="form-control" value="{{$allData['data']['emp_name']}}" >
                                        @error('emp_name')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>كود بصمة الموظف</label>
                                        <input name="fingerprint_code" type="text" class="form-control" value="{{$allData['data']['fingerprint_code']}}" >
                                        @error('fingerprint_code')
                                        <div  class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>نوع الجنس</label>
                                        <select name="emp_gender" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option {{$allData['data']['emp_gender']== 0 ?'selected' : ''}} value="0">ذكر</option>
                                            <option {{$allData['data']['emp_gender']== 1 ?'selected' : ''}} value="1">انثي</option>

                                        </select>
                                        @error('emp_gender')
                                        <div  class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3" >
                                        <label>الحالة الاجتماعية</label>
                                        <select name="marital_status_id" id="marital_status_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option>اختر النوع</option>
                                            @if(isset($allData['marital_status']))
                                                @foreach($allData['marital_status'] as $var)
                                                    <option {{$allData['data']['marital_status_id'] == $var->id ? 'selected' : ''}} value="{{$var->id}}">{{$var->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('marital_status_id')
                                        <div  class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3" >
                                        <label>نوع المؤهل الدراسي</label>
                                        <select name="qualif_type_id" id="qualif_type_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option>اختر النوع</option>
                                            @if(isset($allData['qualif_type']))
                                                @foreach($allData['qualif_type'] as $var)
                                                    <option {{$allData['data']['qualif_type_id'] == $var->id ? 'selected' : ''}} value="{{$var->id}}">{{$var->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('qualif_type_id')
                                        <div  class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3" id="qualifications_id">
                                        <label>المؤهل الدراسي</label>
                                        <select name="Qualifications_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            @if($allData['data']['Qualifications_id'])
                                                @if($allData['qualification'])
                                                    @foreach($allData['qualification'] as $var)
                                                        @if($var->id == $allData['data']['Qualifications_id'])
                                                            <option  value="{{$var->id}}">{{$var->name}}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        </select>
                                        @error('Qualifications_id')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>تخصص المؤهل</label>
                                        <input name="Graduation_specialization" type="text" class="form-control" value="{{$allData['data']['Graduation_specialization']}}" >
                                        @error('Graduation_specialization')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>سنة التخرج</label>
                                        <input name="Qualifications_year" type="date" class="form-control" value="{{$allData['data']['Qualifications_year']}}" >
                                        @error('Qualifications_year')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>تقدير التخرج</label>
                                        <select name="graduation_estimate_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option>اختر النوع</option>
                                            @if(isset($allData['graduation_estimates']))
                                                @foreach($allData['graduation_estimates'] as $var)
                                                    <option {{$allData['data']['graduation_estimate_id'] == $var->id ? 'selected' : ''}} value="{{$var->id}}">{{$var->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('Qualifications_year')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>تاريخ الميلاد</label>
                                        <input name="brith_date" type="date" class="form-control" value="{{$allData['data']['brith_date']}}">
                                        @error('brith_date')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>رقم بطاقة الهوية</label>
                                        <input name="emp_national_idenity" type="number" class="form-control" value="{{$allData['data']['emp_national_idenity']}}" >
                                        @error('Qualifications_year')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>مركز اصدار الهوية</label>
                                        <input name="emp_identityPlace" type="text" class="form-control" value="{{$allData['data']['emp_identityPlace']}}" >
                                        @error('emp_identityPlace')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>تاريخ انتهاء بطاقة الهوية</label>
                                        <input name="emp_end_identityIDate" type="date" class="form-control" value="{{$allData['data']['emp_end_identityIDate']}}" >
                                        @error('emp_end_identityIDate')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>فصيلة الدم</label>
                                        <select name="blood_type_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option>اختر النوع</option>
                                            @if(isset($allData['blood_types']))
                                                @foreach($allData['blood_types'] as $var)
                                                    <option {{$allData['data']['blood_type_id'] == $var->id ? 'selected' : ''}} value="{{$var->id}}">{{$var->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('blood_type_id')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>الجنسية</label>
                                        <select name="emp_nationality_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option value="0">-- اختر الجنسية --</option>
                                            @if(isset($allData['nationalitys']))
                                                @foreach($allData['nationalitys'] as $var)
                                                    <option {{$allData['data']['emp_nationality_id'] == $var->id ? 'selected' : ''}} value="{{$var->id}}">{{$var->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('emp_nationality_id')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>الديانة</label>
                                        <select name="religion_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option>اختر الديانة</option>
                                            @if(isset($allData['religions']))
                                                @foreach($allData['religions'] as $var)
                                                    <option {{$allData['data']['religion_id'] == $var->id ? 'selected' : ''}} value="{{$var->id}}">{{$var->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('religion_id')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3" >
                                        <label>عنوان الاقامة الحالي</label>
                                        <input name="residence_address" type="text" class="form-control" value="{{$allData['data']['residence_address']}}" >
                                        @error('residence_address')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4" id="countrys">
                                        <label>الدول التابع لها</label>
                                        <select name="country_id" id="country_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option value="0">اختر الدولة</option>
                                            @if(isset($allData['countrys']))
                                                @foreach($allData['countrys'] as $var)
                                                    <option {{$allData['data']['country_id'] == $var->id ? 'selected' : ''}} value="{{$var->id}}">{{$var->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('country_id')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4" id="governorates">
                                        <label>المحافظات</label>
                                        <select name="governorate_id" id="governorate_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            @if($allData['data']['governorate_id'])
                                                @if($allData['governorates'])
                                                    @foreach($allData['governorates'] as $var)
                                                        @if($var->id ==$allData['data']['governorate_id'])
                                                            <option {{$allData['data']['governorate_id'] == $var->id ? 'selected' : ''}} value="{{$var->id}}">{{$var->name}}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        </select>
                                        @error('governorate_id')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4" id="centers">
                                        <label>المدينة / المركز</label>
                                        <select name="center_id" id="center_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            @if($allData['data']['center_id'])
                                                @if($allData['centers'])
                                                    @foreach($allData['centers'] as $var)
                                                        @if($var->id == $allData['data']['center_id'])
                                                            <option value="{{$var->id}}">{{$var->name}}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        </select>
                                        @error('center_id')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6" >
                                        <label>البريد الاليكتروني</label>
                                        <input name="emp_email" type="email" class="form-control" value="{{$allData['data']['emp_email']}}" >
                                        @error('emp_email')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3" >
                                        <label>هاتف العمل</label>
                                        <input name="emp_work_tel" type="tel" class="form-control" value="{{$allData['data']['emp_work_tel']}}">
                                        @error('emp_work_tel')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3" >
                                        <label>هاتف المنزل</label>
                                        <input name="emp_home_tel" type="tel" class="form-control" value="{{$allData['data']['emp_home_tel']}}">
                                        @error('emp_home_tel')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3" >
                                        <label>حاله الخدمة العسكرية</label>
                                        <select name="military_services_id" id="military_service_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option value="0" >اختر النوع</option>
                                            @if(isset($allData['military_services']))
                                                @foreach($allData['military_services'] as $var)
                                                    <option {{$allData['data']['military_services_id'] == $var->id ? 'selected' : ''}} value="{{$var->id}}">{{$var->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('military_services_id')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div id="one" class="col-md-12 row">
                                        <div class="form-group col-md-4" >
                                            <label>تاريخ بداية الخدمة</label>
                                            <input name="emp_military_date_from" type="date" class="form-control" value="{{$allData['data']['emp_military_date_from']}}">
                                            @error('emp_military_date_from')
                                            <div class="form-control bg-danger text-center">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4" >
                                            <label>تاريخ نهاية الخدمة</label>
                                            <input name="emp_military_date_to" type="date" class="form-control" value="{{$allData['data']['emp_military_date_to']}}">
                                            @error('emp_military_date_to')
                                            <div class="form-control bg-danger text-center">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4" >
                                            <label>السلاح الذي خدم به</label>
                                            <input name="emp_military_wepon" type="text" class="form-control" value="{{$allData['data']['emp_military_wepon']}}">
                                            @error('emp_military_wepon')
                                            <div class="form-control bg-danger text-center">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="two" class="col-md-12 row">
                                        <div class="form-group col-md-6" >
                                            <label>تاريخ الاعفاء</label>
                                            <input name="exemption_date" type="date" class="form-control" value="{{$allData['data']['exemption_date']}}">
                                            @error('exemption_date')
                                            <div class="form-control bg-danger text-center">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6" >
                                            <label>سبب الحصول علي الاعفاء</label>
                                            <input name="exemption_reason" type="text" class="form-control" value="{{$allData['data']['exemption_reason']}}">
                                            @error('exemption_reason')
                                            <div class="form-control bg-danger text-center">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="three" class="col-md-12 row" >
                                        <div class="form-group col-md-6" >
                                            <label> تاريخ بدايةالتاجيل</label>
                                            <input name="emp_delay_date_from" type="date" class="form-control" value="{{$allData['data']['emp_delay_date_from']}}">
                                            @error('emp_delay_date_from')
                                            <div class="form-control bg-danger text-center">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6" >
                                            <label> تاريخ نهايةالتاجيل</label>
                                            <input name="emp_delay_date_to" type="date" class="form-control" value="{{$allData['data']['emp_delay_date_to']}}">
                                            @error('emp_delay_date_to')
                                            <div class="form-control bg-danger text-center">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>هل له رخصة قيادة</label>
                                        <select name="does_has_Driving_License" id="check_driving_licenses" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option {{$allData['data']['does_has_Driving_License'] == 0 ? 'selected' : ''}} value="0">لا</option>
                                            <option {{$allData['data']['does_has_Driving_License'] == 1 ? 'selected' : ''}} value="1">نعم</option>
                                        </select>
                                        @error('does_has_Driving_License')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div id="driving_licenses_yes" class="col-md-12 row">
                                        <div class="form-group col-md-6" >
                                            <label>رقم رخصة القيادة</label>
                                            <input name="driving_License_degree" type="number" class="form-control" value="{{$allData['data']['driving_License_degree']}}">
                                            @error('driving_License_degree')
                                            <div class="form-control bg-danger text-center">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6" id="countrys">
                                            <label>نوع رخصة القيادة</label>
                                            <select name="driving_license_id" id="does_has_Driving_License" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                @if(isset($allData['driving_licenses']))
                                                    @foreach($allData['driving_licenses'] as $var)
                                                        <option {{$allData['data']['driving_license_id'] == $var->id ? 'selected' : ''}} value="{{$var->id}}">{{$var->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        @error('driving_license_id')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>هل له اقارب بالعمل</label>
                                        <select name="has_Relatives" id="has_Relatives" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option {{$allData['data']['has_Relatives'] == 0 ? 'selected' : ''}} value="0">لا</option>
                                            <option {{$allData['data']['has_Relatives'] == 1 ? 'selected' : ''}} value="1">نعم</option>
                                        </select>
                                        @error('has_Relatives')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div id="has_Relatives_yes" class="col-md-8 row">
                                        <div class="form-group col-md-12" >
                                            <label>تفاصيل الاقارب</label>
                                            <input name="Relatives_details" type="text" class="form-control" value="{{$allData['data']['Relatives_details']}}">
                                            @error('Relatives_details')
                                            <div class="form-control bg-danger text-center">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>هل يمتللك اعاقة</label>
                                        <select name="is_Disabilities_processes" id="is_Disabilities_processes" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option {{$allData['data']['is_Disabilities_processes'] == 0 ? 'selected' : ''}} value="0">لا</option>
                                            <option {{$allData['data']['is_Disabilities_processes'] == 1 ? 'selected' : ''}} value="1">نعم</option>
                                        </select>
                                        @error('is_Disabilities_processes')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div id="disabilities_processes_yes" class="col-md-8 row">
                                        <div class="form-group col-md-12" >
                                            <label>نوع الاعاقة</label>
                                            <select name="Disabilities_processes_id" id="Disabilities_processes_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                @if(isset($allData['disabilities_processes']))
                                                    @foreach($allData['disabilities_processes'] as $var)
                                                        <option {{$allData['data']['Disabilities_processes_id'] == $var->id ? 'selected' : ''}}  value="{{$var->id}}">{{$var->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('Disabilities_processes_id')
                                            <div class="form-control bg-danger text-center">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12" >
                                        <label>الملاحظات علي الموظف</label>
                                        <textarea name="notes" class="form-control">{{$allData['data']['notes']}}</textarea>
                                        @error('notes')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div  class="tab-pane" id="functional_data">
                                <div class="row" >
                                    <div class="form-group col-md-3">
                                        <label>تاريخ التعين</label>
                                        <input name="emp_start_date" type="date" class="form-control" value="{{$allData['data']["emp_start_date"]}}">
                                        @error('emp_start_date')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>الحالة الوظيفية</label>
                                        <select name="Functiona_status" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option {{$allData['data']['Functiona_status'] == 0 ? 'selected' : ''}} value="0">خارج الخدمة</option>
                                            <option {{$allData['data']['Functiona_status'] == 1 ? 'selected' : ''}} value="1">قائم باالعمل</option>
                                        </select>
                                        @error('Functiona_status')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>هل له حضور وانصراف</label>
                                        <select name="does_has_ateendance" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option {{$allData['data']['does_has_ateendance'] == 0 ? 'selected' : ''}} value="0">نعم</option>
                                            <option {{$allData['data']['does_has_ateendance'] == 1 ? 'selected' : ''}} value="1">لا</option>
                                        </select>
                                        @error('does_has_ateendance')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>الفرع التابع له</label>
                                        <select name="branch_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option value="0">-- اختر الفرع --</option>
                                            @if(isset($allData['branches']))
                                                @foreach($allData['branches'] as $var)
                                                    <option {{$allData['data']['branch_id'] == $var->id ? 'selected' : ''}} value="{{$var->id}}">{{$var->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('branch_id')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>الادارة التابع لها</label>
                                        <select name="emp_Departments_id" id="emp_Departments_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option value="0">-- اختر الادارة --</option>
                                            @if(isset($allData['departements']))
                                                @foreach($allData['departements'] as $var)
                                                    <option {{$allData['data']['emp_Departments_id'] == $var->id ? 'selected' : ''}} value="{{$var->id}}">{{$var->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('emp_Departments_id')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 " id="emp_jobs_id" >
                                        <label>نوع الوظيفة</label>
                                        <select name="emp_jobs_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            @if($allData['data']['emp_jobs_id'])
                                                @if($allData['job_categorie'])
                                                    @foreach($allData['job_categorie'] as $var)
                                                        @if($var->id == $allData['data']['emp_jobs_id'])
                                                            <option value="{{$var->id}}">{{$var->name}}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        </select>
                                        @error('emp_jobs_id')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>راتب الموظف</label>
                                        <input name="emp_sal" type="number" class="form-control" value="{{$allData['data']['emp_sal']}}" >
                                        @error('emp_sal')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div  class="form-group col-md-3 " >
                                        <label>نوع صرف الراتب</label>
                                        <select name="sal_cach_or_visa" class="form-control select2 select2-hidden-accessible" id="sal_cach_or_visa" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option {{$allData['data']["sal_cach_or_visa"] == 0 ? 'selected' : ''}} value="0">نقدي </option>
                                            <option {{$allData['data']["sal_cach_or_visa"] == 1 ? 'selected' : ''}} value="1">كاش</option>
                                        </select>
                                        @error('sal_cach_or_visa')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3" >
                                        <label>نوع العمل</label>
                                        <select name="shift_type" class="form-control select2 select2-hidden-accessible"  id="shift_type" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option {{$allData['data']["shift_type"] == 0 ? 'selected' : ''}} value="0">شفت ثابت</option>
                                            <option {{$allData['data']["shift_type"] == 1 ? 'selected' : ''}} value="1">شفت متغير</option>
                                        </select>
                                        @error('shift_type')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div  id="shift_type_id" class="form-group col-md-3" hidden>
                                        <label>نوع الشفت</label>
                                        @if($allData['shitfts_type'])
                                            <select name="shift_type_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                @foreach($allData['shitfts_type'] as $var)
                                                    <option {{$allData['data']['shift_type_id'] == $var->id ? "selected" : '' }} value="{{$var->id}}">{{$var->shift_detalis($var->id)}}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3" >
                                        <label>نوع الحافز</label>
                                        <select name="MotivationType" class="form-control select2 select2-hidden-accessible" id="motivationType" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option {{$allData['data']["MotivationType"] == 0 ? 'selected' : ''}} value="0">ثابت </option>
                                            <option {{$allData['data']["MotivationType"] == 1 ? 'selected' : ''}} value="1">متغير</option>
                                        </select>
                                        @error('MotivationType')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div id="Motivation_view" class="form-group col-md-3 " >
                                        <label>قيمة الحافز</label>
                                        <input name="Motivation" type="number" class="form-control" value="{{$allData['data']['Motivation']}}">
                                        @error('Motivation')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div id="ismedicalinsurance" class="form-group col-md-6 " >
                                        <label>هل له تامين طبي</label>
                                        <select name="ismedicalinsurance" class="form-control select2 select2-hidden-accessible" id="ismedicalinsurance" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option {{$allData['data']["ismedicalinsurance"] == 0 ? 'selected' : ''}} value="0">لا </option>
                                            <option {{$allData['data']["ismedicalinsurance"] == 1 ? 'selected' : ''}} value="1">نعم</option>
                                        </select>
                                        @error('ismedicalinsurance')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div id="medicalinsurancecutmonthely" class="form-group col-md-6 " >
                                        <label>قيمة خصم التامين الطبي في الشهر</label>
                                        <input name="medicalinsurancecutmonthely" type="number" class="form-control" value="{{$allData['data']['medicalinsurancecutmonthely']}}" >
                                        @error('medicalinsurancecutmonthely')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 "  >
                                        <label>هل له رصيد اجازات سنوي</label>
                                        <select name="is_active_for_Vaccation" class="form-control select2 select2-hidden-accessible" id="is_active_for_Vaccation" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option {{$allData['data']["is_active_for_Vaccation"] == 0 ? 'selected' : ''}} value="0">لا </option>
                                            <option {{$allData['data']["is_active_for_Vaccation"] == 1 ? 'selected' : ''}} value="1">نعم</option>
                                        </select>
                                        @error('is_active_for_Vaccation')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div id="Annual_leave_balance" class="form-group col-md-4 " >
                                        <label> رصيد اجازات سنوي</label>
                                        <input name="Annual_leave_balance" type="number" class="form-control" value="{{$allData['data']['Annual_leave_balance']}}">

                                        @error('Annual_leave_balance')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div  class="form-group col-md-4 " >
                                        <label>هل له بدلات ثابتة</label>
                                        <select name="Does_have_fixed_allowances" class="form-control select2 select2-hidden-accessible" id="Does_have_fixed_allowances" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option {{$allData['data']['Does_have_fixed_allowances'] == 0 ? 'selected' : ''}} value="0">لا </option>
                                            <option {{$allData['data']['Does_have_fixed_allowances'] == 1 ? 'selected' : ''}} value="1">نعم</option>
                                        </select>
                                        @error('Does_have_fixed_allowances')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div  class="form-group col-md-4 " >
                                        <label>تاريخ اضافة الموظف علي النظام</label>
                                        <input name="date_of_being_hired" type="date" class="form-control" value="{{$allData['data']['date_of_being_hired']}}">
                                        @error('date_of_being_hired')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div  class="tab-pane" id="additional_data">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>لغة الموظف</label>
                                        <select name="language_id" id="emp_Departments_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option value="0">-- اختر الادارة --</option>
                                            @if(isset($allData['languages']))
                                                @foreach($allData['languages'] as $var)
                                                    <option {{$allData['data']['emp_Departments_id'] == $var->id ? 'selected' : ''}} value="{{$var->id}}">{{$var->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('language_id')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>الاقامة الفعلية</label>
                                        <input name="residence_address" type="text" class="form-control" value="{{$allData['data']['residence_address']}}">
                                        @error('residence_address')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 row">
                                        <div class="form-group col-md-12">
                                            <label>هل الموظف اجنبي</label>
                                            <select name="is_forgin" class="form-control select2 select2-hidden-accessible" id="nationality_poll" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option {{$allData['data']["is_forgin"] == 0 ? 'selected' : ''}} value="0" >لا</option>
                                                <option {{$allData['data']["is_forgin"] == 1 ? 'selected' : ''}} value="1" >نعم</option>
                                            </select>
                                            @error('is_forgin')
                                            <div class="form-control bg-danger text-center">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="row col-md-12" id="poll_request" >
                                            <div class="form-group col-md-3">
                                                <label>اسم الكفيل</label>
                                                <input name="emp_cafel" type="text" class="form-control" value="{{$allData['data']['emp_cafel']}}">
                                                @error('emp_cafel')
                                                <div class="form-control bg-danger text-center">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>رقم الباسبور</label>
                                                <input name="emp_pasport_no" type="number" class="form-control" value="{{$allData['data']['emp_pasport_no']}}">
                                                @error('emp_pasport_no')
                                                <div class="form-control bg-danger text-center">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>مكان الباسبور</label>
                                                <input name="emp_pasport_from" type="text" class="form-control" value="{{$allData['data']['emp_pasport_from']}}">
                                                @error('emp_pasport_from')
                                                <div class="form-control bg-danger text-center">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>تاريخ انتهاء الباسبور</label>
                                                <input name="emp_pasport_exp" type="date" class="form-control" value="{{$allData['data']['emp_pasport_exp']}}">
                                                @error('emp_pasport_exp')
                                                <div class="form-control bg-danger text-center">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>شخص يمكن الوصول الية في الحالة الضروية</label>
                                        <input  type="text" class="form-control" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> هاتف هذا الشخص </label>
                                        <input name="urgent_person_details" type="text" class="form-control" value="{{$allData['data']['urgent_person_details']}}">
                                        @error('urgent_person_details')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>هل البيانات حساساه (للمديرين) مثلا ولاتظهر الا بصلاحيات خاصة	</label>
                                        <select name="is_Sensitive_manager_data" class="form-control select2 select2-hidden-accessible"  style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option {{$allData['data']["is_Sensitive_manager_data"] == 0 ? 'selected' : ''}} value="0">نعم </option>
                                            <option {{$allData['data']["is_Sensitive_manager_data"] == 1 ? 'selected' : ''}} value="1">لا</option>
                                        </select>
                                        @error('is_Sensitive_manager_data')
                                        <div class="form-control bg-danger text-center">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="form-group col-md-4 r">
                                            <label>هل لدي الموظف سيرة ذاتية</label>
                                            <select name="emp_cv_ask" class="form-control select2 select2-hidden-accessible" id="emp_cv_ask" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option !{{$allData['data']["emp_cv_ask"]  ? 'selected' : ''}} value="0">لا يوجد </option>
                                                <option {{$allData['data']["emp_cv_ask"]  ? 'selected' : ''}} value="1">يوجد</option>
                                            </select>
                                            @error('emp_cv_ask')
                                            <div class="form-control bg-danger text-center">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-8" id="emp_cv">
                                            <label>سيرة ذاتية للموظف</label>
                                            <input name="emp_cv" type="file" class="form-control" ">
                                            @error('emp_cv')
                                            <div class="form-control bg-danger text-center">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="form-group col-md-4">
                                            <label>هل لدي الموظف صورة هوية(هل تريد تحديث السيرة الذاتية للموظف)</label>
                                            <select name="emp_photo_ask" class="form-control select2 select2-hidden-accessible" id="emp_photo_ask" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option {{!$allData['data']["emp_photo"]  ? 'selected' : ''}} value="0">لا يوجد </option>
                                                <option {{$allData['data']["emp_photo"]  ? 'selected' : ''}} value="1">يوجد</option>
                                            </select>
                                            @error('emp_photo_ask')
                                            <div class="form-control bg-danger text-center">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-8" id="emp_photo">
                                            <label> صورة هوية الموظف(هل تريد تحديث صورة الموظف)</label>
                                            <input name="emp_photo" type="file" class="form-control" >
                                            @error('emp_photo')
                                            <div class="form-control bg-danger text-center">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>

                            </div>
                            <!-- /.card-header -->
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                    <div id="card-footer" class="card-footer">
                        <input id="submit" type="submit" class="btn btn-app btn-outline-success col-md-3 float-left" hidden  value="حفظ البيانات">
                    </div>
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </form>



        @endsection

        @section('searchScript')

            <script>
                $(document).ready(function (){


                    $(document).on('change','#country_id',function (){
                        ajaxSearch_country();
                    })
                    function ajaxSearch_country(){
                        var country_id = $('#country_id').val();

                        jQuery.ajax({
                            url:'{{route('employeesSearch')}}',
                            type:'post',
                            'dataType':'html',
                            cache:false,
                            data:{'_token':'{{csrf_token()}}',country_id} ,
                            success:function (data){
                                $('#governorates').html(data);
                            },
                            error:function (){
                                $('#centers').html('you have a Problem');
                            }
                        })
                    }
                    $(document).on('change','#governorate_id',function (){
                        ajaxSearch_governorate();
                    })
                    function ajaxSearch_governorate(){

                        var governorate_id = $('#governorate_id').val();
                        jQuery.ajax({
                            url:'{{route('employeesSearch')}}',
                            type:'post',
                            'dataType':'html',
                            cache:false,
                            data:{'_token':'{{csrf_token()}}',governorate_id} ,
                            success:function (data){
                                $('#centers').html(data);
                            },
                            error:function (){
                                $('#centers').html('you have a Problem');
                            }
                        })
                    }
                    $(document).on('change','#emp_Departments_id',function (){
                        ajaxSearch_Departments_job();
                    })
                    function ajaxSearch_Departments_job(){

                        var departments_job = $('#emp_Departments_id').val();
                        jQuery.ajax({
                            url:'{{route('employeesSearch')}}',
                            type:'post',
                            'dataType':'html',
                            cache:false,
                            data:{'_token':'{{csrf_token()}}',departments_job} ,
                            success:function (data){
                                $('#emp_jobs_id').html(data);
                            },
                            error:function (){
                                $('#emp_jobs_id').html('يوجد خطا ما');
                            }
                        })
                    }
                    $(document).on('change','#qualif_type_id',function (){
                        ajaxSearch_qualif_type();
                    })
                    function ajaxSearch_qualif_type(){

                        var qualif_type_id = $('#qualif_type_id').val();
                        jQuery.ajax({
                            url:'{{route('employeesSearch')}}',
                            type:'post',
                            'dataType':'html',
                            cache:false,
                            data:{'_token':'{{csrf_token()}}',qualif_type_id} ,
                            success:function (data){
                                $('#qualifications_id').html(data);
                            },
                            error:function (){
                                $('#qualifications_id').html('يوجد خطا ما');
                            }
                        })
                    }

                    $(document).on('change','#military_service_id',function (){
                        var military_service_id = $(this).val();
                        if (military_service_id == 1){
                            $('#empty').attr('hidden','');
                            $('#two').attr('hidden','');
                            $('#three').attr('hidden','');
                            $('#one').removeAttr('hidden');
                        }
                        if (military_service_id == 2){
                            $('#empty').attr('hidden','');
                            $('#one').attr('hidden','');
                            $('#three').attr('hidden','');
                            $('#two').removeAttr('hidden');
                        }
                        if (military_service_id == 3){
                            $('#empty').attr('hidden','');
                            $('#two').attr('hidden','');
                            $('#one').attr('hidden','');
                            $('#three').removeAttr('hidden');
                        }
                    })
                    var military_service_id = $('#military_service_id').val();
                    if (military_service_id == 0){
                        $('#one').attr('hidden','');
                        $('#two').attr('hidden','');
                        $('#three').attr('hidden','');
                        $('#empty').removeAttr('hidden');
                    }
                    if (military_service_id == 1){
                        $('#empty').attr('hidden','');
                        $('#two').attr('hidden','');
                        $('#three').attr('hidden','');
                        $('#one').removeAttr('hidden');
                    }
                    if (military_service_id == 2){
                        $('#empty').attr('hidden','');
                        $('#one').attr('hidden','');
                        $('#three').attr('hidden','');
                        $('#two').removeAttr('hidden');
                    }
                    if (military_service_id == 3){
                        $('#empty').attr('hidden','');
                        $('#two').attr('hidden','');
                        $('#one').attr('hidden','');
                        $('#three').removeAttr('hidden');
                    }
                    $(document).on('change','#check_driving_licenses',function (){
                        var check_driving = $(this).val();
                        if (check_driving == 1){
                            $('#driving_licenses_yes').attr('hidden','');
                        }
                        if (check_driving == 2){
                            $('#driving_licenses_yes').removeAttr('hidden');
                        }
                    })

                    // default view when request come back ^^^^

                    var check_driving  = $('#check_driving_licenses').val();
                    if(check_driving == 1){
                        $('#driving_licenses_yes').attr('hidden','');
                    }
                    if (check_driving == 2 ){
                        $('#driving_licenses_yes').removeAttr('hidden');
                    }
                    // __________________________________________

                    $(document).on('change','#has_Relatives',function (){
                        var has_Relatives = $(this).val();
                        if (has_Relatives == 1){
                            $('#has_Relatives_yes').attr('hidden','');
                        }
                        if (has_Relatives == 2){
                            $('#has_Relatives_yes').removeAttr('hidden');
                        }
                    })

                    // default view when request come back  ^^^^^

                    var has_Relatives  = $('#has_Relatives').val();
                    if(has_Relatives == 1){
                        $('#has_Relatives_yes').attr('hidden','');
                    }
                    if (has_Relatives == 2 ){
                        $('#has_Relatives_yes').removeAttr('hidden');
                    }
                    // __________________________________________

                    $(document).on('change','#is_Disabilities_processes',function (){
                        var Disabilities_processes = $(this).val();
                        if (Disabilities_processes == 1){
                            $('#disabilities_processes_yes').attr('hidden','');
                        }
                        if (Disabilities_processes == 2){
                            $('#disabilities_processes_yes').removeAttr('hidden');
                        }
                    })

                    // default view when request come back   ^^^^^^

                    var Disabilities_processes = $('#is_Disabilities_processes').val();
                    if (Disabilities_processes == 1){
                        $('#disabilities_processes_yes').attr('hidden','');
                    }
                    if (Disabilities_processes == 2){
                        $('#disabilities_processes_yes').removeAttr('hidden');
                    }
                    // __________________________________________

                    $(document).on('change','#motivationType',function (){
                        var MotivationType = $(this).val();

                        if (MotivationType == 0){
                            $('#Motivation_view').removeAttr('hidden');
                        }
                        if (MotivationType == 1){
                            $('#Motivation_view').attr('hidden','');
                        }
                    })
                    var MotivationType = $('#motivationType').val();

                    if (MotivationType == 0){
                        $('#Motivation_view').removeAttr('hidden');
                    }
                    if (MotivationType == 1){
                        $('#Motivation_view').attr('hidden','');
                    }
                    $(document).on('change','#shift_type',function (){
                        var shift_type = $(this).val();

                        if (shift_type == 0){
                            $('#shift_type_id').removeAttr('hidden');
                        }
                        if (shift_type == 1){
                            $('#shift_type_id').attr('hidden','');
                        }
                    })

                    // default view when request come back   ^^^^^^
                    var shift_type = $('#shift_type').val();

                    if (shift_type == 0){
                        $('#shift_type_id').removeAttr('hidden');
                    }
                    if (shift_type == 1){
                        $('#shift_type_id').attr('hidden','');
                    }
                    // --------------------------------------------

                    var MotivationType = $('#motivationType').val();

                    if (MotivationType == 0){
                        $('#Motivation_view').removeAttr('hidden');
                    }
                    if (MotivationType == 1){
                        $('#Motivation_view').removeAttr('hidden');
                        $('#Motivation_view').attr('hidden','');
                    }
                    // __________________________________________

                    $(document).on('change','#ismedicalinsurance',function (){
                        var ismedicalinsurance = $(this).val();

                        if (ismedicalinsurance == 0){
                            $('#medicalinsurancecutmonthely').show();
                        }
                        if (ismedicalinsurance == 1){
                            $('#medicalinsurancecutmonthely').hide();
                        }
                    })
                    $(document).on('change','#is_active_for_Vaccation',function (){
                        var is_active_for_Vaccation = $(this).val();

                        if (is_active_for_Vaccation == 0){
                            $('#Annual_leave_balance').show();
                        }
                        if (is_active_for_Vaccation == 1){
                            $('#Annual_leave_balance').hide();
                        }
                    })
                    $(document).on('change','#nationality_poll',function (){
                        var nationality_poll = $(this).val();

                        if (nationality_poll == 1){
                            $('#poll_request').removeAttr('hidden');
                        }
                        if (nationality_poll == 0){
                            $('#poll_request').attr('hidden','');
                        }
                    })
                    var pollRequest = $('#nationality_poll').val()
                    if (pollRequest == 0 ){
                        $('#poll_request').attr('hidden','')
                    }
                    if (nationality_poll == 1){
                        $('#poll_request').removeAttr('hidden');
                    }
                    $(document).on('change','#emp_cv_ask',function (){
                        var emp_cv_ask = $(this).val();

                        if (emp_cv_ask == 1){
                            $('#emp_cv').removeAttr('hidden');
                        }
                        if (emp_cv_ask == 0){
                            $('#emp_cv').attr('hidden','');
                        }
                    })

                    // default view when request come back

                    var empcv = $('#emp_cv_ask').val()
                    if (empcv == 0 ){
                        $('#emp_cv').attr('hidden','')
                    }
                    $(document).on('change','#emp_photo_ask',function (){
                        var emp_photo_ask = $(this).val();

                        if (emp_photo_ask == 1){
                            $('#emp_photo').removeAttr('hidden');
                        }
                        if (emp_photo_ask == 0){
                            $('#emp_photo').attr('hidden','');
                        }
                    })

                    // default view when request come back

                    var empphoto = $('#emp_photo_ask').val()
                    if (empphoto == 0 ){
                        $('#emp_photo').attr('hidden','')
                    }

                    $(document).on('click','#Ok',function (){

                        $('#submit').removeAttr('hidden');
                    })



                })

            </script>

@endsection
