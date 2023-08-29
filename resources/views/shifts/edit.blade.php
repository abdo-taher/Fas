@extends('layouts.blade')

@section('title')
     تعديل فترة العمل
@endsection

@section('branches_edit')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">تعديل فترة العمل </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item"><a href="{{route('shifts')}}">فترات عمل الشركة</a></li>
                            <li class="breadcrumb-item active">تعديل فترات العمل</li>
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
                                <h3 class="card-title ">تعديل فترات العمل بالشركه</h3>
                            </div>
                            <form class="card-body" style="display: block;" action="{{route('shifts_editDone',$data->id)}}" method="post">
                                @csrf
                                <div class="form-group" data-select2-id="13">
                                    <label>نوع فترة العمل</label>
                                    <select name="type" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="1" value="1">صباحي</option>
                                        <option data-select2-id="2" value="2">مسائي</option>
                                    </select>
                                </div>
                                @error('name')
                                <blockquote class="quote-danger">
                                    <p style="color: #dc3545"> {{$message}}</p>
                                </blockquote>
                                @enderror
                                <div class="form-group">
                                    <label>عنوان الفرع</label>
                                    <input name="total_hour" type="number" step="any" class="form-control" value="{{$data->total_hour}}">
                                </div>
                                @error('address')
                                <blockquote class="quote-danger">
                                    <p style="color: #dc3545"> {{$message}}</p>
                                </blockquote>
                                @enderror
                                <div class="form-group">
                                    <label>وقت بداية فترة العمل</label>
                                    <input name="from_time" type="time" class="form-control" value="{{$data->from_time}}">
                                </div>
                                @error('phones')
                                <blockquote class="quote-danger">
                                    <p style="color: #dc3545"> {{$message}}</p>
                                </blockquote>
                                @enderror
                                <div class="form-group">
                                    <label>وقت انتهاء فترة العمل</label>
                                    <input name="to_time" type="time" class="form-control" value="{{$data->to_time}}">
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
