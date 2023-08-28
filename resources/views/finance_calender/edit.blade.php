@extends('layouts.blade')

@section('title')
    تعديل{{$data->FINANCE_YR}}
@endsection

@section('finance_calender_edit')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{$data->FINANCE_YR}}تعديل </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item"><a href="{{route('finance_calender')}}">السنوات المالية</a></li>
                            <li class="breadcrumb-item active">{{$data->FINANCE_YR}}</li>
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
                                <h3 class="card-title ">تعديل سنة المالية{{$data->FINANCE_YR}}</h3>
                            </div>
                            <form class="card-body" style="display: block;" action="{{route('finance_calender_editDone',$data->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>السنة الماليه</label>
                                    <input name="FINANCE_YR" type="text" class="form-control" value="{{$data->FINANCE_YR}}">
                                </div>
                                @error('FINANCE_YR')
                                <blockquote class="quote-danger">
                                    <p style="color: #dc3545"> {{$message}}</p>
                                </blockquote>
                                @enderror
                                <div class="form-group">
                                    <label>وصف السنة الماليه</label>
                                    <input name="FINANCE_YR_DESC" type="text" class="form-control" value="{{$data->FINANCE_YR_DESC}}">
                                </div>
                                @error('FINANCE_YR_DESC')
                                <blockquote class="quote-danger">
                                    <p style="color: #dc3545"> {{$message}}</p>
                                </blockquote>
                                @enderror
                                <div class="form-group">
                                    <label>تاريخ بداية السنة المالية</label>
                                    <input name="start_date" type="date" class="form-control" value="{{$data->start_date}}">
                                </div>
                                @error('start_date')
                                <blockquote class="quote-danger">
                                    <p style="color: #dc3545"> {{$message}}</p>
                                </blockquote>
                                @enderror
                                <div class="form-group">
                                    <label>تاريخ نهاية السنة الماليه</label>
                                    <input name="end_date" type="date" class="form-control" value="{{$data->end_date}}">
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
                <div class="row">
                    <div class="col-12">

                        <a class="btn btn-dark float-right" href="{{route('finance_calender')}}">الرجوع الي الخلف --></a>
                    </div>
                </div>
            </div>
        </section>


@endsection
