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
                        <h1 class="m-0 text-dark">انواع فترات العمل</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item active">قائمة الفترات</li>
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
                <a class="btn btn-outline-secondary col-12" href="{{route('shifts_add')}}">اضافة فترة عمل جديدة</a>
                <div class="card card-gray">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <h3 class="card-title ">قائمة الفترات</h3>
                    </div>
                    <div class="card">
                        <div class="searchDiv bg-light">
                            <div class="form-group" data-select2-id="13">

                                <select name="type" id="type" class="form-control  select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option data-select2-id="1" value="0">الكل</option>
                                    <option data-select2-id="2" value="1">صباحي</option>
                                    <option data-select2-id="3" value="2">مسائي</option>
                                </select>
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
                                    <th style="width: 13%">
                                        نوع الفترة
                                    </th>
                                    <th style="width: 13%">
                                        عدد ساعات العمل
                                    </th>
                                    <th style="width: 13%">
                                        بداية الفترة
                                    </th>
                                    <th style="width: 13%">
                                        نهاية الفترة
                                    </th>
                                    <th style="width: 13%">
                                        الادمن المسؤول
                                    </th>
                                    <th style="width: 14%" class="text-center">
                                        حالة الفترة
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
                                        {{$conn->type_shift($conn->id)}}
                                    </td>
                                    <td>
                                        {{$conn->total_hour . " ساعات"}}
                                    </td>
                                    <td>
                                        @php $gd = new DateTime($conn->from_time);
                                               $time = $gd ->format('h:i');
                                               $typ = $gd ->format('A');
                                               $type = $typ == 'AM' ? "صباحا" :"مساء";
                                        @endphp
                                        {{$time . $type}}
                                    </td>
                                    <td>
                                        @php $gd = new DateTime($conn->to_time);
                                               $time = $gd ->format('h:i');
                                               $typ = $gd ->format('A');
                                               $type = $typ == 'AM' ? "صباحا" :"مساء";
                                        @endphp
                                        {{$time . $type}}
                                    </td>
                                    <td class="project_progress">
                                        {{$conn->added->username}}
                                    </td>
                                    <td class="project-state">
                                        @if($conn->active == 1)
                                        <span class="badge badge-success">فترة نشطة</span>
                                        @else
                                        <span class="badge badge-danger">فترة غير نشطة</span>
                                        @endif
                                    </td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-primary btn-sm isActive"  href="{{route('shifts_active',$conn->id)}}" >
                                            @if($conn->active == 1)
                                                <i class="fas fa-lock" alt="غلق"></i>
                                            @else
                                                <i class="fas fa-unlock" alt="فتح"></i>
                                            @endif
                                        </a>
                                        <a class="btn btn-info btn-sm"  href="{{route('shifts_edit',$conn->id)}}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm delete"  href="{{route('shifts_delete',$conn->id)}}">
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

           $(document).on('change','#type',function (){
               ajaxSearch();
           })
            $(document).on('input','#searchStart',function (){
                ajaxSearch();
            })
            $(document).on('input','#searchEnd',function (){
                ajaxSearch();
            })

           function ajaxSearch(){
            var type = $('#type').val();
            var startTime = $('#searchStart').val();
            var endTime = $('#searchEnd').val();

               jQuery.ajax({
               url:'{{route('ajaxSearch')}}',
               type:'post',
               'dataType':'html',
               cache:false,
               data:{'_token':'{{csrf_token()}}',type,startTime,endTime} ,
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
