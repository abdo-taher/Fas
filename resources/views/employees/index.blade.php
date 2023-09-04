@extends('layouts.blade')

@section('title')
   قائمة الموظفين
@endsection

@section('employees_index')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">قائمة الموظفين</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item active">بيانات الموظفين</li>
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
                <a class="btn btn-outline-secondary col-12" href="{{route('employees_add')}}">اضافة موظف جديد</a>
                <div class="card card-gray">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <h3 class="card-title ">قائمة الموظفين</h3>
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
                                        اسم الموظف
                                    </th>
                                    <th style="width: 10%">
                                        الوظيفة
                                    </th>
                                    <th style="width: 10%">
                                        العنوان
                                    </th>
                                    <th style="width: 10%">
                                        هاتف الموظف
                                    </th>
                                    <th style="width: 10%">
                                        الفرع
                                    </th>
                                    <th style="width: 13%">
                                        الصورة الشخصية
                                    </th>
                                    <th style="width: 10%">
                                        الادمن
                                    </th>
                                    <th style="width: 5%" class="text-center">
                                        الحالة
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
                                        {{$conn->emp_name}}
                                    </td>
                                    <td>
                                        {{$conn->jobCategories->name}}
                                    </td>
                                    <td>
                                        {{$conn->residence_address}}
                                    </td>
                                    <td>
                                        {{$conn->emp_work_tel}}
                                    </td>
                                    <td>
                                        {{$conn->branch->name}}
                                    </td>
                                    <td>
                                        @if(isset($conn->emp_photo))
                                            <img class="img-circle elevation-2" width="100px" height="100px" src="{{asset('assets/image/users/'.$conn->emp_photo)}}">
                                            @else
                                            <img class="img-circle elevation-2" width="100px" height="100px" src="{{asset('assets/image/users/default.png')}}">
                                        @endif
                                    </td>
                                    <td class="project_progress">
                                        @php $gd = new DateTime($conn->crated_at);
                                               $date = $gd ->format('Y:m:d');
                                               $time = $gd ->format('h:i');
                                               $typ = $gd ->format('A');
                                               $type = $typ == 'AM' ? "صباحا" :"مساء";
                                        @endphp
                                        {{$date}}<br>{{$time . $type }}<br>{{$conn->added->username}}
                                    </td>
                                    <td class="project-state">
                                        @if($conn->Functiona_status == 1)
                                        <span class="badge badge-success">موظف مفعل</span>
                                        @else
                                        <span class="badge badge-danger">موظف موقوف</span>
                                        @endif
                                    </td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-primary btn-sm isActive"  href="{{route('employees_active',$conn->id)}}" >
                                            @if($conn->Functiona_status == 1)
                                                <i class="fas fa-lock" alt="ايقاف"></i>
                                            @else
                                                <i class="fas fa-unlock" alt="تفعيل"></i>
                                            @endif
                                        </a>
                                        <a class="btn btn-info btn-sm"  href="{{route('employees_edit',$conn->employees_code)}}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm delete"  href="{{route('employees_delete',$conn->id)}}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a data-id="{{$conn->id}}" class="btn btn-info btn-sm showMonth" href="{{route('employees_son',$conn->employees_code)}}">
                                            <i class="fas fa-eye"></i>
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

