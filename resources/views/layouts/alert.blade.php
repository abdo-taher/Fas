
@if (Session::has('success'))
    <div style="text-align: center" class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if (Session::has('fail'))
    <div style="text-align: center" class="alert alert-danger">{{Session::get('fail')}}</div>
@endif
