 <form id="RegisterValidation" action="#" method="">
      <div class="card">
         
         <div class="card-body">

            <div class="row">
                  <div class="form-group col-sm-2 select-wizard">
                     
                  </div>
                  {{--<div class="col-sm-10 float-right">
                     <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-print" title="Print"
                        data-toggle=""></i></button>
                     <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-file-excel-o"
                        title="Export to Excel" data-toggle=""></i></button>
                  </div>--}}
               </div>

 {{--           <div class="toolbar">
               <div class="row">
                  <div class="form-group col-sm-2 select-wizard">
                     <select class="selectpicker" data-size="7" data-style="btn btn-sm btn-outline-secondary btn-round"
                        title="Filter">
                        <option value="1">All</option>
                        <option value="2">9th</option>
                        <option value="3">10th</option>
                     </select>
                  </div>
                  <div class="col-sm-10 float-right">
                     <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-print" title="Print"
                        data-toggle=""></i></button>
                     <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-file-excel-o"
                        title="Export to Excel" data-toggle=""></i></button>
                  </div>
               </div>
            </div>--}}
            <div class="row">
               <div class="col-lg-3 col-md-6 col-sm-6" >
                  <div>
                     <div>
                        <div class="row">
                           <div class="col-12 col-md-12" style="border-left:1px solid black ">
                              <div>
                                 <p>{{$total_student}}</p>
                                 <b>Total Student</b>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6" >
                  <div>
                     <div>
                        <div class="row">
                           <div class="col-12 col-md-12" style="border-left:1px solid black ">
                              <div>
                                 <p>{{$active_student}}</p>
                                 <b class="card-title">Active</b>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6" >
                  <div>
                     <div>
                        <div class="row">
                           <div class="col-12 col-md-12" style="border-left:1px solid black ">
                              <div>
                                 <p>{{$none_active_student}}</p>
                                 <b>None Active</b>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6" >
                  <div>
                     <div>
                        <div class="row">
                           <div class="col-12 col-md-12" style="border-left:1px solid black">
                              <div>
                                 <p>{{date('Y')}}</p>
                                 <b>Year</b>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <table id="paystatementdatatable" data-id="paystatementdatatable" class="table custom_border table-hover" cellspacing="0" width="100%">
               <thead>
                  <tr class="text-center">
                     <th>S.No</th>
                     <th>Ad No</th>
                     <th>Student</th>
                     <th>Father Name</th>
                     <th>Class</th>
                     <th>Date</th>
                     <th>Status</th>

                  </tr>
               </thead>
               <tbody id='feess'>
               @if (!$students->isEmpty())

                  @php $i=1 ;@endphp
                  @foreach($students as $student)
                     @php

                        $father = $student->studentinfo?$student->studentinfo->father($student->studentinfo->father_id):'';
                     @endphp

                  <tr>
                     <td>{{$i++}}</td>
                     <td>{{$student->studentinfo?$student->studentinfo->admission->adm_Number:''}}</td>
                     <td>{{$student->name}}</td>
                     <td>{{($father)?$father->name:''}}</td>
                     <td>{{$student->studentinfo?$student->studentinfo->class->class:''}}</td>
                     <td>{{$student->studentinfo? date('d-m-Y',strtotime($student->studentinfo->admission->adm_Date)):''}}</td>
                     <td>{{$student->status}}</td>

                  </tr>
                  @endforeach
                  @else
                  <tr>
                     <td style="text-align: center; vertical-align: middle;" colspan="7" >No record exist!</td>
                  </tr>

               @endif
               </tbody>
          
            </table>
         </div>
      </div>
   </form>

 <script>
    function datatable(datatId){

       $('#'+datatId).DataTable({
          "pagingType": "full_numbers",
          "lengthMenu": [
             [10, 25, 50, -1],
             [10, 25, 50, "All"]
          ],
          dom: 'Bfrtip',
          buttons: [
             {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                className: 'btn btn-default  btn-simple btn-tumblr btn-icon',
                titleAttr: 'Copy',
                exportOptions: {
                   columns: ':visible:not(:contains(Actions))'
                },
             },
             {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                className: 'btn btn-default  btn-simple btn-tumblr btn-icon  ',
                titleAttr: 'Excel',
                exportOptions: {
                   columns: ':visible:not(:contains(Actions))'
                },
             },
             {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',
                className: 'btn btn-default  btn-simple btn-tumblr btn-icon',
                titleAttr: 'CSV',
                exportOptions: {
                   columns: ':visible:not(:contains(Actions))'
                },
             },
             {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                className: 'btn btn-default  btn-simple btn-tumblr btn-icon ',
                titleAttr: 'PDF',
                exportOptions: {
                   columns: ':visible:not(:contains(Actions))'
                },
             },
             {
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                className: 'btn btn-default  btn-simple btn-tumblr btn-icon',
                autoPrint: true,
                exportOptions: {
                   columns: ':visible:not(:contains(Actions))'
                },
             },

          ],
          responsive: true,
          language: {
             search: "_INPUT_",
             searchPlaceholder: "Search",
          }

       });

    }
    $(document).ready( function(){

       $("table").each( function(e){

          if($(this).data('id')== $(this).attr('id')){

             datatable($(this).data('id'));
          }

       })

       $('.datepicker').datetimepicker({
          format: 'YYYY-MM-DD'
       });
    })

 </script>