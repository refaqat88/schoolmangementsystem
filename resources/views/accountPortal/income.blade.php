 @extends('layouts.master')
 @section('title', 'Income')
 @section('content')

 <div class="content">

    <div class="row">

        <div class="col-md-12">
                 <div class="card "> 
                    <div class="card-header">
                        <h4 class="card-title">Students</h4>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            <div class="form-group has-label col-sm-12 col-lg-auto">
                               <span>
                                   Filter By
                                   :
                               </span>
                            </div>
                            <div class="form-group col-sm-12 col-lg-auto select-wizard">
                                <select class="selectpicker filter_students" id="class" data-size="7" data-style="btn btn-secondary btn-round" title="Select Class" required="true" name="student_class">
                                    <option value="" disabled selected>Select Class</option>
                                    
                                    @if($classes)

                                        @foreach($classes as $classe)
                                        <option value="{{$classe->cls_Id}}">{{$classe->class}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-lg-auto select-wizard ">
                                <select class="selectpicker filter_students" 
                                        data-size="7" 
                                        id="section" 
                                        data-style="btn btn-secondary btn-round" 
                                        title="Select Section" 
                                        required="true" 
                                        name="student_section">
                                    <option value="" disabled selected>Select Section</option>
                                </select>
                            </div>
                            <!--<div class="category form-category">* Required fields</div>-->
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="">
                                    <div class="card-header">
                                        <h6 class="card-title">Student Income Record List</h6>
                                        <input type="hidden" name="page" id="page" value="listing">
                                    </div>
                                    <div class="card-body">
                                        <div class="toolbar">
                                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                                        </div>
                                       @include('accountPortal.partial.income')
                                    </div><!-- end content-->
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>               

    @include('accountPortal.modals.generatebill')

    @include('accountPortal.modals.receivebill')

    @include('accountPortal.modals.adjustfee')

    @include('accountPortal.modals.pendinginvoices')

    @include('accountPortal.modals.fee_statements')
    

   
@endsection


@section('front_script')
<script type="text/javascript" src="{{ asset('js/accountportal.js')}}"></script>
@endsection