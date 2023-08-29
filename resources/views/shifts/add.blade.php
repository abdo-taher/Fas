@extends('layouts.blade')

@section('title')
    فترات العمل
@endsection

@section('shifts_add')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">اضافة فترة عمل جديدة</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item"><a href="{{route('shifts')}}">فترات العمل</a></li>
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
                        <h3 class="card-title ">انواع فترات العمل</h3>
                    </div>
                    <form class="card-body" style="display: block;" action="{{route('shifts_addDone')}}" method="post">
                        @csrf
                        <div class="form-group" data-select2-id="13">
                            <label>نوع فترة العمل</label>
                            <select name="type" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option data-select2-id="1" value="1">صباحي</option>
                                <option data-select2-id="2" value="2">مسائي</option>
                            </select>
                        </div>
                        @error('type')
                        <blockquote class="quote-danger">
                            <p style="color: #dc3545"> {{$message}}</p>
                        </blockquote>
                        @enderror
                        <div class="form-group">
                            <label>عدد ساعات فترة العمل</label>
                            <input type="number" required name="total_hour" min="0" value="0" step="any" class="form-control" placeholder="ادخل عدد ساعات فترة العمل">
                        </div>
                        @error('total_hour')
                        <blockquote class="quote-danger">
                            <p style="color: #dc3545"> {{$message}}</p>
                        </blockquote>
                        @enderror
                        <div class="form-group">
                            <label>وقت بداية الفترة</label>
                            <input name="from_time" type="time" class="form-control" placeholder="ادخل وقت بداية الفترة">
                        </div>
                        @error('from_time')
                        <blockquote class="quote-danger">
                            <p style="color: #dc3545"> {{$message}}</p>
                        </blockquote>
                        @enderror
                        <div class="form-group">
                            <label>وقت النهاية</label>
                            <input name="to_time" type="time" class="form-control" placeholder="ادخل وقت نهاية الفترة">
                        </div>
                        @error('to_time')
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
