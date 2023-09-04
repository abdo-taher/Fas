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

                <li class="nav-item has-treeview {{(request()->is('GeneralSettings') || request()->is('Finance_Calender') || request()->is('Branches') || request()->is('Shifts') || request()->is('Departments') || request()->is('Job_Categories') || request()->is('Qualifications') || request()->is('Qualifications_types') || request()->is('Occasions') || request()->is('Resignations') || request()->is('Nationalitys') || request()->is('Religions') || request()->is('Blood_types') || request()->is('Marital_status') || request()->is('Languages') || request()->is('Centers') || request()->is('Governorates') || request()->is('Countrys') || request()->is('Graduation_estimates') || request()->is('Driving_licenses') ? 'menu-open' : '')}}">


                    <a href="#" class="nav-link {{(request()->is('GeneralSettings') || request()->is('Finance_Calender') || request()->is('Branches') || request()->is('Shifts') || request()->is('Departments') || request()->is('Job_Categories') || request()->is('Qualifications') || request()->is('Qualifications_types') || request()->is('Occasions') || request()->is('Resignations') || request()->is('Nationalitys') || request()->is('Religions') || request()->is('Blood_types') || request()->is('Marital_status') || request()->is('Languages') || request()->is('Centers') || request()->is('Governorates') || request()->is('Countrys') || request()->is('Graduation_estimates') || request()->is('Driving_licenses') ? 'active' : '')}}">
                        <i class="nav-icon ion ion-clipboard"></i>
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
                        <li class="nav-item">
                            <a href="{{route('qualif_types')}}" class="nav-link {{isActive("Qualifications_types")}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>انواع المؤهلات الدراسية</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('qualifications')}}" class="nav-link {{isActive("Qualifications")}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>المؤهلات الدراسية </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('occasions')}}" class="nav-link {{isActive("Occasions")}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>العطلات الرسمية </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('resignations')}}" class="nav-link {{isActive("Resignations")}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>انواع ترك العمل</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('nationalitys')}}" class="nav-link {{isActive("Nationalitys")}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>جنسيات الموظفين</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('religions')}}" class="nav-link {{isActive("Religions")}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p> الديانات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('blood_types')}}" class="nav-link {{isActive("Blood_types")}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>فصائل الدم</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('marital_status')}}" class="nav-link {{isActive("Marital_status")}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>الحاله الاجتماعية</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('driving_licenses')}}" class="nav-link {{isActive("Driving_licenses")}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>انواع رخصة القيادة</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('graduation_estimates')}}" class="nav-link {{isActive("Graduation_estimates")}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>انواع التقدير</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('countrys')}}" class="nav-link {{isActive("Countrys")}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>الدول</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('governorates')}}" class="nav-link {{isActive("Governorates")}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>محافظات الدول</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('centers')}}" class="nav-link {{isActive("Centers")}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>مراكز المحافظات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('languages')}}" class="nav-link {{isActive("Languages")}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اللغات</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview {{(request()->is('Employees') ? 'menu-open' : '')}}">


                    <a href="#" class="nav-link {{(request()->is('Employees') ? 'active' : '')}}">
                        <i class="nav-icon ion ion-clipboard"></i>
                        <p>
                            بيانات الموظفين
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="{{route('employees')}}" class="nav-link {{isActive("Employees")}}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                     بيانات الموظفين الادارة
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('employees')}}" class="nav-link {{isActive("")}}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    انواع الاضافي للراتب
                                    <span class="right badge badge-danger">جديد</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('employees')}}" class="nav-link {{isActive("")}}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    انواع الخصم للراتب
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('employees')}}" class="nav-link {{isActive("")}}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    انواع البدلات للراتب
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('employees')}}" class="nav-link {{isActive("")}}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    هواتف الموظفين
                                </p>
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
