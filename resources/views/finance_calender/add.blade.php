@extends('layouts.blade')

@section('title')
   اضافة سنة مالية جديده
@endsection

@section('finance_calender_add')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">اضافة سنة مالية جديدة</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item"><a href="{{route('finance_calender')}}">السنوات المالية</a></li>
                            <li class="breadcrumb-item active">اضافة جديد</li>
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
                    <form class="card-body" style="display: block;" action="{{route('finance_calender_addDone')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>السنة الماليه</label>
                            <input name="FINANCE_YR" type="text" class="form-control" placeholder="ادخل السنة مثل : 2011">
                        </div>
                        @error('FINANCE_YR')
                        <blockquote class="quote-danger">
                            <p style="color: #dc3545"> {{$message}}</p>
                        </blockquote>
                        @enderror
                        <div class="form-group">
                            <label>وصف السنة الماليه</label>
                            <input name="FINANCE_YR_DESC" type="text" class="form-control" placeholder="ادخل وصف السنة">
                        </div>
                        @error('FINANCE_YR_DESC')
                        <blockquote class="quote-danger">
                            <p style="color: #dc3545"> {{$message}}</p>
                        </blockquote>
                        @enderror
                        <div class="form-group">
                            <label>تاريخ بداية السنة المالية</label>
                            <input name="start_date" type="date" class="form-control" placeholder="ادخل تاريخ البداية">
                        </div>
                        @error('start_date')
                        <blockquote class="quote-danger">
                            <p style="color: #dc3545"> {{$message}}</p>
                        </blockquote>
                        @enderror
                        <div class="form-group">
                            <label>تاريخ نهاية السنة الماليه</label>
                            <input name="end_date" type="date" class="form-control" placeholder="ادخل تاريخ النهاية">
                        </div>
                        @error('end_date')
                        <blockquote class="quote-danger">
                            <p style="color: #dc3545"> {{$message}}</p>
                        </blockquote>
                        @enderror
                        <div class="form-group">
                            <input  type="submit" class="btn btn-success col-12" value="حفظ البيانات">
                        </div>




                    </form>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
        </div>
    </section>


@endsection
