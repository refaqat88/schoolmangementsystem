
    @include('studentParentPortal.tabs.tabsidebar')
   
    <div class="col-sm-9">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="shedule-class">
                        <h4>Class {{$user->studentinfo->class?$user->studentinfo->class->class:''}} Section {{$user->studentinfo->section?$user->studentinfo->section->class_section_name:''}} Schedule</h4>
                    </div>



                    <div class="card-body">
                        <div id="my-tab-content" class="tab-content ">
                            <div class="tab-pane active" id="viewsyllabus" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <div class="card-header">
                                                                <h6 class="card-title">Schedule</h6>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="toolbar">
                                                                    <div class="row">
                                                                        <div class="form-group col-sm-2 select-wizard">
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-sm btn-outline-secondary btn-round" title="Filter" >
                                                                                <option value="1">Scheduled</option>
                                                                                <option value="2">Completed</option>
                                                                                <option value="4">All</option>
                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                                </div>
                                                                <table id="schedulee-table" class="table-desi table table-striped table-bordered" cellspacing="0" width="100%">
                                                                    <thead>
                                                                    @if($scheduleList !="")
                                                                        <th style="width: 5%;">#</th>
                                                                        @foreach($scheduleList['days'] as $val )

                                                                            <th style="width: 19%;">{{$val->name}}</th>
                                                                        @endforeach
                                                                    @endif
                                                                    </thead>

                                                                    <tbody>

                                                                    @if($scheduleList !="")
                                                                        @php

                                                                            ///dd($scheduleList['class']->class);

                                                                            $schdulePeriod = "";
                                                                            $i = 1;


                                                                            foreach($scheduleList['periods'] as $keyp=>$valp){

                                                                                //echo "<pre>"; print_r($i);

                                                                                 $schdulePeriod .='<tr>

                                                                                         <td class="table-light">
                                                                                            <div class="row">
                                                                                                <div class="col-xl-12 text-center">
                                                                                                    <h6>'.$i++.'</h6>
                                                                                                    </div>

                                                                                            </div>
                                                                                        </td>';


                                                                                 foreach($scheduleList['days'] as $keyd=>$vald){


                                                                                     $start_time= "";
                                                                                     $subjectname= "";
                                                                                     $end_time= "";
                                                                                     $teacherveename= "";

                                                                                        //dd($scheduleList['list'][$valp->id][$vald->id]);
                                                                                       if (sizeof($scheduleList['list']) != 0) {

                                                                                                $teacherveename = $scheduleList['list'][$valp->id][$vald->id]?$scheduleList['list'][$valp->id][$vald->id]['teacher']:'';
                                                                                                //dd($teacherveename);


                                                                                                 $subjectname = $scheduleList['list'][$valp->id][$vald->id]?$scheduleList['list'][$valp->id][$vald->id]['subject']->subject:'';
                                                                                                 $start_time = $subjectname && $teacherveename!='N/A'?$valp->start_time:'';
                                                                                                 $end_time = $subjectname && $teacherveename!='N/A'?$valp->end_time:'';
                                                                                                 //dd($subjectname);
                                                                                       }else{
                                                                                            $teacherveename ='';
                                                                                            $subjectname ='';
                                                                                       }





                                                                                $schdulePeriod .='
                                                                                <td class="font text-center"><div class="text-center">'.$start_time.' - '.$end_time.'</div><div class="text-center mt-1"> <strong>'.$subjectname.'</strong></div><div class="text-center mt-1">'.$teacherveename.'</div>

                                                                                    </td>';


                                                                                 $schdulePeriod .=`</tr>`;

                                                                                 //$i++;
                                                                            }
                                                                            }
                                                                            echo $schdulePeriod;

                                                                        @endphp
                                                                    @endif
                                                                    </tbody>
                                                                </table>
                                                            </div><!-- end content-->
                                                        </div><!--  end card  -->
                                                    </div> <!-- end col-md-12 -->
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


