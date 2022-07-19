
<div class="modal fade nopadd" id="generatebill" tabindex="-1" role="dialog"
     aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-full modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <i class="fa fa-remove"></i>
                </button>
                <h5 class="title title-up">
                    Bill</h5>
            </div>

            <div class="card-body">
                <div class="row bor-sep">
                    <div class="col-sm-9">
                        <form id="RegisterValidation" action="#" method="">
                            <div class="form-row">
                                <div class="row col-12">
                                    <div class="col-sm-3">
                                        <label>Supplier Name</label>
                                        <select class="selectpicker" id="Supplier-name" name="supplier_name" data-container="" data-size="7" data-style="btn btn-sm btn-secondary" title="Select supplier" data-hide-disabled="true">
                                            <option name="">Muzamel</option>
                                            <option name="">Gulshan Iqbar</option>
                                            <option name="">Zeeshan</option>
                                            <option name="">Ashar</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Terms</label>
                                        <select class="selectpicker" id="term" name="term_name" data-container="" data-size="7" data-style="btn btn-sm btn-secondary" title="Select term" data-hide-disabled="true">
                                            <option name="">1st Term</option>
                                            <option name="">2nd Term</option>
                                            <option name="">3rd Term Iqbar</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Bill date</label>
                                        <input type="date" name="bill_date" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Due date</label>
                                        <input type="date" name="due_date" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Bill no</label>
                                        <input type="text" name="receipt_no" class="form-control" placeholder="" value="10023">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="float-right">
                                    <small>BALANCE DUE</small>
                                </p>
                            </div>
                            <div class="col-sm-12">
                                <h5 class="float-right">
                                    <b>PRs 0.00</b>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- <div class="card-header"><h6 class="card-title">Transaction List</h6></div> -->
                            <div class="card-body">
                                <div class="toolbar">
                                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                                </div>
                                <table id="sample_table" class="table table-hover custom_border" cellspacing="0" width="100%">
                                    <thead class="table-secondary">
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="w-25">CATEGORY</th>
                                        <th class="w-50">DESCRIPTION</th>
                                        <th class="text-right w-15">Amount</th>
                                        <th class="text-center"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>
                                            <div class=" col-sm-12 col-lg-12 select-wizard">
                                                <select class="selectpicker" data-size="7" data-style="btn btn-sm btn-secondary" title="" data-live-search="true">
                                                    <option value="" disabled selected>Select Category</option>
                                                    <option value="1">Stationary</option>
                                                    <option value="2">Books</option>
                                                    <option value="1">Food</option>
                                                    <option value="2">Electronics</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class=""><input type="text"
                                                            class="form-control"
                                                            name="descr" placeholder="Books purchased from Afaq publishers Lahore ">
                                        </td>
                                        <td class="text-right">
                                            <input type="text"
                                                   class="form-control text-right"
                                                   name="amountpayment" placeholder=" Rs 15,000.00">
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-simple btn-tumblr btn-icon">
                                                <i class="fa fa-trash fa-lg delete-record" title="Delete" data-toggle=""></i>
                                            </button>                                                    </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>
                                            <div class=" col-sm-12 col-lg-12 select-wizard">
                                                <select class="selectpicker" data-size="7" data-style="btn btn-sm btn-secondary" title="" data-live-search="true" >
                                                    <option value="" disabled selected>Select Category</option>
                                                    <option value="1">Stationary</option>
                                                    <option value="2">Books</option>
                                                    <option value="1">Food</option>
                                                    <option value="2">Electronics</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="text"
                                                   class="form-control"
                                                   name="descr" placeholder=" ">
                                        </td>
                                        <td class="text-right">
                                            <input type="text"
                                                   class="form-control"
                                                   name="amountpayment" placeholder=" ">
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-simple btn-tumblr btn-icon">
                                                <i class="fa fa-trash fa-lg delete-record" title="Delete" data-toggle=""></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <table class="col-12">
                                        <tr>
                                            <td class="col-sm-10"></td>
                                            <td>
                                                <b>Total</b>
                                            </td>
                                            <td>
                                                <b>PRs0.00</b>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="btn-toolbar col-sm-6" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <button class="btn btn-round btn-sm btn-outline-success mr-2">Add lines</button>
                                            <button class="btn btn-sm btn-round btn-choice">Clear all lines</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-sm-4">

                                        <div class="form-group">
                                            <label for="memo">Memo</label>
                                            <textarea name="memo" id="memo" class="form-control" ></textarea>
                                        </div>
                                        <div class="flex ">
                                            <label for="file"> Attachment</label>
                                            <input type="file" class="form-control-file" name="file" id="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>\
                </div>
            </div>

            <div class="modal-footer">
                <div class="">
                    <button type="button" class="btn btn-link btn-sm btn-round  btn-secondary "
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
