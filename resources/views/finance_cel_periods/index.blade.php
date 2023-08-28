@extends('layouts.blade')

@section('title')
    الشهور المالية لعام {{$slug}}
@endsection

@section('finance_cel_periods_index')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">الشهور المالية لسنة {{$slug}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item"><a href="{{route('finance_calender')}}">السنوات الماليه</a></li>
                            <li class="breadcrumb-item active">شهور {{$slug}} </li>
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
                            <div class="card-header">
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                                <h3 class="card-title ">قائمة الشهور لسنة {{$slug}} </h3>
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
                                                <th style="width: 14%">
                                                      اسم الشهر بالعربي
                                                </th>
                                                <th style="width: 14%">
                                                    اسم الشهر بالانجليزي
                                                </th>
                                                <th style="width: 13%">
                                                    عدد ايام الشهر
                                                </th>
                                                <th style="width: 14%">
                                                    تاريخ بداية الشهر
                                                </th>
                                                <th style="width: 14%">
                                                    تاريخ نهاية الشهر
                                                </th>
                                                <th style="width: 14%" class="text-center">
                                                    حالة الشهر
                                                </th>
                                                <th style="width: 13%">
                                                    الذي اضاف الشهر
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
                                                        {{$conn->Month->first()->name}}
                                                    </td>
                                                    <td>
                                                        {{$conn->Month->first()->name_en}}
                                                    </td>
                                                    <td>
                                                        {{$conn->number_of_days}}
                                                    </td>
                                                    <td>
                                                        {{$conn->START_DATE_M}}
                                                    </td>
                                                    <td>
                                                        {{$conn->END_DATE_M}}
                                                    </td>
                                                    <td class="project-state">
                                                        @if($conn->is_open == 1)
                                                            <span class="badge badge-success">مفتوح الان</span>
                                                        @else
                                                            <span class="badge badge-danger">مغلق الان</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{$conn->added->username}}
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
