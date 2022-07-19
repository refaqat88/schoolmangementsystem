<div class="modal fade nopadd" id="paychequemodal" tabindex="-1" role="dialog"
                 aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-full modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <i class="fa fa-remove"></i>
                </button>
                <h5 class="title title-up">
                    Cheque</h5>
            </div>

            <div class="card-body">
                <div class="row ">
                    <div class="col-md-12">
                        <form id="RegisterValidation" action="#" method="">
                            <div class="card ">
                                <div class="card-header ">
                                    <h6 class="card-title">Cheque <span>no .1</span></h6>
                                </div>
                                <div class="card-body">

                                    <div class="row bor-sep">
                                        <div class="col-sm-12 col-lg-9">
                                            <form>
                                                <div class="row ">
                                                    <div class="col-sm-12 col-lg-3">
                                                        <label>Payee</label>
                                                        <select class="selectpicker" id="payee-name" name="Payee_name" data-container="" data-size="7" data-style="btn btn-sm btn-secondary" title="Select supplier"  data-hide-disabled="true">
                                                            <option name="" selected>Who did you pay ?</option>
                                                            <option name="">Ashtiaq</option>
                                                            <option name="">Muzamel</option>
                                                            <option name="">Gulshan Iqbar</option>
                                                            <option name="">Zeeshan</option>
                                                            <option name="">Ashar</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-4">
                                                        <label>Bank account</label>
                                                        <select class="selectpicker" id="bank-acc-name" name="bank_account_name" data-container="" data-size="7" data-style="btn btn-sm btn-secondary" title="Select term"  data-hide-disabled="true">
                                                            <option value="" disabled selected>Cash and cash equivalents</option>
                                                            <option name="">Cash and cash equivalents</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-3">
                                                        <label>Payement date</label>
                                                        <input type="date" name="payement_date" class="form-control" placeholder="">
                                                    </div>
                                                    <div class="col-sm-12 col-lg-2">
                                                        <label>Cheque no</label>
                                                        <input type="text" name="cheque_no" class="form-control" placeholder="" value="12">
                                                    </div>
                                                </div>

                                            </form>
                                        </div>

                                        <div class="col-sm-12 col-lg-3">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p class="float-right"><small>AMOUNT</small></p>
                                                </div>
                                                <div class="col-sm-12">
                                                    <h5 class="float-right"><b>PRs 12,250.00</b></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="card">
                                                <!-- <div class="card-header">
                                                    <h6 class="card-title">Transaction List</h6>
                                                </div> -->
                                                <div class="card-body">
                                                    <div class="toolbar">

                                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                    </div>
                                                    <table id="sample_table" class="table table-hover custom_border" cellspacing="0" width="100%">
                                                        <thead class="table-secondary">
                                                        <tr>

                                                            <th class="text-center">S.No</th>
                                                            <th>CATEGORY</th>
                                                            <th>DESCRIPTION</th>
                                                            <th class="text-right">Amount</th>
                                                            <th class="text-center"> </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <tr>

                                                            <td class="text-center">2</td>
                                                            <td>Utility bills</td>
                                                            <td>Electricity bill for June, 2021</td>
                                                            <td class="text-right">12,250.00</td>
                                                            <td class="text-center">
                                                                <i class="fa fa-lg fa-trash delete-record"></i>
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td class="text-center">2</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="text-right"></td>
                                                            <td class="text-center">
                                                                <i class="fa fa-trash fa-lg delete-record"></i>
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                    <div class="row">
                                                        <table class="col-12">
                                                            <tr>
                                                                <td class="col-sm-10"></td>
                                                                <td><b>Total</b></td>
                                                                <td><b>PRs 12,250.00</b></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="row">
                                                        <div class="btn-toolbar col-sm-6" role="toolbar" aria-label="Toolbar with button groups">
                                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                                <button class="btn btn-round btn-sm btn-outline-success mr-2">Add lines</button>
                                                                <button class="btn btn-round btn-sm btn-choice">Clear all lines</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-5">
                                                        <div class="col-sm-4">
                                                            <form>
                                                                <div class="form-group">
                                                                    <label for="memo">Memo</label>
                                                                    <textarea name="memo" class="form-control" ></textarea>
                                                                </div>
                                                                <label for="file"> Attachment</label>
                                                                <input type="file" name="file" id="basic">

                                                            </form>
                                                        </div>

                                                    </div>
                                                </div><!-- end content-->
                                            </div><!--  end card  -->
                                        </div> <!-- end col-md-12 -->
                                    </div> <!-- end row -->
                                </div>


                            </div>


                        </form>
                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <div class="">
                    <button type="button" class="btn btn-sm btn-link btn-round  btn-secondary "
                            data-dismiss="modal">Save</button>
                </div>
                <div class="divider"></div>
                <div class="">
                    <button type="button"
                            class="btn btn-link btn-sm  btn-round btn-danger " data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>