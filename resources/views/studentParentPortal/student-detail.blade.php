@extends('layouts.master')
@section('title', 'Admission')
@section('content')
    <style>
        .div-hover-cus{
            cursor: pointer;
        }
    </style>
    <div class="content">

        @php
            //dd($role);
        @endphp
        @php
            if($role->name=='parent')
            {
                $id=$user->id;

             }else if($role->name=='Student')
            {
                $id=$user->id;

             }else{
                 $id='';
            }
        @endphp
        <div class="row">
            <div class="col-ms-12" id="s" style="width:100% ; display: none;">
                <img id="loading-image" src="{{asset('upload/loading12.png')}}"  width="100%" />
            </div>
        </div>
        @if($childrens != '')
                <div class="col-md-12">
        {{--@foreach($childrens as $children)
          <div class="col-md-3">
           <ul class="nav" id="childernnav" >
           <li class="">
               <div class="card" style="width: 18rem; text-align: center">
                   <div class="card-body">
                       <a href="javascript:void(0)" id="{{$children->id}}" class="button studentrecord" data-type="attendance"  data-id="{{$children->id}}">
                           <span class="sidebar-normal"> {{$children->name}}</span>

                       <div>Class:{{$children->studentinfo?$children->studentinfo->class->class:''}} Section:{{$children->studentinfo?$children->studentinfo->section->class_section_name:''}}</div>
                       <div><img src="{{asset('upload/user/'.$children->user_image)}}" alt="Student Image" width="100" height="auto"></div>
                       </a>
                   </div>

               </div>
            </li>
           </ul>
         </div>--}}
                        @foreach($childrens as $children)
                        @php //dd($children->studentinfo->section->class_section_name);@endphp
                        <div class="col-md-4 float-left">
                            <ul class="childernnav" >
                            <div class="card card-user">
                                <div class="image" style="padding-top: 10px;text-align: center;">
                                    <img style="width: 119px;height: 85px;" src="{{$school->photo()}}" alt="...">
                                </div>
                                <div class="card-body" style="min-height: 0px;padding-bottom: 0;">
                                    <div class="author">
                                        <a href="javascript:void(0)" id="{{$children->id}}" class="button studentrecord" data-type="statistics"  data-id="{{$children->id}}">

                                            <img class="avatar border-gray" src="{{asset('upload/user/'.$children->user_image)}}" alt="Student Image" >
                                            <h6 class="title"> {{$children->name}}</h6>
                                        </a>
                                       {{-- <p class="description">
                                            @chetfaker
                                        </p>--}}
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <hr>
                                    <div class="button-container">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-6 ml-auto">
                                                <h6>Class<br><small>{{$children->studentinfo->class?$children->studentinfo->class->class:''}}</small></h6>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-6 ml-auto mr-auto">
                                                <h6>Section<br><small>{{$children->studentinfo->section?$children->studentinfo->section->class_section_name:''}}</small></h6>
                                            </div>
                                            {{--<div class="col-lg-3 mr-auto">

                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </ul>
                        </div>
        @endforeach
         </div>

        @else





        @endif


        <div   id="myDiv">

        </div>





    </div>

@endsection
@section('front_script')
{{--    <script src="{{asset('js/datatable/dataTables.buttons.min.js')}}"></script>--}}
{{--    <script src="{{asset('js/datatable/jszip.min.js')}}"></script>--}}
{{--    <script src="{{asset('js/datatable/pdfmake.min.js')}}"></script>--}}
{{--    <script src="{{asset('js/datatable/vfs_fonts.js')}}"></script>--}}
{{--    <script src="{{asset('js/datatable/buttons.html5.min.js')}}"></script>--}}
{{--    <script src="{{asset('js/datatable/buttons.print.min.js')}}"></script>--}}


{{--    <script src="{{asset('js/jspdf/printthis.js')}}"></script>--}}
    <script src="{{asset('js/jspdf/jspdf.min.js')}}"></script>
    <script src="{{asset('js/jspdf/jspdf-autotable.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/students_portal.js')}}"></script>
     <script type="text/javascript">
         @if($childrens == '')
        myDivs({{$user->id}},'statistics');
         @endif
    </script>

@endsection
