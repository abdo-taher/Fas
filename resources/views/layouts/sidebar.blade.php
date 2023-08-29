<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-center">

        <span class="brand-text font-weight-bold">FAS</span>
        <span class="brand-text font-weight-bold">System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img class="img-circle elevation-2" alt="User Image" src=
                    @if (isset(auth()->user()->image))
                        "{{asset('assets/image/admin/' .auth()->user()->image)}}">
                        @else
                        "{{asset('assets/image/admin/default.jpg')}}">
                    @endif


            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->username}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('index')}}" class="nav-link {{isActive("/")}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            لوحة التحكم
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview {{(request()->is('GeneralSettings') || request()->is('Finance_Calender') || request()->is('Branches') || request()->is('Shifts') || request()->is('Departments') || request()->is('Job_Categories') ? 'menu-open' : '')}}">


                    <a href="#" class="nav-link {{(request()->is('GeneralSettings') || request()->is('Finance_Calender') || request()->is('Branches') || request()->is('Shifts') || request()->is('Departments') || request()->is('Job_Categories') ? 'active' : '')}}">
                        <i class="nav-icon fas fa-stream"></i>
                        <p>
                            الضبط العام
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="{{route('general_settings_view')}}" class="nav-link {{isActive("GeneralSettings")}}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    اعدادات الشركة
                                    <span class="right badge badge-danger">جديد</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{route('finance_calender')}}" class="nav-link {{isActive("Finance_Calender")}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>السنوات الماليه</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('branches')}}" class="nav-link {{isActive("Branches")}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>فروع الشركة</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('shifts')}}" class="nav-link {{isActive("Shifts")}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>انواع فترات العمل</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('departments')}}" class="nav-link {{isActive("Departments")}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>إداراة الموظفين</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('job_categories')}}" class="nav-link {{isActive("Job_Categories")}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>انواع الوظائف</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
