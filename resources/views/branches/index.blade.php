@extends('layouts.blade')

@section('title')
   فروع الشركة
@endsection

@section('branches_index')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">فروع الشركة</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item active">قائمة الفروع</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                @include('layouts/alert')
                <a class="btn btn-outline-primary col-12" href="{{route('branches_add')}}">اضافة فرع جديد</a>
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <h3 class="card-title ">قائمة فروع الشركة</h3>
                    </div>
                    <div class="card">

                        <div class="card-body p-0 fc-scroller" >
                            @if(isset($data))
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th style="width: 13%">
                                        اسم الفرع
                                    </th>
                                    <th style="width: 13%">
                                        عنوان الفرع
                                    </th>
                                    <th style="width: 13%">
                                        هاتف الفرع
                                    </th>
                                    <th style="width: 13%">
                                        البريد الاليكتروني
                                    </th>
                                    <th style="width: 13%">
                                        الادمن المسؤول
                                    </th>
                                    <th style="width: 14%" class="text-center">
                                        حالة الفرع
                                    </th>
                                    <th style="width: 40%">
                                        الاعدادات
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $val => $conn)
                                <tr>
                                    <td>
                                        {{$val}}
                                    </td>
                                    <td>
                                        {{$conn->name}}
                                    </td>
                                    <td>
                                        {{$conn->address}}
                                    </td>
                                    <td>
                                        {{$conn->phones}}
                                    </td>
                                    <td>
                                        @if(empty($conn->email))
                                            لا يوجد
                                        @endif
                                        {{$conn->email}}
                                    </td>
                                    <td class="project_progress">
                                        {{$conn->added->username}}
                                    </td>
                                    <td class="project-state">
                                        @if($conn->active == 1)
                                        <span class="badge badge-success">فرع نشط</span>
                                        @else
                                        <span class="badge badge-danger">فرع غير نشط</span>
                                        @endif
                                    </td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-primary btn-sm"  href="{{route('branches_active',$conn->id)}}" >
                                            @if($conn->is_open == 1)
                                                <i class="fas fa-lock" alt="غلق"></i>
                                            @else
                                                <i class="fas fa-unlock" alt="فتح"></i>
                                            @endif
                                        </a>
                                        <a class="btn btn-info btn-sm"  href="{{route('branches_edit',$conn->name)}}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm delete"  href="{{route('branches_delete',$conn->id)}}">
                                            <i class="fas fa-trash"></i>
                                        </a>
{{--                                        <a data-id="{{$conn->id}}" class="btn btn-info btn-sm showMonth" href="{{route('finance_cel_periods',$conn->FINANCE_YR)}}">--}}
{{--                                            <i class="fas fa-eye"></i>--}}
{{--                                        </a>--}}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                                @else
                                <h3 class="text-center" style="color: #9F0053 ;" >لا يوجد بيانات لعرضها</h3>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>

        </div>
    </section>


@endsection

