
@if($comeBack=='centers')
    <label>المدينة / المركز</label>
    <select name="center_id" id="center_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
        @if(isset($data))
            @foreach($data as $var)
                <option value="{{$var->id}}">{{$var->name}}</option>
            @endforeach
        @endif
    </select>
@endif
@if($comeBack=='governorates')
    <label>المحافظات</label>
    <select name="governorate_id" id="governorate_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
        @if(isset($data))
            @foreach($data as $var)
                <option value="{{$var->id}}">{{$var->name}}</option>
            @endforeach
        @endif
    </select>
@endif
@if($comeBack=='emp_jobs_id')
        <label>نوع الوظيفة</label>
        <select name="emp_jobs_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
            @if(isset($data))
                @foreach($data as $var)
                    <option value="{{$var->id}}">{{$var->name}}</option>
                @endforeach
            @endif
        </select>
@endif
@if($comeBack=='qualif_type')
        <label>نوع المؤهل</label>
        <select name="Qualifications_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
            @if(isset($data))
                @foreach($data as $var)
                    <option value="{{$var->id}}">{{$var->name}}</option>
                @endforeach
            @endif
        </select>
@endif

