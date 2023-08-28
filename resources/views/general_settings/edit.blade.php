@extends('layouts.blade')

@section('title')
   تعديل القواعد العامة
@endsection

@section('general_settings_edit')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">الضبط العام للشركة</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item"><a href="{{route('general_settings_view')}}">الضبط العام</a></li>
                            <li class="breadcrumb-item active">صفحة التعديل</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <h3 class="card-title ">تعديل قوانين الشركة</h3>
                    </div>
                    <form class="card-body" style="display: block;" action="{{route('settings_edit_rules',$data->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>بعد كم دقيقة نحسب تاخير حضور</label>
                            <input name="after_minutes_calculate_delay" type="number" class="form-control" value="{{$data->after_minutes_calculate_delay}}">
                        </div>
                        <div class="form-group">
                            <label> بعد كم دقيقة نحسب انصراف مبكر</label>
                            <input name="after_minutes_calculate_early_departure" type="number" class="form-control" value="{{$data->after_minutes_calculate_early_departure}}">
                        </div>
                        <div class="form-group">
                            <label></label>
                            <input name="after_minutes_quarter_day" type="number" class="form-control" value="{{$data->after_minutes_quarter_day}}">
                        </div>
                        <div class="form-group">
                            <label>بعد كم دقيقه مجموع الانصارف المبكر او الحضور المتأخر نحصم ربع يوم</label>
                            <input name="after_time_half_day_cut" type="number" class="form-control" value="{{$data->after_time_half_day_cut}}">
                        </div>
                        <div class="form-group">
                            <label>بعد كم مرة تأخير او انصارف مبكر نخصم نص يوم</label>
                            <input name="after_time_half_day_cut" type="number" class="form-control" value="{{$data->after_time_half_day_cut}}">
                        </div>
                        <div class="form-group">
                            <label>نخصم بعد كم مره تاخير او انصارف مبكر يوم كامل</label>
                            <input name="after_time_all_day_day_cut" type="number" class="form-control" value="{{$data->after_time_all_day_day_cut}}">
                        </div>
                        <div class="form-group">
                            <label>رصيد اجازات الموظف الشهري</label>
                            <input name="monthly_vacation_balance" type="number" class="form-control" value="{{$data->monthly_vacation_balance}}">
                        </div>
                        <div class="form-group">
                            <label>بعد كم يوم ينزل للموظف رصيد اجازات</label>
                            <input name="after_days_begin_vacation" type="number" class="form-control" value="{{$data->after_days_begin_vacation}}">
                        </div>
                        <div class="form-group">
                            <label>الرصيد الاولي المرحل عند تفعيل الاجازات للموظف مثل نزول عشرة ايام ونص بعد سته شهور للموظف</label>
                            <input name="first_balance_begin_vacation" type="number" class="form-control" value="{{$data->first_balance_begin_vacation}}">
                        </div>
                        <div class="form-group">
                            <label>قيمة خصم الايام بعد اول مرة غياب بدون اذن</label>
                            <input name="sanctions_value_first_absence" type="number" class="form-control" value="{{$data->sanctions_value_first_absence}}">
                        </div>
                        <div class="form-group">
                            <label>قيمة خصم الايام بعد ثاني مرة غياب بدون اذن</label>
                            <input name="sanctions_value_second_absence" type="number" class="form-control" value="{{$data->sanctions_value_second_absence}}">
                        </div>
                        <div class="form-group">
                            <label> قيمة خصم الايام بعد ثالث مرة غياب بدون اذن</label>
                            <input name="sanctions_value_third_absence" type="number" class="form-control" value="{{$data->sanctions_value_third_absence}}">
                        </div>
                        <div class="form-group">
                            <label>قيمة خصم الايام بعد رابع مرة غياب بدون اذن</label>
                            <input name="sanctions_value_forth_absence" type="number" class="form-control" value="{{$data->sanctions_value_forth_absence}}">
                        </div>
                        <div class="form-group">
                            <input  type="submit" class="btn btn-success col-12" value="حفظ التعديلات">
                        </div>




                    </form>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
        <div class="row">
            <div class="col-12">

                <a class="btn btn-dark float-right" href="{{route('general_settings_view')}}">الرجوع الي الخلف --></a>
            </div>
        </div>
        </div>
    </section>


@endsection
