@extends('layouts.blade')

@section('title')
     تعديل العطلات الرسمية
@endsection

@section('occasions_edit')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">تعديل العطلات الرسمية </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item"><a href="{{route('occasions')}}">العطلات الرسمية</a></li>
                            <li class="breadcrumb-item active">تعديل نوع العطلة</li>
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
                                <h3 class="card-title ">تعديل العطلات الرسمية</h3>
                            </div>
                            <form class="card-body" style="display: block;" action="{{route('occasions_editDone',$data->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>اسم العطلة</label>
                                    <input type="text" required name="name" class="form-control" value="{{$data->name}}">
                                </div>
                                @error('name')
                                <blockquote class="quote-danger">
                                    <p style="color: #dc3545"> {{$message}}</p>
                                </blockquote>
                                @enderror
                                <div class="form-group">
                                    <label>وقت بداية العطلة</label>
                                    <input type="text" required name="start_date" class="form-control" value="{{$data->start_date}}">
                                </div>
                                @error('start_date')
                                <blockquote class="quote-danger">
                                    <p style="color: #dc3545"> {{$message}}</p>
                                </blockquote>
                                @enderror
                                <div class="form-group">
                                    <label>وقت نهاية العطلة</label>
                                    <input type="text" required name="end_date" class="form-control" value="{{$data->end_date}}">
                                </div>
                                @error('end_date')
                                <blockquote class="quote-danger">
                                    <p style="color: #dc3545"> {{$message}}</p>
                                </blockquote>
                                @enderror
                                <div class="form-group">
                                    <label>عدد ايام العطلة</label>
                                    <input type="text" required name="total_day" class="form-control" value="{{$data->total_day}}">
                                </div>
                                @error('total_day')
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
