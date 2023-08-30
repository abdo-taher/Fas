<table class="table table-striped projects">
    <thead>
    <tr>
        <th style="width: 5%">
            #
        </th>
        <th style="width: 20%">
            اسم اللغة
        </th>
        <th style="width: 20%">
            الادمن المسؤول
        </th>
        <th style="width: 20%" class="text-center">
            حالة اللغة
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
                    <span class="badge badge-success">لغة نشطة</span>
                @else
                    <span class="badge badge-danger">لغة غير نشطة</span>
                @endif
            </td>
            <td class="project-actions text-center">
                <a class="btn btn-primary btn-sm isActive"  href="{{route('languages_active',$conn->id)}}" >
                    @if($conn->active == 1)
                        <i class="fas fa-lock" alt="غلق"></i>
                    @else
                        <i class="fas fa-unlock" alt="فتح"></i>
                    @endif
                </a>
                <a class="btn btn-info btn-sm"  href="{{route('languages_edit',$conn->name)}}">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <a class="btn btn-danger btn-sm delete"  href="{{route('languages_delete',$conn->id)}}">
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
