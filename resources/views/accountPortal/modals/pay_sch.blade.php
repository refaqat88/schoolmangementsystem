<div class="modal fade " id="schedulepay" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-xl mb-3">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-remove"></i>
                </button>
                <h5 class="title title-up">Payroll Schedule</h5>
            </div>
            <div class="modal-body ">
                <div class="row">
                    <div class="col-sm-4 bor">
                        <div class="row">
                            <h6 class="col-sm-12">Employee Details</h6>
                            <div class="form-group col-sm-12 col-lg-12">

                            </div>
                            <div class="form-group col-sm-12 col-lg-6">
                                <label>Personal Number</label>
                                <input type="text" class="form-control" readonly="readonly" placeholder="HR-2021-011" name="pno" number="true"
                                       number="true">
                            </div>
                            <div class="form-group col-sm-12 col-lg-6">
                                <label class="text-center">Hiring Date</label>
                                <input type="text" class="form-control" readonly="readonly" placeholder="February 21, 2021"
                                       name="hiredate" number="true" number="true">
                            </div>
                            <div class="form-group col-sm-12 col-lg-6">
                                <label>First Name</label>
                                <input type="text" class="form-control" readonly="readonly" placeholder="Zulqarnain" name="fname" number="true"
                                       number="true">
                            </div>
                            <div class="form-group col-sm-12 col-lg-6">
                                <label>Last Name</label>
                                <input type="text" class="form-control" readonly="readonly" placeholder="Haider" name="lname" number="true"
                                       number="true">
                            </div>
                            <div class="form-group col-sm-12 col-lg-6">
                                <label class="text-center">National Identifier</label>
                                <input type="number" class="form-control" placeholder="17301-2112119-3" name="cnic"
                                       number="true" number="true">
                            </div>

                            <div class="form-group col-sm-12 col-lg-6">
                                <label class="text-center">Designation</label>
                                <input type="text" class="form-control" readonly="readonly" placeholder="Teacher" name="desig"
                                       number="true" number="true">
                            </div>


                            <div class="form-group col-sm-12 col-lg-6">
                                <label class="text-center">Email</label>
                                <input type="email" class="form-control" placeholder="abc@gmail.com" name="email"
                                       number="true" number="true">
                            </div>
                            <div class="form-group col-sm-12 col-lg-6">
                                <label class="text-center">Mobile Phone No</label>
                                <input type="number" class="form-control" placeholder="+92 300 xxxx xxx" name="mobileno"
                                       number="true" number="true">
                            </div>

                        </div>






                    </div>
