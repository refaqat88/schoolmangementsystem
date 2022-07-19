<div class="modal fade " id="generatepayroll" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-remove"></i>
                </button>
                <div class='col-md-12 text-left align-center'>
                    <h3>Payroll Statement</h3>
                </div>
            </div>
            <div class="modal-body modal-full">
            
            <div class=" row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="container-fluid bg-light p-4">

                                <div class='row d-flex flex-row'>
                                   
                                    <div class='col-md-3 col-sm-3 align-self-center text-center atop' >
                                        <h5 class='top_heading' style='font-size:200%;'>6,9898-/Rupees</h5>
                                        <h6 class='sub_heading'>TOTAL PAYROLL COST</h6>
                            
                                    </div>
                            
                                    <div class='col-md-2 col-sm-3 align-self-center text-center'>
                                        <div style="border-left: 1px solid blue;">
                                            <h5 class='top_heading'>6,9898-/Rupees</h5>
                                            <h6 class='sub_heading'>NET PAY</h6>
                                        </div>
                                        <div style="border-left: 1px solid blue;">
                                            <h5 class='top_heading'>6,9898-/Rupees</h5>
                                            <h6 class='sub_heading'>EMPLOYEE</h6>
                                        </div>
                                        <div style="border-left: 1px solid blue;">
                                            <h5 class='top_heading'>6,9898-/Rupees</h5>
                                            <h6 class='sub_heading'>EMPLOYER</h6>
                                        </div>
                                    </div>
                            
                            
                            
                                    <div class='col-md-3 col-sm-3 align-self-center'>
                                        <img src="chart.png" class='img-fluid' alt="">
                                    </div>
                            
                            
                                    <div class='col-md-4 col-sm-3 align-self-center' style="border-left: 1px solid blue;">
                                        <div>
                                            <h5 class='top_heading'>Paper checks for 6,9898-/Rupees</h5>
                                            <h6 class='sub_heading text-center'>Deliver these paychecks by 02/05/2021</h6>
                                        </div>
                                    </div>
                            
                                </div>
                            
                            </div>
                        
                        
                        </div>



                        <div class="container-fluid m-4">
                            <div class="row d-flex flex-row justify-content-end">
                                <div class="col-md-4 ml-md-auto d-flex flex-row">
                           <h5 class="top_heading">Pay Period:</h5>
                           <h6 class='m-2 sub_heading'>01/09/2021 to 02/09/2021</h6>
                                </div>
                        
                                <div class="col-md-3 ml-md-auto d-flex flex-row ">
                                    <h5 class='top_heading'>Pay Date:</h5>
                                    <h6 class='m-2 sub_heading'>05/09/2021</h6>
                                         </div>
                            </div>
                        </div>






                        <div class="card-body">
                            <div class="toolbar">
                                <div class="row">
                                    <div class="form-group col-sm-2 select-wizard">
                                        <select class="selectpicker" data-size="7"
                                            data-style="btn btn-sm btn-outline-secondary btn-round" title="Filter">
                                            <option value="1">All</option>
                                            <option value="2">Daily</option>
                                            <option value="3">Monthky</option>
                                            <option value="4">Yearly</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-10 float-right">
                                        <button class="btn btn-simple btn-tumblr btn-icon float-right "><i
                                                class="fa fa-print" title="Print" data-toggle=""></i></button>
                                        <button class="btn btn-simple btn-tumblr btn-icon float-right "><i
                                                class="fa fa-file-excel-o" title="Export to Excel"
                                                data-toggle=""></i></button>
                                    </div>
                                </div>
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <table id="paystatementdatatable" class="custom_border table-hover"
                                cellspacing="0" width="100%">
                                <thead class="table-secondary">
                                    <tr class="text-center">
                                        <th class='sorting_disabled'><input class="text-decoration-none" type="checkbox" name="select_all" value="1" 
                                            id="example-select-all"></th>
                                            <th>EMP No</th>

                                        <th>EMPLOYEE</th>
                                        <th>PAY METHOD</th>
                                        <th class='sorting_disabled'>BILL TYPE</th>
                                        <th>TOTAL PAY</th>
                                        <th>TAX & DEDUCTION</th>
                                        <th>NET PAY</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id='emp'>
                                
                                   
                                </tbody>
                                <tfoot>
                                    <tr class='text-center'>
                                        <th></th>
                                        <th colspan="4" class="text-center">TOTAL</th>
                                        <th id='total_pay'></th>
                                        <th id='tax'></th>
                                        <th id='net_pay'></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                     


                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">

                <div class="">
                    <button type="button" data-dismiss="modal" class="btn btn-outline-success btn-round btn-sm">Save</button>
                </div>
            </div>


        </div>


    </div>
    </form>
</div>
