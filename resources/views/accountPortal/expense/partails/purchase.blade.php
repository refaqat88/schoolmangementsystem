<div class="modal fade nopadd" id="createpurchaseorder" tabindex="-1" role="dialog"
               aria-labelledby="ModalLabel" aria-hidden="true">
              <div class="modal-full modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header justify-content-center">
                          <button type="button" class="close" data-dismiss="modal"
                                  aria-label="Close">
                              <i class="fa fa-remove"></i>
                          </button>
                          <h5 class="title title-up">
                              Purchase Order</h5>
                      </div>

                      <div class="card-body">
                          <div class="row bor-sep">
                              <div class="col-sm-9">
                                  <form>
                                      <div class="form">
                                          <div class="row ">
                                              <div class="col-sm-4">
                                                  <label>Supplier</label>
                                                  <select class="selectpicker" id="supplier-name" name="supplier_name" data-container="" data-size="7" data-style="btn btn-sm btn-secondary" title="Select supplier"  data-hide-disabled="true">
                                                      <option name="" selected>choose a supplier</option>
                                                      <option name="">Ashtiaq</option>
                                                      <option name="">Muzamel</option>
                                                      <option name="">Gulshan Iqbar</option>
                                                      <option name="">Zeeshan</option>
                                                      <option name="">Ashar</option>
                                                  </select>
                                              </div>
                                              <div class="col-sm-3">
                                                  <label>Email</label>
                                                  <input type="email" name="email" class="form-control" placeholder="Email">
                                              </div>
                                              <div class="col-sm-3">
                                                  <label>Ship to</label>
                                                  <select class="selectpicker" id="customer-address" name="customer_address" data-container="" data-size="7" data-style="btn btn-sm btn-secondary" title="Select term"  data-hide-disabled="true">
                                                      <option value="" selected>Select customer for add</option>
                                                      <option name="">Ashtiaq</option>
                                                      <option name="">Muzamel</option>
                                                      <option name="">Gulshan Iqbar</option>
                                                      <option name="">Zeeshan</option>
                                                      <option name="">Ashar</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="row ">
                                              <div class="col-sm-4">
                                                  <label>Purchase order date</label>
                                                  <input type="date" name="purchase_order_date" class="form-control" placeholder="">
                                              </div>
                                              <div class="col-sm-4">
                                                  <label for="shipping-address">Shipping address</label>
                                                  <textarea name="shipping-address" class="form-control" ></textarea>
                                              </div>
                                              <div class="col-sm-2">
                                                  <label>Cheque no</label>
                                                  <input type="text" name="cheque_no" class="form-control" placeholder="" value="12">
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
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="card">
                                      <div class="card-header">
                                          <h6 class="card-title">Category details</h6>
                                      </div>
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

                                                  <td class="text-center">1</td>
                                                  <td>Term Fee</td>
                                                  <td>Invoice #10003 (08/30/2021)</td>
                                                  <td class="text-right">2,250.00</td>
                                                  <td class="text-center">
                                                      <i class="fa fa-trash fa-lg delete-record"></i>
                                                  </td>
                                              </tr>
                                              <tr>

                                                  <td class="text-center"> 2</td>
                                                  <td>Term Fee</td>
                                                  <td>Invoice #10003 (08/30/2021)</td>
                                                  <td class="text-right">2,250.00</td>
                                                  <td class="text-center">
                                                      <i class="fa fa-trash fa-lg delete-record"></i>
                                                  </td>
                                              </tr>
                                              <tr>

                                                  <td class="text-center">3</td>
                                                  <td>Admission Fee</td>
                                                  <td>Invoice #10003 (08/30/2021)</td>
                                                  <td class="text-right">2,250.00</td>
                                                  <td class="text-center">
                                                      <i class="fa fa-trash fa-lg delete-record"></i>
                                                  </td>
                                              </tr>

                                              </tbody>
                                          </table>
                                          <div class="row">
                                              <div class="row col-12">
                                                  <div class="btn-toolbar col-sm-6" role="toolbar" aria-label="Toolbar with button groups">
                                                      <div class="btn-group mr-2" role="group" aria-label="First group">
                                                          <button class="btn btn-round btn-r btn-sm btn-outline-success mr-2">Add lines</button>
                                                          <button class="btn btn-choice btn-sm btn-round">Clear all lines</button>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="card">
                                              <div class="card-header">
                                                  <h6 class="card-title">Item details</h6>
                                              </div>
                                              <div class="card-body">
                                                  <div class="toolbar">
                                                      <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                  </div>
                                                  <table id="sample_table" class="table table-hover custom_border" cellspacing="0" width="100%">
                                                      <thead>
                                                      <tr class="table-secondary">

                                                          <th class="text-center">S.No</th>
                                                          <th>CATEGORY</th>
                                                          <th>DESCRIPTION</th>
                                                          <th class="text-right">Amount</th>
                                                          <th class="text-center"> </th>
                                                      </tr>
                                                      </thead>
                                                      <tbody>
                                                      <tr>

                                                          <td class="text-center">1</td>
                                                          <td>Term Fee</td>
                                                          <td>Invoice #10003 (08/30/2021)</td>
                                                          <td class="text-right">2,250.00</td>
                                                          <td class="text-center">
                                                              <i class="fa fa-trash fa-lg delete-record"></i>
                                                          </td>
                                                      </tr>
                                                      <tr>

                                                          <td class="text-center"> 2</td>
                                                          <td>Term Fee</td>
                                                          <td>Invoice #10003 (08/30/2021)</td>
                                                          <td class="text-right">2,250.00</td>
                                                          <td class="text-center">
                                                              <i class="fa fa-trash fa-lg delete-record"></i>
                                                          </td>
                                                      </tr>
                                                      <tr>

                                                          <td class="text-center">3</td>
                                                          <td>Admission Fee</td>
                                                          <td>Invoice #10003 (08/30/2021)</td>
                                                          <td class="text-right">2,250.00</td>
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
                                                              <td><b>PRs0.00</b></td>
                                                          </tr>
                                                      </table>
                                                  </div>
                                                  <div class="row">
                                                      <div class="btn-toolbar col-sm-6" role="toolbar" aria-label="Toolbar with button groups">
                                                          <div class="btn-group mr-2" role="group" aria-label="First group">
                                                              <button class="btn btn-sm btn-round btn-outline-success mr-2">Add lines</button>
                                                              <button class="btn btn-sm btn-choice btn-round">Clear all lines</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="row mt-5">
                                                      <div class="col-sm-4">
                                                          <form>
                                                              <div class="form-group">
                                                                  <label for="message to supplier">Your message to supplier</label>
                                                                  <textarea name="message_to_supplier" class="form-control" row="6"></textarea>
                                                              </div>
                                                              <div class="form-group">
                                                                  <label for="memo">Memo</label>
                                                                  <textarea name="memo" class="form-control" ></textarea>
                                                              </div>
                                                              <label for="file"> Attachment</label>
                                                              <input type="file" name="file" id="basic">
                                                      </div>
                                                      </form>
                                                  </div>

                                              </div>
                                          </div>
                                      </div>

                                  </div><!-- end content-->
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
                                      class="btn btn-link btn-sm  btn-round btn-danger" data-dismiss="modal">Cancel</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          