<!--                    <div class="divider-auto mt-5"></div>-->
                    <div class="col-sm-7 bor-sep ml-3">
                        <div class="row">
                            <h6 class="col-sm-12">Pay Schedule Details</h6>
                            <div class="form-group col-sm-12 col-lg-12 select-wizard">
                                <label class="">Billing Frequency</label>
                                <select class="selectpicker" data-size="7" data-style="btn btn-secondary"
                                        title="Choose Schedule">
                                    <option value="" disabled selected>Choose Frequency</option>

                                    <option value="1">Daily</option>
                                    <option value="2">Weekly</option>
                                    <option value="3">Month</option>

                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-lg-4">
                                <label for="start">Starting Date:</label>

                                <input class="form-control" type="date" id="start" name="trip-start" value="">
                            </div>

                            <div class="form-group col-sm-12 col-lg-4">
                                <label for="start">End of the pay period</label>

                                <input class="form-control" type="date" id="start" name="trip-start" value=""
                                       >
                            </div>
                            <div class="form-group col-sm-12 col-lg-4">
                                <label for="start">Next Pay Day:</label>
                                <input class="form-control" type="date" id="start" name="trip-start" value=""/>
                            </div>



                            <div class="form-group col-sm-12 col-lg-4 select-wizard">
                                <label>Bill Type</label>
                                <select class="selectpicker" data-size="7" data-style="btn btn-secondary"
                                        title="Billing Type">
                                    <option value="" disabled selected>Choose type</option>
                                    <option value="1">Hourly</option>
                                    <option value="2">Daily</option>
                                    <option value="2">Salary</option>

                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-lg-4">
                                <label>Billing Rate (in PKrs) / Hour</label>
                                <input type="text" class="form-control" placeholder="" name="houseallow" number="true"
                                       number="true">
                            </div>

                            <div class="form-group col-sm-12 col-lg-4">
                                <label>Working Hours / Day</label>
                                <input type="text" class="form-control" placeholder="" name="houseallow" number="true"
                                       number="true">
                            </div>
                            <div class="form-group col-sm-12 col-lg-4">
                                <label>No of Days / Week</label>
                                <input type="text" class="form-control" placeholder="" name="houseallow" number="true"
                                       number="true">
                            </div>
                            <div class="form-group col-sm-12 col-lg-4">
                                <label>Incr Rate (%age)</label>
                                <input type="text" class="form-control" placeholder="" name="houseallow" number="true"
                                       number="true">
                            </div>
                            <div class="form-group col-sm-12 col-lg-4">
                                <label>Basic Pay</label>
                                <input type="text" class="form-control" placeholder="2500" name="basicpay" number="true"
                                       number="true">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row bor-sep">
                    <h6 class="col-sm-12">Allowances</h6><hr>
                    <div class="col-sm-12 form-check col-lg-3 ">
                        <label class="form-check-label">
                            <input class="form-check-input " type="checkbox" id="check_overtime" name="optionCheckboxes" data-toggle="modal" data-target="#overtime";>
                            <span class="form-check-sign "></span>
                            Over Time
                        </label>
                    </div>

                    <div class="col-sm-12 form-check col-lg-3 ">
                        <label class="form-check-label">
                            <input class="form-check-input " type="checkbox" name="optionCheckboxes" data-toggle="modal"
                                   data-target="#vacation">
                            <span class="form-check-sign "></span>
                            Vacation Pay
                        </label>
                    </div>

                    <div class="col-sm-12 form-check col-lg-3 ">
                        <label class="form-check-label">
                            <input class="form-check-input " type="checkbox" name="optionCheckboxes" data-toggle="modal"
                                   data-target="#bonus">
                            <span class="form-check-sign "></span>
                            Bonus
                        </label>
                    </div>



                    <div class="col-sm-12 form-check col-lg-3 ">
                        <label class="form-check-label">
                            <input class="form-check-input " type="checkbox" name="optionCheckboxes" data-toggle="modal"
                                   data-target="#commission">
                            <span class="form-check-sign "></span>
                            Commission
                        </label>
                    </div>


                    <div class="col-sm-12 form-check col-lg-3 ">
                        <label class="form-check-label">
                            <input class="form-check-input " type="checkbox" name="optionCheckboxes" data-toggle="modal"
                                   data-target="#medical" aria-haspopup="true">
                            <span class="form-check-sign "></span>
                            Medical Allowance
                        </label>
                    </div>



                    <div class="col-sm-12 form-check col-lg-3 ">
                        <label class="form-check-label">
                            <input class="form-check-input " type="checkbox" name="optionCheckboxes" data-toggle="modal"
                                   data-target="#house">
                            <span class="form-check-sign "></span>
                            House Allowance
                        </label>
                    </div>



                    <div class="col-sm-12 form-check col-lg-3 ">
                        <label class="form-check-label">
                            <input class="form-check-input " type="checkbox" name="optionCheckboxes" data-toggle="modal"
                                   data-target="#convayance">
                            <span class="form-check-sign"></span>
                            Conveyance Allowance
                        </label>
                    </div>

                    <div class="col-sm-12 form-check col-lg-3 ">
                        <label class="form-check-label">
                            <input class="form-check-input " type="checkbox" name="optionCheckboxes" data-toggle="modal"
                                   data-target="#education">
                            <span class="form-check-sign "></span>
                            Education Allowance
                        </label>
                    </div>


                    <div class="col-sm-12 form-check col-lg-3 ">
                        <label class="form-check-label">
                            <input class="form-check-input " type="checkbox" name="optionCheckboxes" data-toggle="modal"
                                   data-target="#utility">
                            <span class="form-check-sign "></span>
                            Utility Allowance
                        </label>
                    </div>
                    <div class="col-sm-12 form-check col-lg-3 ">
                        <label class="form-check-label">
                            <input class="form-check-input " type="checkbox" name="optionCheckboxes" data-toggle="modal"
                                   data-target="#arear">
                            <span class="form-check-sign "></span>
                            Arrears
                        </label>
                    </div>
                    <div class="col-sm-12 form-check col-lg-3 ">
                        <label class="form-check-label">
                            <input class="form-check-input " type="checkbox" name="optionCheckboxes" data-toggle="modal"
                                   data-target="#dearall">
                            <span class="form-check-sign "></span>
                            Dearness Allowance
                        </label>
                    </div>

                </div>
                <div class="row bor-sep">
                    <h6 class="col-sm-12">Deductions</h6><hr>
                    <div class="col-sm-12 form-check col-lg-3 ">
                        <label class="form-check-label">
                            <input class="form-check-input " type="checkbox" name="optionCheckboxes" data-toggle="modal"
                                   data-target="#advance">
                            <span class="form-check-sign "></span>
                            Advance Salary
                        </label>
                    </div>






                    <div class="col-sm-12 form-check col-lg-3 ">
                        <label class="form-check-label">
                            <input class="form-check-input " type="checkbox" name="optionCheckboxes" data-toggle="modal"
                                   data-target="#taxe">
                            <span class="form-check-sign "></span>
                            Income Tax
                        </label>
                    </div>



                    <div class="col-sm-12 form-check col-lg-3 ">
                        <label class="form-check-label">
                            <input class="form-check-input " type="checkbox" name="optionCheckboxes" data-toggle="modal"
                                   data-target="#providant">
                            <span class="form-check-sign "></span>
                            General Provident Fund
                        </label>
                    </div>




                    <div class="col-sm-12 form-check col-lg-3 ">
                        <label class="form-check-label">
                            <input class="form-check-input " type="checkbox" name="optionCheckboxes" data-toggle="modal"
                                   data-target="#gratuity">
                            <span class="form-check-sign "></span>
                            Gratuity
                        </label>
                    </div>

                </div>
                <div class=" row ">
                    <div class="col-sm-12 form-check col-lg-12  text-right">
                        <label class="form-check-label text-right font-weight-bold border-bottom">
                            Basic Pay: <span class='text-right ml-2 font-weight-normal '>PKrs 2500</span>
                        </label>
                    </div>
                    <div class="col-sm-12 form-check col-lg-12  text-right">
                        <label class="form-check-label text-right font-weight-bold  text-success-cus ">
                            Allowances: <span class='text-right ml-2 font-weight-normal '>PKrs 500</span>
                        </label>
                    </div>
                    <div class="col-sm-12 form-check col-lg-12  text-right">
                        <label class="form-check-label text-right font-weight-bold border-bottom ">
                            Gross Pay: <span class='text-right ml-2 font-weight-normal '>PKrs 3000</span>
                        </label>
                    </div>
                    <div class="col-sm-12 form-check col-lg-12 text-right">
                        <label class="form-check-label text-right font-weight-bold  text-warning">

                            Deductions: <span class='text-right ml-2 font-weight-normal'>PKrs 300</span>
                        </label>
                    </div>


                    <div class="col-sm-12 form-check col-lg-12  text-right ">
                        <label class="form-check-label text-right font-weight-bold dbl-bor-bottom">
                            Net Pay: <span class='text-right ml-2 font-weight-normal '>PRs2700</span>
                        </label>
                    </div>

                </div>

            </div>

                    <div class="modal-footer">
                        <div class="">
                            <button type="button" class="btn btn-success btn-link" data-dismiss="modal">Save</button>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-danger btn-link">Cancel</button>
                        </div>
                    </div>



        </div>
    </div>







</div>
