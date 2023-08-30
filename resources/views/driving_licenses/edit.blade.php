@extends('layouts.blade')

@section('title')
     تعديل نوع رخصة القيادة
@endsection

@section('driving_licenses_edit')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">تعديل نوع رخصة القيادة </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item"><a href="{{route('driving_licenses')}}">انوع رخصة القيادة</a></li>
                            <li class="breadcrumb-item active">تعديل نوع رخصة القيادة </li>
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
                                <h3 class="card-title ">تعديل انوع رخصة القيادة</h3>
                            </div>
                            <form class="card-body" style="display: block;" action="{{route('driving_licenses_editDone',$data->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>اسم نوع رخصة القيادة</label>
                                    <input type="text" required name="name" class="form-control" value="{{$data->name}}">
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
