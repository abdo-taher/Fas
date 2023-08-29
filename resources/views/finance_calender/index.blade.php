@extends('layouts.blade')

@section('title')
   السنوات الماليه
@endsection

@section('finance_calender_index')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">السنوات الماليه للشركة</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item active">السنوات الماليه</li>
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
                <a class="btn btn-outline-primary col-12" href="{{route('finance_calender_add')}}">اضافة سنة مالية جديدة</a>                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <h3 class="card-title ">قائمة السنوات الماليه</h3>
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
                                        اسم السنه
                                    </th>
                                    <th style="width: 13%">
                                        وصف السنه
                                    </th>
                                    <th style="width: 13%">
                                        تاريخ بداية السنة
                                    </th>
                                    <th style="width: 13%">
                                        تاريخ نهاية السنه
                                    </th>
                                    <th style="width: 13%">
                                        الذي اضاف السنه
                                    </th>
                                    <th style="width: 14%" class="text-center">
                                        حالة السنة
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
                                        {{$conn->FINANCE_YR}}
                                    </td>
                                    <td>
                                        {{$conn->FINANCE_YR_DESC}}
                                    </td>
                                    <td>
                                        {{$conn->start_date}}
                                    </td>
                                    <td>
                                        {{$conn->end_date}}
                                    </td>
                                    <td class="project_progress">
                                        {{$conn->added->username}}
                                    </td>
                                    <td class="project-state">
                                        @if($conn->is_open == 1)
                                        <span class="badge badge-success">مفتوحة الان</span>
                                        @else
                                        <span class="badge badge-danger">مغلقة الان</span>
                                        @endif
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm isActive"  href="{{route('finance_calender_open',$conn->id)}}" >
                                            @if($conn->is_open == 1)
                                                <i class="fas fa-folder-open" alt="غلق"></i>
                                            @else
                                                        <i class="fas fa-folder-open" alt="فتح"></i>
                                            @endif
                                        </a>
                                        <a class="btn btn-info btn-sm"  href="{{route('finance_calender_edit',$conn->FINANCE_YR)}}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm delete"  href="{{route('finance_calender_dle',$conn->id)}}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a data-id="{{$conn->id}}" class="btn btn-info btn-sm showMonth" href="{{route('finance_cel_periods',$conn->FINANCE_YR)}}">
                                            <i class="fas fa-eye"></i>
                                        </a>
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


@section('finance_script')

{{--    <script>--}}



        {{--            $(document).on('click','.showMonth',function (){--}}
{{--                var id =$(this).data('id');--}}
{{--                jquery.ajax({--}}
{{--                 url:'{{route('Months')}}',--}}
{{--                 type:'post',--}}
{{--                 'dataType':'html',--}}
{{--                 cache:false,--}}
{{--                 data:{'_token':{{csrf_token()}},'id' :id},--}}
{{--                 success:function (data){--}}

{{--                 },error:function (){--}}

{{--                    }--}}
{{--                })--}}
{{--            })--}}
{{--        })--}}


{{--    </script>--}}

@endsection
