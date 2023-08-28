@extends('layouts.blade')

@section('title')
   فروع الشركة
@endsection

@section('branches_add')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">اضافة فروع جديدة</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item"><a href="{{route('branches')}}">فروع الشركة</a></li>
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
                    <form class="card-body" style="display: block;" action="{{route('branches_addDone')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>اسم الفرع</label>
                            <input name="name" type="text" class="form-control" placeholder="ادخل اسم الفرع الجديد">
                        </div>
                        @error('name')
                        <blockquote class="quote-danger">
                            <p style="color: #dc3545"> {{$message}}</p>
                        </blockquote>
                        @enderror
                        <div class="form-group">
                            <label>عنوان الفرع</label>
                            <input name="address" type="text" class="form-control" placeholder="ادخل عنوان الفرع الجديد">
                        </div>
                        @error('address')
                        <blockquote class="quote-danger">
                            <p style="color: #dc3545"> {{$message}}</p>
                        </blockquote>
                        @enderror
                        <div class="form-group">
                            <label>هاتف الفرع الجديد</label>
                            <input name="phones" type="text" class="form-control" placeholder="ادخل هاتف الفرع الجديد">
                        </div>
                        @error('phones')
                        <blockquote class="quote-danger">
                            <p style="color: #dc3545"> {{$message}}</p>
                        </blockquote>
                        @enderror
                        <div class="form-group">
                            <label>البريد الاليكتروني</label>
                            <input name="email" type="email" class="form-control" placeholder="ادخل البريد الاليكتروني الفرع الجديد">
                        </div>
                        @error('email')
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
