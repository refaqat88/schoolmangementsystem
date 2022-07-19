
@php
    $i= 1 ;

@endphp

@foreach($class_schedule as $schedule)
    @php
        $serialized_class_schedule_arry = $schedule->timetable;
        $unserialized_class_schedule_arry = unserialize($serialized_class_schedule_arry);


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
                    <button class="btn-link btn-cus-weight" onclick="showViewClass({{ $schedule->ttable_Id }});" type="button" data-id="" data-toggle="modal" data-target="#viewclassschedule" aria-haspopup="true" aria-expanded="false">
                        View
                    </button>
                </a>

            </div>
            <div class="nav-item btn-rotate dropdown pull-right ">
                <a class="nav-link dropdown-toggle pull-right" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" data-id="{{$schedule->ttable_Id}}" aria-haspopup="true" aria-expanded="false">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
{{--                    <a class="dropdown-item" href="#" data-toggle="modal" data-id="{{$schedule->ttable_Id}}" aria-haspopup="true" aria-expanded="false">Edit</a>--}}
                    <a class="dropdown-item" onclick="deleteClassSched({{$schedule->ttable_Id}});" data-id="" href="#">Delete</a>
                </div>
            </div>
        </div>
    </td>
</tr>
    @endforeach

<script>
    function showViewClass(id){

        $.get('show-viewClass-schedule/'+id, function (data) {
            // console.log('data=========',data);
            var classSche = data.unserialized_array;
            // $("#period1").empty();
            // $("#period2").empty();
            // $("#period3").empty();
            // $("#period4").empty();
            // $("#period5").empty();
            // $("#period6").empty();
            // $("#period7").empty();
            // $("#period8").empty();
            $("#classPeroid1 tbody").empty();
            $("#classPeroid2 tbody").empty();
            $("#classPeroid3 tbody").empty();
            $("#classPeroid4 tbody").empty();
            $("#classPeroid5 tbody").empty();
            $("#classPeroid6 tbody").empty();
            $("#classPeroid7 tbody").empty();
            $("#classPeroid8 tbody").empty();


            $.each(classSche, function(key, val) {
                var periods = val.periods;
                console.log("perrrrrr",val);

                // console.log('unserialized periods days===',val);return false;
                if(periods == 1){

                    var markup = "<tr><th>" + val.days + "</th>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + val.teachers + "</td><td>" + val.start_time +" - "+ val.end_time + "</td></tr>";
                    $("#classPeroid1 tbody")
                }
                if(periods == 2){

                    var markup = "<tr><th>" + val.days + "</th>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + val.teachers + "</td><td>" + val.start_time +" - "+ val.end_time + "</td></tr>";
                    $("#classPeroid2 tbody").append(markup);
                }
                if(periods == 3){
                    // console.log('i ==',i++);
                    var markup = "<tr><th>" + val.days + "</th>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + val.teachers + "</td><td>" + val.start_time +" - "+ val.end_time + "</td></tr>";
                    $("#classPeroid3 tbody").append(markup);
                }
                if(periods == 4){

                    var markup = "<tr><th>" + val.days + "</th>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + val.teachers + "</td><td>" + val.start_time +" - "+ val.end_time + "</td></tr>";
                    $("#classPeroid4 tbody").append(markup);
                }
                if(periods == 5){

                    var markup = "<tr><th>" + val.days + "</th>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + val.teachers + "</td><td>" + val.start_time +" - "+ val.end_time + "</td></tr>";
                    $("#classPeroid5 tbody").append(markup);
                }
                if(periods == 6){

                    var markup = "<tr><th>" + val.days + "</th>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + val.teachers + "</td><td>" + val.start_time +" - "+ val.end_time + "</td></tr>";
                    $("#classPeroid6 tbody").append(markup);
                }
                if(periods == 7){

                    var markup = "<tr><th>" + val.days + "</th>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + val.teachers + "</td><td>" + val.start_time +" - "+ val.end_time + "</td></tr>";
                    $("#classPeroid7 tbody").append(markup);
                }
                if(periods == 8){

                    var markup = "<tr><th>" + val.days + "</th>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + val.teachers + "</td><td>" + val.start_time +" - "+ val.end_time + "</td></tr>";
                    $("#classPeroid8 tbody").append(markup);
                }

                //
                //
                //         // $('select[name="subject"]').append('<option value="'+ key +'">'+ value +'</option>');
            });

        })
    }
</script>