 <table class="table table-striped projects">
            <thead>
            <tr>
                <th style="width: 1%">
                    #
                </th>
                <th style="width: 13%">
                    نوع الفترة
                </th>
                <th style="width: 13%">
                    عدد ساعات العمل
                </th>
                <th style="width: 13%">
                    بداية الفترة
                </th>
                <th style="width: 13%">
                    نهاية الفترة
                </th>
                <th style="width: 13%">
                    الادمن المسؤول
                </th>
                <th style="width: 14%" class="text-center">
                    حالة الفترة
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
                        {{$conn->type_shift($conn->id)}}
                    </td>
                    <td>
                        {{$conn->total_hour . " ساعات"}}
                    </td>
                    <td>
                        @php $gd = new DateTime($conn->from_time);
                                               $time = $gd ->format('h:i');
                                               $typ = $gd ->format('A');
                                               $type = $typ == 'AM' ? "صباحا" :"مساء";
                        @endphp
                        {{$time . $type}}
                    </td>
                    <td>
                        @php $gd = new DateTime($conn->to_time);
                                               $time = $gd ->format('h:i');
                                               $typ = $gd ->format('A');
                                               $type = $typ == 'AM' ? "صباحا" :"مساء";
                        @endphp
                        {{$time . $type}}
                    </td>
                    <td class="project_progress">
                        {{$conn->added->username}}
                    </td>
                    <td class="project-state">
                        @if($conn->active == 1)
                            <span class="badge badge-success">فترة نشطة</span>
                        @else
                            <span class="badge badge-danger">فترة غير نشطة</span>
                        @endif
                    </td>
                    <td class="project-actions text-center">
                        <a class="btn btn-primary btn-sm active"  href="{{route('shifts_active',$conn->id)}}" >
                            @if($conn->active == 1)
                                <i class="fas fa-lock" alt="غلق"></i>
                            @else
                                <i class="fas fa-unlock" alt="فتح"></i>
                            @endif
                        </a>
                        <a class="btn btn-info btn-sm"  href="{{route('shifts_edit',$conn->id)}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a class="btn btn-danger btn-sm delete"  href="{{route('shifts_delete',$conn->id)}}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

