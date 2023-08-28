@extends('layouts.blade')

@section('title')
الضبط العام
@endsection

@section('general_settings_index')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">الضبط العام للشركة</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">الرئسية</a></li>
                            <li class="breadcrumb-item active">الضبط العام</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" alt="User profile picture"
                                @if (isset($data->image))
                                    "{{asset('assets/image/company/' . $data->image)}}">
                                @else
                                    "{{asset('assets/image/company/default.jpg')}}">
                                @endif

                            </div>

                            <h3 class="profile-username text-center">{{$data->company_name}}</h3>

                            <p class="text-muted text-center">{{$data->status($data->id)}}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>عدد الموظفين</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>عدد الفروع</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Friends</b> <a class="float-right">13,287</a>
                                </li>
                            </ul>

                            <a  class="btn btn-primary btn-block" href="#settings" data-toggle="tab"><b>تعديل</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">عن الشركة</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i>اسم الشركة</strong>

                            <p class="text-muted">
                                {{$data->company_name}}
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> العنوان</strong>

                            <p class="text-muted">{{$data->address}}</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> البريد الاليكتروني</strong>

                            <p class="text-muted">{{$data->email}}</p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> الهاتف المحمول</strong>

                            <p class="text-muted">{{$data->phones}}</p>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <div class="col-md-9">
                    @include('layouts.alert')
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">القواعد</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">النشاطات</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">الاعدادات</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <span class="username">
                                                {{$data->after_minutes_calculate_delay}}
                                            </span>
                                        </div>
                                        <!-- /.user-block -->
                                            <p>
                                                بعد كم دقيقة نحسب تاخير حضور
                                            </p>
                                    </div>
                                    <!-- /.post -->
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <span class="username">
                                                {{$data->after_minutes_calculate_early_departure}}
                                            </span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            بعد كم دقيقة نحسب انصراف مبكر	                                        </p>
                                    </div>
                                    <!-- /.post -->
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <span class="username">
                                                {{$data->after_minutes_quarter_day}}
                                            </span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            بعد كم دقيقه مجموع الانصارف المبكر او الحضور المتأخر نحصم ربع يوم	                                        </p>
                                    </div>
                                    <!-- /.post -->
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <span class="username">
                                                {{$data->after_time_half_day_cut}}
                                            </span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            بعد كم مرة تأخير او انصارف مبكر نخصم نص يوم	                                        </p>
                                    </div>
                                    <!-- /.post -->
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <span class="username">
                                                {{$data->after_time_all_day_day_cut}}
                                            </span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            نخصم بعد كم مره تاخير او انصارف مبكر يوم كامل	                                        </p>
                                    </div>
                                    <!-- /.post -->
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <span class="username">
                                                {{$data->monthly_vacation_balance}}
                                            </span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            رصيد اجازات الموظف الشهري	                                        </p>
                                    </div>
                                    <!-- /.post -->
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <span class="username">
                                                {{$data->after_days_begin_vacation}}
                                            </span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            بعد كم يوم ينزل للموظف رصيد اجازات	                                        </p>
                                    </div>
                                    <!-- /.post -->
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <span class="username">
                                                {{$data->first_balance_begin_vacation}}
                                            </span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            الرصيد الاولي المرحل عند تفعيل الاجازات للموظف مثل نزول عشرة ايام ونص بعد سته شهور للموظف	                                        </p>
                                    </div>
                                    <!-- /.post -->
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <span class="username">
                                                {{$data->sanctions_value_first_absence}}
                                            </span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            قيمة خصم الايام بعد اول مرة غياب بدون اذن	                                        </p>
                                    </div>
                                    <!-- /.post -->
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <span class="username">
                                                {{$data->sanctions_value_second_absence}}
                                            </span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            قيمة خصم الايام بعد ثاني مرة غياب بدون اذن	                                        </p>
                                    </div>
                                    <!-- /.post -->
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <span class="username">
                                                {{$data->sanctions_value_third_absence}}
                                            </span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            قيمة خصم الايام بعد ثالث مرة غياب بدون اذن	                                        </p>
                                    </div>
                                    <!-- /.post -->
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <span class="username">
                                                {{$data->sanctions_value_forth_absence}}
                                            </span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            قيمة خصم الايام بعد رابع مرة غياب بدون اذن	                                        </p>
                                    </div>
                                    <!-- /.post -->
                                    <a href="{{route('edit_view',$data->company_name)}}" class="btn btn-primary btn-block"><b>تعديل القواعد</b></a>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-envelope bg-primary"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                                <div class="timeline-body">
                                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                    quora plaxo ideeli hulu weebly balihoo...
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-user bg-info"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                                <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                                </h3>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-comments bg-warning"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                                <div class="timeline-body">
                                                    Take me to your leader!
                                                    Switzerland is small and neutral!
                                                    We are more like Germany, ambitious and misunderstood!
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline time label -->
                                        <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-camera bg-purple"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                                <div class="timeline-body">
                                                    <img src="http://placehold.it/150x100" alt="...">
                                                    <img src="http://placehold.it/150x100" alt="...">
                                                    <img src="http://placehold.it/150x100" alt="...">
                                                    <img src="http://placehold.it/150x100" alt="...">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal" method="post" action="{{route('settings_edit',$data->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">اسم الشركة</label>

                                            <div class="col-sm-10">
                                                <input name="company_name"  type="text" class="form-control" id="inputName" value="{{$data->company_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  for="inputName" class="col-sm-2 control-label">عنوان الشركة</label>

                                            <div class="col-sm-10">
                                                <input name="address" type="text" class="form-control" id="inputName" value="{{$data->address}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  for="inputName" class="col-sm-2 control-label">البريد الاليكتروني</label>

                                            <div class="col-sm-10">
                                                <input name="email" type="text" class="form-control" id="inputName" value="{{$data->email}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  for="inputName" class="col-sm-2 control-label">لوجو الشركة</label>

                                            <div class="col-sm-10">
                                                <input name="image" type="file" class="form-control" id="inputName">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  for="inputName" class="col-sm-2 control-label">هاتف الشركة</label>

                                            <div class="col-sm-10">
                                                <input name="phones" type="text" class="form-control" id="inputName" value="{{$data->phones}}">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <input type="submit" class="btn btn-danger" value="تعديل">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>


@endsection
