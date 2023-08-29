@extends('layouts.blade')

@section('title')
    انواع الوظائف
@endsection

@section('job_categories_index')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> انواع وظائف الادارة</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item active">قائمة انواع وظائف الادارة</li>
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
                <a class="btn btn-outline-secondary col-12" href="{{route('job_categories_add')}}">اضافة نوع وظيفة جديد</a>
                <div class="card card-gray">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <h3 class="card-title ">قائمة وظائف الادارة</h3>
                    </div>
                    <div class="card">
                        <input type="text" id="search" name="name" class="form-control" placeholder="ابحث عن الوظائف">
                        @if(isset($departement))
                        <select name="departments_id" class="form-control select2 departments_id select2-hidden-accessible" id="departments_id"  style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="0">الكل</option>
                            @foreach($departement as $var)
                                <option value="{{$var->id}}">{{$var->name}}</option>
                            @endforeach
                        </select>
                        @endif
                        <div class="searchDiv bg-light">
                            <div class="form-group" data-select2-id="13">
                            </div>
                        </div>
                        <div class="card-body jquerySearch p-0 fc-scroller" id="#jquerySearch" >
                            @if(isset($data))
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th style="width: 18%">
                                        اسم الوظيفة
                                    </th>
                                    <th style="width: 18%">
                                        الإدارة التابعة
                                    </th>
                                    <th style="width: 18%">
                                        الادمن المسؤول
                                    </th>
                                    <th style="width: 18%" class="text-center">
                                        حالة الوظيفة
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
                                        @if($conn->departments)
                                            {{$conn->departments->name}}
                                        @else
                                            لا يوجد ادارة
                                        @endif

                                    </td>
                                    <td>
                                        @php $gd = new DateTime($conn->crated_at);
                                               $date = $gd ->format('Y:m:d');
                                               $time = $gd ->format('h:i');
                                               $typ = $gd ->format('A');
                                               $type = $typ == 'AM' ? "صباحا" :"مساء";
                                        @endphp
                                        {{$date}}<br>{{$time . $type }}<br>{{$conn->added->username}}
                                    </td>
                                    <td class="project-state">
                                        @if($conn->active == 1)
                                        <span class="badge badge-success">فترة نشطة</span>
                                        @else
                                        <span class="badge badge-danger">فترة غير نشطة</span>
                                        @endif
                                    </td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-primary btn-sm isActive"  href="{{route('job_categories_active',$conn->id)}}" >
                                            @if($conn->active == 1)
                                                <i class="fas fa-lock" alt="غلق"></i>
                                            @else
                                                <i class="fas fa-unlock" alt="فتح"></i>
                                            @endif
                                        </a>
                                        <a class="btn btn-info btn-sm"  href="{{route('job_categories_edit',$conn->name)}}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm delete"  href="{{route('job_categories_delete',$conn->id)}}">
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

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="col-12">
                        {{$data->links('pagination::bootstrap-5')}}
                    </div>
                    @else
                        <h3 class="text-center" style="color: #9F0053 ;" >لا يوجد بيانات لعرضها</h3>
                @endif
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>

        </div>
    </section>


@endsection

@section('searchScript')

    <script>
        $(document).ready(function (){


            $(document).on('input','#search',function (){
                ajaxSearch();
            })
            $(document).on('change','#departments_id',function (){
                ajaxSearch();
            })

           function ajaxSearch(){
               var selectSearch = $('#departments_id').val();
               var inputSearch = $('#search').val();

               jQuery.ajax({
               url:'{{route('job_categoriesSearch')}}',
               type:'post',
               'dataType':'html',
               cache:false,
               data:{'_token':'{{csrf_token()}}',inputSearch,selectSearch} ,
               success:function (data){
                $('.jquerySearch').html(data);
               },
               error:function (){
                   $('.jquerySearch').html('you have a Problem');
               }
           })
           }
        })

    </script>

@endsection
