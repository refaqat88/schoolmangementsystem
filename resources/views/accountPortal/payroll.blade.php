 @extends('layouts.master')
 @section('title', 'Payroll')
 @section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Employees</h4>
                </div>

                <div class="card-body">
                    <div class="row bor-sep">
                        <div class="col-sm-12 col-lg-12 float-right">
                            <button
                                    class="btn btn-outline-choice btn-round  btn-sm pull-right generatepayroll "
                                    type="button" id=""   >
                                Generate Payroll
                            </button>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">Employee Pay Record
                                        List</h6>
                                </div>
                                <div class="card-body">
                                    <div class="toolbar">
                                        <div class="form-group col-sm-2 select-wizard">
                                            <select class="selectpicker filter_emptoy" id="status" name="status" data-size="7"
                                                    data-style="btn btn-sm btn-outline-secondary btn-round"
                                                    title="Filter">
                                                <option value="">All</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">inactive</option>
                                            </select>
                                        </div>
                                       
                                    </div>

                                     @include('accountPortal.partial.payroll')
   
                                </div><!-- end content-->
                            </div><!--  end card  -->
                        </div> <!-- end col-md-12 -->
                    </div>

                </div><!--  end card  -->
            </div> <!-- end col-md-12 -->
                             

        </div>
    </div>
</div>
    




    <div class="modal fade nopadd" id="printfeecard" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
         aria-hidden="true">
        <div class="modal-full modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">

                    <h6>Fee Annual Report 2021</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-remove"></i>
                    </button>

                </div>
                <div class="modal-body">
                    <h4 class='text-center'>Government Public School Parachinar</h4>

                    <div class="container mt-3 mb-3">
                        <div class="row mx-md-auto">
                            <div class="col-md-6">
                                <label class='font-weight-bold' class='font-weight-bold'>Student Name: </label>
                                <span class='border-bottom mx-2'>Ashar Hussain</span>

                            </div>
                            <div class="col-md-6">
                                <label class='font-weight-bold'>Father Name: </label>
                                <span class='border-bottom mx-2'>Syed Humayun</span>

                            </div>
                            <div class="col-md-6">
                                <label class='font-weight-bold'>Roll No: </label>
                                <span class='border-bottom mx-2'>1254</span>

                            </div>
                            <div class="col-md-6">
                                <label class='font-weight-bold'>Admission No: </label>
                                <span class='border-bottom mx-2'>85859</span>

                            </div>



                            <div class="col-md-6">
                                <label class='font-weight-bold'>Class: </label>
                                <span class='border-bottom mx-2'>10th (B)</span>

                            </div>


                            <div class="col-md-6">
                                <label class='font-weight-bold'>Monthly Fee: </label>
                                <span class='border-bottom mx-2'>5000</span>

                            </div>
                        </div>






                    </div>


                    <div class="col-md-12">

                        <table class="table table-bordered text-center">

                            <thead>
                            <th>MONTHS</th>
                            <th>Tution Fee</th>
                            <th>M.T.F</th>
                            <th>F.A.F</th>
                            <th>New Admission</th>
                            <th>F.C</th>
                            <th>Total</th>
                            <th>Receipt No</th>
                            <th>Date</th>
                            <th>Cashier</th>
                            <th>Remarks</th>
                            </thead>

                            <tbody>
                            <tr>
                                <th>January</th>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>

                            </tr>


                            <tr>
                                <th>February</th>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>

                            </tr>



                            <tr>
                                <th>March</th>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>

                            </tr>




                            <tr>
                                <th>April</th>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>

                            </tr>



                            <tr>
                                <th>May</th>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>

                            </tr>



                            <tr>
                                <th>June</th>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>

                            </tr>



                            <tr>
                                <th>July</th>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>

                            </tr>



                            <tr>
                                <th>August</th>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>

                            </tr>

                            <tr>
                                <th>September</th>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>

                            </tr>


                            <tr>
                                <th>October</th>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>

                            </tr>


                            <tr>
                                <th>November</th>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>

                            </tr>

                            <tr>
                                <th>December</th>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>

                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('accountPortal.modals.paygenerate_schedule')
    @include('accountPortal.modals.paymake_payment')
    @include('accountPortal.modals.print_payroll')
    @include('accountPortal.modals.emp_statements')
    @include('accountPortal.modals.generate_payroll')    
 @endsection
    
    <!--   Core JS Files   -->
    @section('front_script')
    <script type="text/javascript" src="{{ asset('js/payroll.js')}}"></script>
    @endsection