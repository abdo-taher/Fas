<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-image: url({{asset('assets/image/loginCover.png')}})">
<div class="login-box">
  <div class="login-logo">

    <a style="color: darkgrey" ><b>FAS  </b>  System</a>
  </div>
  <!-- /.login-logo -->
  <div  style=" background:transparent" class="card">
    <div style=" background:transparent" style=" background:#1a202c" class="card-body login-card-body">
        @include('layouts.alert')
      <p class="login-box-msg">سجل الدخول لتواصل العمل</p>

      <form action="{{route('checkup')}}" method="post">
        <div class="input-group mb-3">
            @csrf
          <input name="username" type="text" class="form-control" placeholder="اسم المستخدم" style=" background:transparent ;color: white">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
          @error ("username")
          <blockquote class="quote-danger" style=" background:transparent">
              <p style="color: #dc3545"> {{$message}}</p>
          </blockquote>
          @enderror
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="كلمة المرور" style=" background:transparent;color: white">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          @error ("password")
          <blockquote class="quote-danger" style=" background:transparent">
              <p style="color: #dc3545"> {{$message}}</p>
          </blockquote>
          @enderror
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                تذكرني لاحقا
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-dark btn-block btn-flat">دخول</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="">نسيت كلمة السر</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
