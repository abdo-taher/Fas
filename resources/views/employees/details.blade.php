@extends('layouts.blade')

@section('title')
{{$data->emp_name}}
@endsection

@section('employees_detalis')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">تفاصيل بيانات الموظف</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item active">تفاصيل</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img style="width: 150px;height: 180px" class="profile-user-img img-fluid img-circle "  alt="User profile picture" src=
                                @if (isset($data->emp_photo))
                                    "{{asset('assets/image/users/'. $data->emp_photo)}}"
                                @else
                                    "{{asset('assets/image/users/default.png')}}"
                                @endif
                                >
                            </div>

                            <h3 class="profile-username text-center">{{$data->emp_name}}</h3>

                            <p class="text-muted text-center">{{$data->status()}}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>الوظيفة</b> <a class="float-right">{{$data->jobCategories->name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>اسم الادارة</b> <a class="float-right">{{$data->departments->name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>اسم الفرع</b> <a class="float-right">{{$data->branch->name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>كود الموظف</b> <a class="float-right">{{$data->employees_code}}</a>
                                </li>
                            </ul>

                            <a  class="btn btn-primary btn-block" href="{{route('employees_edit',$data->employees_code)}}" data-toggle="tab"><b>تعديل</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->

                <div class="col-md-9" style="max-height: 600px ; overflow-y: scroll">
                    @include('layouts.alert')
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">البيانات الشخصية</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">البيانات الوظيفية</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">البيانات الاضافية</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane text-center"   id="activity">
                                    @if(isset($data->emp_name))
                                    <!-- Post -->
                                    <div class="post">
                                        <table class="table table-bordered table-hover" style="width:100%">
                                            <tr>
                                                <th>اسم الموظف</th>
                                            </tr>
                                            <tr>
                                                <td>{{$data->emp_name}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- /.post -->
                                    @endif
                                    @if(isset($data->fingerprint_code))
                                    <!-- Post -->
                                    <div class="post">
                                        <table class="table table-bordered table-hover" style="width:100%">
                                            <tr>
                                                <th>كود بصمةالموظف</th>
                                            </tr>
                                            <tr>
                                                <td>{{$data->fingerprint_code}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- /.post -->
                                    @endif
                                    @if(isset($data->marital_status_id))
                                    <!-- Post -->
                                    <div class="post">
                                        <table class="table table-bordered table-hover" style="width:100%">
                                            <tr>
                                                <th>الحاله الاجتماعية للموظف</th>
                                            </tr>
                                            <tr>
                                                <td>{{$data->maritalStatus->name}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                        <!-- /.post -->
                                    @endif
                                    @if(isset($data->emp_gender))
                                    <!-- Post -->
                                    <div class="post">
                                        <table class="table table-bordered table-hover" style="width:100%">
                                            <tr>
                                                <th>نوع الموظف</th>
                                            </tr>
                                            <tr>
                                                <td>{{$data->emp_gender == 1 ? "ذكر" : "انثي" }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                        <!-- /.post -->
                                    @endif
                                    @if(isset($data->emp_email))
                                    <!-- Post -->
                                    <div class="post">
                                        <table class="table table-bordered table-hover" style="width:100%">
                                            <tr>
                                                <th>نوع الموظف</th>
                                            </tr>
                                            <tr>
                                                <td>{{$data->emp_email}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                        <!-- /.post -->
                                    @endif
                                    @if(isset($data->military_services_id) and $data->emp_gender == 1)
                                    <!-- Post -->
                                    <div class="post">
                                        <table class="table table-bordered table-hover" style="width:100%">
                                        <tr><th>الخدمة العسكرية</th></tr>
                                        <tr><td>
                                            @if($data->military_services_id ==1)
                                                <br>
                                                <table class="table table-bordered table-hover" style="width:100%">
                                                    <tr>
                                                        <td>تاريخ بداية الخدمة العسكرية</td>
                                                        <td>تاريخ نهاية الخدمة العسكرية</td>
                                                        <td>نوع سلاح الخدمة</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$data->emp_military_date_from}}</td>
                                                        <td>{{$data->emp_military_date_to}}</td>
                                                        <td>{{$data->emp_military_wepon}}</td>
                                                    </tr>
                                                </table>
                                            @endif
                                            @if($data->military_services_id ==2)
                                                <br>
                                                <table class="table table-bordered table-hover" style="width:100%">
                                                    <tr>
                                                        <td>تاريخ الاعفاء من الخدمة العسكرية</td>
                                                        <td>سبب الاعفاء من الخدمة العسكرية</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$data->exemption_date}}</td>
                                                        <td>{{$data->exemption_reason}}</td>
                                                    </tr>
                                                </table>
                                            @endif
                                            @if($data->military_services_id ==3)
                                                <br>
                                                <table class="table table-bordered table-hover" style="width:100%">
                                                    <tr>
                                                        <td>تاريخ بداية التاجيل من الخدمة العسكرية</td>
                                                        <td>تاريخ نهاية التاجيل من الخدمة العسكرية</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$data->emp_delay_date_from}}</td>
                                                        <td>{{$data->emp_delay_date_to}}</td>
                                                    </tr>
                                                </table>
                                            @endif

                                        </td>
                                        </tr>
                                        </table>
                                        <!-- /.post -->
                                    </div>
                                        @endif
                                    @if(isset($data->residence_address))
                                    <!-- Post -->
                                        <div class="post">
                                        <table class="table table-bordered table-hover" style="width:100%">
                                            <tr>
                                                <th>الاقامة الحالية للموظف</th>
                                            </tr>
                                            <tr>
                                                <td>{{$data->residence_address}}</td>
                                            </tr>
                                        </table>
                                        </div>
                                        <!-- /.post -->
                                    @endif
                                    @if(isset($data->blood_type_id))
                                    <!-- Post -->
                                        <div class="post">
                                            <table class="table table-bordered table-hover" style="width:100%">
                                                <tr>
                                                    <th>فصيلة دم  الموظف</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$data->bloodType->name}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- /.post -->
                                    @endif
                                    @if(isset($data->brith_date))
                                    <!-- Post -->
                                        <div class="post">
                                            <table class="table table-bordered table-hover" style="width:100%">
                                                <tr>
                                                    <th>فصيلة دم  الموظف</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$data->brith_date}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- /.post -->
                                    @endif
                                    @if(isset($data->religion_id))
                                    <!-- Post -->
                                    <div class="post">
                                        <table class="table table-bordered table-hover" style="width:100%">
                                            <tr>
                                                <th>ديانة الموظف</th>
                                            </tr>
                                            <tr>
                                                <td>{{$data->religion->name}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                        <!-- /.post -->
                                    @endif
                                    @if(isset($data->does_has_Driving_License))
                                    <!-- Post -->
                                    <div class="post">
                                        <table class="table table-bordered table-hover" style="width:100%">
                                                <tr>
                                                    <th>رخصة السواقة</th>
                                                </tr>
                                                <tr>
                                                    <td>

                                                <p>

                                                </p>
                                                <table class="table table-bordered table-hover" style="width:100%">
                                                    <tr class="table-hover">
                                                        <td>نوع الرخصة</td>
                                                        <td>رقم الرخصة</td>
                                                    </tr>
                                                    <tr class="">
                                                        <td>{{$data->drivingLicenses->name}}</td>
                                                        <td>{{$data->driving_License_degree}}</td>

                                                    </tr>
                                                </table>
                                                    </td>
                                                </tr>
                                        </table>
                                    </div>

                                        <!-- /.post -->
                                    @endif
                                    @if(isset($data->qualif_type_id))
                                    <!-- Post -->
                                        <div class="post">
                                            <table class="table table-bordered table-hover" style="width:100%">
                                                <tr>
                                                    <th>مؤهل الموظف</th>
                                                </tr>
                                                <tr>
                                                <table class="table table-bordered table-hover" style="width:100%">
                                                    <tr class="table-hover">
                                                        <td>نوع المؤهل</td>
                                                        <td>المؤهل</td>
                                                        <td>تخصص المؤهل</td>
                                                        <td>سنة التخرج</td>
                                                        <td>التقدير</td>
                                                    </tr>
                                                    <tr class="">
                                                        <td>{{$data->qualifType->name}}</td>
                                                        <td>{{$data->qualification->name}}</td>
                                                        <td>{{$data->Graduation_specialization}}</td>
                                                        <td>{{$data->Qualifications_year}}</td>
                                                        <td>{{$data->graduationEstimate->name}}</td>

                                                    </tr>
                                                </table>

                                            <!-- /.user-block -->
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- /.post -->
                                    @endif
                                    @if($data->is_Disabilities_processes == 1)
                                    <!-- Post -->

                                        <div class="post">
                                            <table class="table table-bordered table-hover" style="width:100%">
                                                <tr>
                                                    <th>اعاقة الموظف</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$data->DisabilitiesProcesses->name}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- /.post -->
                                    @endif
                                    @if($data->has_Relatives == 1)
                                    <!-- Post -->
                                        <div class="post">
                                            <table class="table table-bordered table-hover" style="width:100%">
                                                <tr>
                                                    <th>قرابة الموظف</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$data->Relatives_details}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- /.post -->
                                    @endif

                                    @if(isset($data->emp_nationality_id))
                                    <!-- Post -->
                                        <div class="post">
                                            <table class="table table-bordered table-hover" style="width:100%">
                                                <tr>
                                                    <th>جنسية  الموظف</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$data->nationality->name}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- /.post -->
                                    @endif

                                    @if(isset($data->emp_nationality_id))
                                    <!-- Post -->
                                        <div class="post">
                                            <table class="table table-bordered table-hover" style="width:100%">
                                                <tr>
                                                    <th>لغة الموظف  الموظف</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$data->languages->name}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- /.post -->
                                    @endif
                                    @if(isset($data->emp_national_idenity))
                                    <!-- Post -->
                                        <div class="post">
                                            <table class="table table-bordered table-hover" style="width:100%">
                                                <tr>
                                                    <th>جنسية الموظف الموظف</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table style="width:100%">
                                                          <tr>
                                                            <td>رقم البطاقة</td>
                                                            <td>تاريخ انتهاء البطاقة</td>
                                                            <td>مكان اصدار البطاقة</td>
                                                          </tr>
                                                            <tr>
                                                            <td>{{$data->emp_national_idenity}}</td>
                                                            <td>{{$data->emp_end_identityIDate}}</td>
                                                            <td>{{$data->emp_identityPlace}}</td>
                                                          </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- /.post -->
                                    @endif
                                    @if(isset($data->country_id))
                                        <!-- Post -->
                                            <div class="post">
                                                <table class="table table-bordered table-hover" style="width:100%">
                                                    <tr>
                                                        <th>بلد الموظف</th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table style="width:100%">
                                                                <tr>
                                                                    <td> الدولة</td>
                                                                    <td> المحافظة / المدينة</td>
                                                                    <td>المركز / الحي</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{$data->countrys->name}}</td>
                                                                    <td>{{$data->governorates->name}}</td>
                                                                    <td>{{$data->centers->name}}</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <!-- /.post -->
                                        @endif

                                    <a href="{{route('edit_view',$data->company_name)}}" class="btn btn-primary btn-block"><b>تعديل القواعد</b></a>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane text-center" id="timeline">
                                @if(isset($data->emp_Departments_id))
                                    <!-- Post -->
                                        <div class="post">
                                            <table class="table table-bordered table-hover" style="width:100%">
                                                <tr>
                                                    <th>ادارة الموظف</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$data->departments->name}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- /.post -->
                                @endif
                                @if(isset($data->branch_id))
                                    <!-- Post -->
                                        <div class="post">
                                            <table class="table table-bordered table-hover" style="width:100%">
                                                <tr>
                                                    <th>فرع الموظف</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$data->branch->name}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- /.post -->
                                @endif
                                @if(isset($data->emp_jobs_id))
                                    <!-- Post -->
                                        <div class="post">
                                            <table class="table table-bordered table-hover" style="width:100%">
                                                <tr>
                                                    <th>نوع الوظيفة</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$data->jobCategories->name}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- /.post -->
                                @endif
                                @if(isset($data->emp_start_date))
                                    <!-- Post -->
                                        <div class="post">
                                            <table class="table table-bordered table-hover" style="width:100%">
                                                <tr>
                                                    <th>تاريخ بدء العمل</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$data->emp_start_date}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- /.post -->
                                @endif
                                @if(isset($data->MotivationType))
                                    <!-- Post -->
                                        <div class="post">
                                            <table class="table table-bordered table-hover" style="width:100%">
                                                <tr>
                                                    <th>حافز  الموظف</th>
                                                </tr>
                                                <tr>
                                                    <td>@if($data->MotivationType ==1)
                                                            {{$data->Motivation}}
                                                        @else
                                                            {{$data->MotivationType == 0 ? "لايوجد حافز" : "الحافز متغير"}}
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- /.post -->
                                @endif
                                @if(isset($data->shift_type))
                                    <!-- Post -->
                                        <div class="post">
                                            <table class="table table-bordered table-hover" style="width:100%">
                                                <tr>
                                                    <th>شفت الموظف</th>
                                                </tr>
                                                <tr>
                                                    <td>@if($data->shift_type ==1)
                                                            {{$data->shitfts_type->shift_detalis($data->id)}}
                                                        @else
                                                            {{$data->shift_type == 0 ? "لايوجد اوقات عمل محددة" : "اوقات العمل متغيرة"}}
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- /.post -->
                                    @endif
                                @if(isset($data->MotivationType))
                                    <!-- Post -->
                                        <div class="post">
                                            <table class="table table-bordered table-hover" style="width:100%">
                                                <tr>
                                                    <th>حافز  الموظف</th>
                                                </tr>
                                                <tr>
                                                    <td>@if($data->MotivationType ==1)
                                                            {{$data->Motivation}}
                                                        @else
                                                            {{$data->MotivationType == 0 ? "لايوجد حافز" : "الحافز متغير"}}
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- /.post -->
                                    @endif
                                    <!-- Post -->
                                        <div class="post">
                                            <table class="table table-bordered table-hover" style="width:100%">
                                                <tr>
                                                    <th>
                                                        راتب  الموظف
                                                        @if(isset($data->emp_sal))
                                                            {{"(الراتب الشهري)"}}
                                                        @else
                                                            {{"(الراتب اليومي)"}}
                                                        @endif
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>@if(isset($data->emp_sal))
                                                            {{ $data->emp_sal . "$"}}
                                                        @else
                                                            {{ $data->day_price . "$"}}
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="post">
                                            <table class="table table-bordered table-hover" style="width:100%">
                                                <tr>
                                                    <th>قيمة استقطاع التامينات في الشهر</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table class="table table-bordered table-hover" style="width:100%">
                                                            <tr>
                                                                <th>
                                                                    @if(isset($data->isSocialnsurance))
                                                                        قيمة استقطاع التامين الاجتماعي في الشهر
                                                                    @endif
                                                                </th>
                                                                <th>
                                                                    @if(isset($data->ismedicalinsurance))
                                                                        قيمة استقطاع التامين الصحي في الشهر
                                                                    @endif
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    @if(isset($data->Socialnsurancecutmonthely))
                                                                       {{$data->Socialnsurancecutmonthely}}
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if(isset($data->medicalinsurancecutmonthely))
                                                                        {{$data->medicalinsurancecutmonthely}}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </table>

                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- /.post -->
                                    <div class="post">
                                        <table class="table table-bordered table-hover" style="width:100%">
                                            <tr>
                                                <th>البدلات الثالتة والحضور والانصراف</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="table table-bordered table-hover" style="width:100%">
                                                        <tr>
                                                            <th>
                                                                @if(isset($data->Does_have_fixed_allowances))
                                                                    هل له بدلات ثابتة
                                                                @endif
                                                            </th>
                                                            <th>
                                                                @if(isset($data->does_has_ateendance))
                                                                    هل ملزم بعمل بصمة الحضور والانصراف
                                                                @endif
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                @if(isset($data->Does_have_fixed_allowances))
                                                                    {{$data->Does_have_fixed_allowances == 1 ? "له بدلات ثابتة" : "ليس له بدلات ثالتة"}}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($data->does_has_ateendance))
                                                                    {{$data->does_has_ateendance == 1 ? "له بصمة" : "ليس له بصمة"}}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    @if(isset($data->emp_cv))
                                    <div class="post">
                                        <table class="table table-bordered table-hover" style="width:100%">
                                            <tr>
                                                <th>
                                                    السيرة الذاتية للموظف
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                   <a href="{{asset('assets/file/users/'.$data->emp_cv)}}">{{$data->emp_cv}}</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                @endif
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal" method="post" action="{{route('settings_edit',$data->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">اسم الشركة</label>

                                            <div class="col-sm-10">
                                                <input name="company_name"  type="text" class="form-control" id="inputName" value="{{$data->com_code}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  for="inputName" class="col-sm-2 control-label">عنوان الشركة</label>

                                            <div class="col-sm-10">
                                                <input name="address" type="text" class="form-control" id="inputName" value="{{$data->residence_address}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  for="inputName" class="col-sm-2 control-label">البريد الاليكتروني</label>

                                            <div class="col-sm-10">
                                                <input name="email" type="text" class="form-control" id="inputName" value="{{$data->emp_email}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  for="inputName" class="col-sm-2 control-label">لوجو الشركة</label>

                                            <div class="col-sm-10">
                                                <input name="image" type="file" class="form-control" id="inputName">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  for="inputName" class="col-sm-2 control-label">هاتف الشركة</label>

                                            <div class="col-sm-10">
                                                <input name="phones" type="text" class="form-control" id="inputName" value="{{$data->emp_work_tel}}">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <input type="submit" class="btn btn-danger" value="تعديل">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>


@endsection
