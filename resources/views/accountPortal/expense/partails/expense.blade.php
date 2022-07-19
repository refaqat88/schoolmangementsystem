<div class="modal fade nopadd" id="generateexpense" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
     aria-hidden="true">
    <div class="modal-full modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <i class="fa fa-remove"></i>
                </button>
                <h5 class="title title-up">
                    Create Expense</h5>
            </div>
            <div class="modal-body row">
                <div class="row">
                    <div class="col-md-12">
                        <form id="RegisterValidation" action="#" method="">
                            <div class="card ">
                                <div class="card-header ">
                                    <h6 class="card-title">Expense</h6>
                                </div>
                                <div class="card-body">

                                    <div class="row bor-sep">
                                        <div class="col-sm-9">
                                            <form>
                                                <div class="form-row">
                                                    <div class="row col-12">
                                                        <div class="col-sm-3">
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
                                                        <div class="col-sm-3">
                                                            <label>Payment account</label>
                                                            <select class="selectpicker" id="term" name="payement_name" data-container="" data-size="7" data-style="btn btn-sm btn-secondary" title="Select term"  data-hide-disabled="true">
                                                                <option value="" disabled selected>Cash and cash equivalents</option>
                                                                <option name="">Cash and cash equivalents</option>

                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label>Payement date</label>
                                                            <input type="date" name="payement_date" class="form-control" placeholder="">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label>Payment method</label>
                                                            <input type="date" name="payment_method" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label>Ref no</label>
                                                            <input type="text" name="ref_no" class="form-control" placeholder="" value="10023">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p class="float-right"><small>AMOUNT</small></p>
                                                </div>
                                                <div class="col-sm-12">
                                                    <h5 class="float-right"><b>PRs 0.00</b></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
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

                                                        <th class="text-center" width="5%">S.No</th>
                                                        <th class="w-25">CATEGORY</th>
                                                        <th class="w-40">DESCRIPTION</th>
                                                        <th class="text-right w-15">Amount</th>
                                                        <th class="text-center" width="5%"> </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>

                                                        <td class="text-center">1</td>
                                                        <td>Furniture</td>
                                                        <td>Chairs purchased from ABC furnitures </td>
                                                        <td class="text-right">12,250.00</td>
                                                        <td class="text-center">
                                                            <a class="btn btn-simple btn-tumblr btn-icon" title="Delete"> <i class="fa fa-trash fa-lg delete-record"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>

                                                        <td class="text-center">2</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="text-right"></td>
                                                        <td class="text-center" >
                                                            <a class="btn btn-simple btn-tumblr btn-icon" title="Delete"> <i class="fa fa-trash fa-lg delete-record"></i></a>
                                                        </td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                    <table class="col-12">
                                                        <tr>
                                                            <td class="col-sm-10"></td>
                                                            <td><b>Total</b></td>
                                                            <td><b>PRs0.00</b></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="btn-toolbar col-sm-6" role="toolbar" aria-label="Toolbar with button groups">
                                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                                            <button class="btn btn-sm btn-round btn-outline-success mr-2">Add lines</button>
                                                            <button class="btn btn-sm btn-round btn-choice">Clear all lines</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-5">
                                                    <div class="col-sm-4">
                                                        <form>
                                                            <div class="form-group">
                                                                <label for="memo">Memo</label>
                                                                <textarea name="memo" id="memo" class="form-control" ></textarea>
                                                            </div>
                                                            <div class="flex ">
                                                                <label for="file"> Attachment</label>
                                                                <input type="file" class="form-control-file" name="file" id="file">
                                                            </div>
                                                        </form>
                                                     </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <div class="">
                    <button type="submit" class="btn btn-secondary btn-sm  btn-round btn-link" data-dismiss="modal">Save</button>
                </div>
                <div class="divider"></div>
                <div class="">
                    <button type="button" class="btn btn-sm btn-danger btn-round btn-link" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

