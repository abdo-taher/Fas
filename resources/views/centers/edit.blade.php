@extends('layouts.blade')

@section('title')
     تعديل مراكز المحافظات
@endsection

@section('centers_edit')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">تعديل المركز  </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item"><a href="{{route('centers')}}">مراكز المحافظات</a></li>
                            <li class="breadcrumb-item active">تعديل المركز </li>
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
                                <h3 class="card-title ">تعديل مراكز المحافظات</h3>
                            </div>
                            <form class="card-body" style="display: block;" action="{{route('centers_editDone',$data->id)}}" method="post">
                                @csrf
                                @if(isset($select))
                                    <div class="form-group" data-select2-id="13">
                                        <label>نوع الموهل الدراسي</label>
                                        <select name="governorate_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option value="0">-- اختر المحافظة --</option>
                                            @foreach($select as $var)
                                                <option {{$data->governorate_id == $var->id ? 'selected' : ''}} value="{{$var->id}}">{{$var->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('governorate_id')
                                    <blockquote class="quote-danger">
                                        <p style="color: #dc3545"> {{$message}}</p>
                                    </blockquote>
                                    @enderror
                                @endif
                                <div class="form-group">
                                    <label>اسم المركز </label>
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
