@extends('layouts.blade')

@section('title')
    انواع الوظائف
@endsection

@section('job_categories_add')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">اضافة وظيفة جديدة</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item"><a href="{{route('job_categories')}}">انواع الوظائف</a></li>
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
                        <h3 class="card-title ">انواع الوظائف</h3>
                    </div>
                    <form class="card-body" style="display: block;" action="{{route('job_categories_addDone')}}" method="post">
                        @csrf
                        @if(isset($departement))
                        <div class="form-group" data-select2-id="13">
                            <label>الادارة التابع لها</label>
                            <select name="departments_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value="0">-- اختر الادارة --</option>
                                @foreach($departement as $var)
                                    <option value="{{$var->id}}">{{$var->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('departments_id')
                        <blockquote class="quote-danger">
                            <p style="color: #dc3545"> {{$message}}</p>
                        </blockquote>
                        @enderror
                        @endif
                        <div class="form-group">
                            <label>اسم الوظيفة الجديدة</label>
                            <input type="text" required name="name" class="form-control" placeholder="ادخل اسم الوظيفة الجديدة">
                        </div>
                        @error('name')
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
