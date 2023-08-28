@extends('layouts.blade')

@section('title')
     تعديل {{$slug}}
@endsection

@section('branches_edit')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> تعديل فرع {{$slug}} </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item"><a href="{{route('branches')}}">فروع الشركة</a></li>
                            <li class="breadcrumb-item active">تعديل  {{$slug}}</li>
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
                                <h3 class="card-title ">تعديل فرع {{$slug}}</h3>
                            </div>
                            <form class="card-body" style="display: block;" action="{{route('branches_editDone',$data->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>اسم الفرع</label>
                                    <input name="name" type="text" class="form-control" value="{{$data->name}}">
                                </div>
                                @error('name')
                                <blockquote class="quote-danger">
                                    <p style="color: #dc3545"> {{$message}}</p>
                                </blockquote>
                                @enderror
                                <div class="form-group">
                                    <label>عنوان الفرع</label>
                                    <input name="address" type="text" class="form-control" value="{{$data->address}}">
                                </div>
                                @error('address')
                                <blockquote class="quote-danger">
                                    <p style="color: #dc3545"> {{$message}}</p>
                                </blockquote>
                                @enderror
                                <div class="form-group">
                                    <label>هاتف الفرع</label>
                                    <input name="phones" type="text" class="form-control" value="{{$data->phones}}">
                                </div>
                                @error('phones')
                                <blockquote class="quote-danger">
                                    <p style="color: #dc3545"> {{$message}}</p>
                                </blockquote>
                                @enderror
                                <div class="form-group">
                                    <label>البريد الاليكتروني</label>
                                    <input name="email" type="email" class="form-control"
                                           @if(empty($data->email))
                                               PLACEHOLDER="لا يوجد بريد اليكتروني "
                                           @else
                                           value="{{$data->email}}"
                                           @endif
                                           >
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
