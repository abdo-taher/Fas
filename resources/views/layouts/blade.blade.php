<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap 4 RTL -->
  <link rel="stylesheet" href="{{asset('assets/plugins/rtl/bootstrap.min.css')}}">
  <!-- Custom style for RTL -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/custom.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
 @include('layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('mainIndex')
<!-- . General Settings page content -->
  @yield('general_settings_index')
  @yield('general_settings_edit')
  <!-- /.content-wrapper -->
  <!-- . finance_calender page content -->
  @yield('finance_calender_index')
  @yield('finance_calender_add')
  @yield('finance_calender_edit')
  <!-- . finance_cel_periods page content -->
  @yield('finance_cel_periods_index')
  <!-- . branches page content -->
  @yield('branches_index')
  @yield('branches_add')
  @yield('branches_edit')
  <!-- /.content-wrapper -->
  <!-- . shifts_type page content -->
  @yield('shifts_index')
  @yield('shifts_add')
  @yield('shifts_edit')
  <!-- . departments page content -->
  @yield('departments_index')
  @yield('departments_add')
  @yield('departments_edit')
  <!-- . job_categories page content -->
  @yield('job_categories_index')
  @yield('job_categories_add')
  @yield('job_categories_edit')
  <!-- /.content-wrapper -->
  <!-- . qualifications page content -->
  @yield('qualifications_index')
  @yield('qualifications_add')
  @yield('qualifications_edit')
  <!-- /.content-wrapper -->
  <!-- . qualif_type page content -->
  @yield('qualif_type_index')
  @yield('qualif_type_add')
  @yield('qualif_type_edit')
  <!-- /.content-wrapper -->
  <!-- . occasions page content -->
  @yield('occasions_index')
  @yield('occasions_add')
  @yield('occasions_edit')
  <!-- /.content-wrapper -->
  <!-- . resignations page content -->
  @yield('resignations_index')
  @yield('resignations_add')
  @yield('resignations_edit')
  <!-- /.content-wrapper -->
  <!-- . nationality page content -->
  @yield('nationalitys_index')
  @yield('nationalitys_add')
  @yield('nationalitys_edit')
  <!-- /.content-wrapper -->
  <!-- . job_categories page content -->
  @yield('religions_index')
  @yield('religions_add')
  @yield('religions_edit')
  <!-- /.content-wrapper -->
  <!-- . job_categories page content -->
  @yield('blood_types_index')
  @yield('blood_types_add')
  @yield('blood_types_edit')
  <!-- /.content-wrapper -->
  <!-- . job_categories page content -->
  @yield('marital_status_index')
  @yield('marital_status_add')
  @yield('marital_status_edit')
  <!-- /.content-wrapper -->
  <!-- . job_categories page content -->
  @yield('military_services_index')
  @yield('military_services_add')
  @yield('military_services_edit')
  <!-- /.content-wrapper -->
    <!-- . driving_license page content -->
  @yield('driving_licenses_index')
  @yield('driving_licenses_add')
  @yield('driving_licenses_edit')
  <!-- /.content-wrapper -->
    <!-- . graduation_estimate page content -->
  @yield('graduation_estimates_index')
  @yield('graduation_estimates_add')
  @yield('graduation_estimates_edit')
  <!-- /.content-wrapper -->
    <!-- . country page content -->
  @yield('countrys_index')
  @yield('countrys_add')
  @yield('countrys_edit')
  <!-- /.content-wrapper -->
    <!-- . governorates page content -->
  @yield('governorates_index')
  @yield('governorates_add')
  @yield('governorates_edit')
  <!-- /.content-wrapper -->
    <!-- . centers page content -->
  @yield('centers_index')
  @yield('centers_add')
  @yield('centers_edit')
  <!-- /.content-wrapper -->
    <!-- . languages page content -->
  @yield('languages_index')
  @yield('languages_add')
  @yield('languages_edit')
  <!-- /.content-wrapper -->
  <!-- . Employees page content -->
  @yield('employees_index')
  @yield('employees_detalis')
  @yield('employees_add')
  @yield('employees_edit')
  <!-- /.content-wrapper -->

</div>

@include('layouts.footer')

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 rtl -->
<script src="{{asset('assets/plugins/rtl/bootstrap.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('assets/plugins/chart.js/Chart.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('assets/plugins/sparklines/sparkline.js')}}"></script>
{{--<!-- JQVMap -->--}}
{{--<script src="{{asset('assets/plugins/jqvmap/jquery.vmap.js')}}"></script>--}}
{{--<script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.world.js')}}"></script>--}}
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('assets/plugins/summernote/summernote-bs4.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{asset('assets/dist/js/pages/dashboard.js')}}"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.j')}}s"></script>
<script>
    $(document).ready(function (){
        $(document).on('click','.delete',function (){
            var rel = confirm("هل انت متاكد من الحذف");
            if(!rel){
                return false;
            }
        })
        $(document).on('click','.isActive',function (){
            var rel = confirm("هل انت متاكد من ذللك");
            if(!rel){
                return false;
            }
        })
    })
</script>

@yield('finance_script')
@yield('searchScript')

</body>
</html>
