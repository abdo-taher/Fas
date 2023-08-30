@extends('layouts.blade')

@section('title')
    مراكز المحافظات
@endsection

@section('centers_index')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> مراكز المحافظات</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item active">قائمة المراكز </li>
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
                <a class="btn btn-outline-secondary col-12" href="{{route('centers_add')}}">اضافة المركز  جديدة</a>
                <div class="card card-gray">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <h3 class="card-title ">قائمة ترك العمل</h3>
                    </div>
                    <div class="card">
                        @if(isset($select))
                            <div class="form-group" data-select2-id="13">
                                <label>نوع الموهل الدراسي</label>
                                <select name="governorate_id" class="form-control select2 select2-hidden-accessible" id="governorate_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value="0">-- اختر الكل --</option>
                                    @foreach($select as $var)
                                        <option value="{{$var->id}}">{{$var->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <input type="text" id="search" name="name" class="form-control" placeholder="ابحث عن المركز ">
                        <div class="searchDiv bg-light">
                            <div class="form-group" data-select2-id="13">
                            </div>
                        </div>
                        <div class="card-body jquerySearch p-0 fc-scroller" id="#jquerySearch" >
                            @if(isset($data))
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 5%">
                                        #
                                    </th>
                                    <th style="width: 20%">
                                        اسم المركز
                                    </th>
                                    <th style="width: 20%">
                                        الادمن المسؤول
                                    </th>
                                    <th style="width: 20%" class="text-center">
                                        حالة المركز
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
                                        <span class="badge badge-success">مركز نشطة</span>
                                        @else
                                        <span class="badge badge-danger">مركز غير نشطة</span>
                                        @endif
                                    </td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-primary btn-sm isActive"  href="{{route('centers_active',$conn->id)}}" >
                                            @if($conn->active == 1)
                                                <i class="fas fa-lock" alt="غلق"></i>
                                            @else
                                                <i class="fas fa-unlock" alt="فتح"></i>
                                            @endif
                                        </a>
                                        <a class="btn btn-info btn-sm"  href="{{route('centers_edit',$conn->name)}}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm delete"  href="{{route('centers_delete',$conn->id)}}">
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
                    @elseif(empty($data))
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
            $(document).on('change','#governorate_id',function (){
                ajaxSearch();
            })

           function ajaxSearch(){
               var inputSearch = $('#search').val();
               var  selectSearch = $('#governorate_id').val();
               jQuery.ajax({
               url:'{{route('centersSearch')}}',
               type:'post',
               'dataType':'html',
               cache:false,
               data:{'_token':'{{csrf_token()}}',inputSearch ,selectSearch} ,
               success:function (data){
                $('.jquerySearch').html(data);
               },
               error:function (){
                   $('.jquerySearch').html('<h1 style="color: darkred">لا يوجد بيانات لعرضها</h2>');
               }
           })
           }
        })

    </script>

@endsection
