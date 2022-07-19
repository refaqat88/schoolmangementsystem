@php
    $i= 1 ;

@endphp

@foreach($class_schedule as $schedule)
    @php
        $serialized_class_schedule_arry = $schedule->timetable;
        $unserialized_class_schedule_arry = unserialize($serialized_class_schedule_arry);
    //print_r($filter_by);exit();

    @endphp
    <tr>
                <td>{{ $i++ }}</td>
                <td>{{$schedule->class}}</td>
                <td>{{$schedule->class_section_name}}</td>

                <td> @foreach($unserialized_class_schedule_arry as $class_sched){{ $class_sched['days'] }}<br>@endforeach</td>
                <td>@foreach($unserialized_class_schedule_arry as $class_sched){{  $class_sched['periods']}}<br>@endforeach</td>
                <td>@foreach($unserialized_class_schedule_arry as $class_sched){{ $class_sched['start_time'] }}<br>@endforeach</td>
                <td>@foreach($unserialized_class_schedule_arry as $class_sched){{ $class_sched['start_time'] }}<br>@endforeach</td>
                <td>@foreach($unserialized_class_schedule_arry as $class_sched){{ $class_sched['subjects'] }}<br>@endforeach</td>
                <td>@foreach($unserialized_class_schedule_arry as $class_sched){{ $class_sched['teachers'] }}<br>@endforeach</td>



        <td class="text-center">
            <div class="form-inline pull-right">
                <div class="">
                    <a href="#">
                        <button onclick="showViewSubject({{$schedule->ttable_Id}});" class="btn-link btn-cus-weight show-view-class_sched-btn" type="button" id="{{$schedule->ttable_Id}}" data-toggle="modal" data-target="#viewteacherclassshedule" aria-haspopup="true" aria-expanded="false">
                            View
                        </button>
                    </a>
                </div>
                <div class="nav-item btn-rotate dropdown pull-right ">
                    <a class="nav-link dropdown-toggle pull-right" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item editClassSched" href="#" data-toggle="modal"  data-id="{{$schedule->ttable_Id}}" aria-haspopup="true" aria-expanded="false">Edit</a>
                        <a class="dropdown-item delete-subject-sched-btn" onclick="deleteClassSched({{$schedule->ttable_Id}});" data-id="" href="#">Delete</a>
                    </div>
                </div>
            </div>
        </td>
    </tr>
@endforeach

<script>
    function showViewSubject(id){


        $.get('show-viewClass-schedule/'+id, function (data) {
            // console.log(data);
            var classSche = data.unserialized_array;
            $("#table-monday tbody").empty();
            $("#table-tuesday tbody").empty();
            $("#table-wednesday tbody").empty();
            $("#table-thursday tbody").empty();
            $("#table-friday tbody").empty();
            $("#table-saturday tbody").empty();
            $.each(classSche, function(key, val) {
                var days = val.days;
                console.log('unserialized array days===',val.days);
                if(days =='Monday'){
                    var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + data.class + "</td><td>" + val.start_time +" to "+ val.end_time + "</td></tr>";

                    $("#table-monday tbody").append(markup);
                }
                if(days =='Tuesday'){
                    var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + data.class + "</td><td>" + val.start_time +" to "+ val.end_time + "</td></tr>";

                    $("#table-tuesday tbody").append(markup);
                }
                if(days =='Wednesday'){
                    var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + data.class + "</td><td>" + val.start_time +" to "+ val.end_time + "</td></tr>";

                    $("#table-wednesday tbody").append(markup);
                }
                if(days =='Thursday'){
                    var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + data.class + "</td><td>" + val.start_time +" to "+ val.end_time + "</td></tr>";

                    $("#table-thursday tbody").append(markup);
                }
                if(days =='Friday'){
                    var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + data.class + "</td><td>" + val.start_time +" to "+ val.end_time + "</td></tr>";

                    $("#table-friday tbody").append(markup);
                }
                if(days =='Saturday'){
                    var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + data.class + "</td><td>" + val.start_time +" to "+ val.end_time + "</td></tr>";

                    $("#table-saturday tbody").append(markup);
                }
                //
                //
                //         // $('select[name="subject"]').append('<option value="'+ key +'">'+ value +'</option>');
            });

        })
    }
</script>