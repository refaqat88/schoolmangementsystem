<div class="modal fade nopadd" id="adjustfees" tabindex="-1" role="dialog"
    aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-xl modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <i class="fa fa-remove"></i>
                </button>
                <h5 class="title title-up">Adjust Pay</h5>
            </div>
            <div class="modal-body row">
                <div class="col-md-12">
                    <form id="RegisterValidation" action="#" method="">
                        <div class="card ">
                            <div class="card-header ">
                                <h6 class="card-title">Pay Adjustment</h6>
                            </div>
                            <div class="card-body">

                                <div class="row bor-sep">
                                    <div class="col-sm-9">
                                        <form>
                                            <div class="form-row">
                                                <div class="row col-12">
                                                    <div class="col-sm-4">
                                                        <label>Student Name</label>
                                                        <h5 class="text-muted">Ahmed
                                                        </h5>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <label>Date</label>
                                                        <input type="date"
                                                            class="form-control"
                                                            placeholder="">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Reference No</label>
                                                        <input type="text"
                                                            name="receipt_no"
                                                            class="form-control"
                                                            placeholder=""
                                                            value="10023">
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="float-right"><small>Amount to
                                                        Adjust</small></p>
                                            </div>
                                            <div class="col-sm-12">
                                                <h5 class="float-right"><b>&#8360
                                                        25,000.00</b></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="card-title">Adjusted Transaction
                                                List</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="toolbar">
                                                <div class="row">
                                                    <div class="col-sm-12 float-right">
                                                        <button
                                                            class="btn btn-simple btn-tumblr btn-icon float-right "><i
                                                                class="fa fa-print"
                                                                title="Print"
                                                                data-toggle=""></i></button>
                                                        <button
                                                            class="btn btn-simple btn-tumblr btn-icon float-right "><i
                                                                class="fa fa-file-excel-o"
                                                                title="Export to Excel"
                                                                data-toggle=""></i></button>
                                                    </div>
                                                </div>
                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                            </div>
                                            <table id="adjustpaytable"
                                                class="mb-5 table-hover custom_border"
                                                cellspacing="0" width="100%">
                                                <thead class="table-secondary">
                                                    <tr>
                                                        <th class="text-center " width="10%"><input type="checkbox"
                                                                name="select_all"
                                                                value="1"
                                                                id="example-select-all">
                                                        </th>
                                                        <th class="text-center" width="5%">S.No</th>
                                                        <th class="w-30">Account</th>
                                                        <th class="w-30">Description</th>
                                                        <th class="text-right w-15">Amount
                                                        </th>
                                                        <th class="text-center w-10">Invoice</thcl>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center"><input type="checkbox"
                                                                name="select_all"
                                                                value="1"
                                                                id="example-select-all">
                                                        </td>
                                                        <td class="text-center">1</td>
                                                        <td>Admission Fee</td>
                                                        <td><a href="#">Invoice
                                                                #10003</a> (08/30/2021)
                                                        </td>
                                                        <td class="text-right">
                                                            25,000.00</td>
                                                        <td>
                                                            <div
                                                                class="d-flex justify-content-center">
                                                                <button
                                                                    class="btn btn-simple btn-warning btn-icon "><i
                                                                        class="fa fa-history"
                                                                        title="Unlink invoice"
                                                                        data-toggle=""></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr class="text-center">
                                                        <td><input type="checkbox"
                                                                name="select_all"
                                                                value="1"
                                                                id="example-select-all">
                                                        </td>
                                                        <td class="text-center">2</td>
                                                        <td></td>
                                                        <td><a href="#"></a> </td>
                                                        <td class="text-right"></td>
                                                        <td>
                                                            <div
                                                                class="d-flex justify-content-center">
                                                                <button
                                                                    class="btn btn-simple btn-success btn-icon "><i
                                                                        class="fa fa-chain"
                                                                        title="Link invoice"
                                                                        data-toggle="modal"
                                                                        data-target=".bd-example-modal-lg"
                                                                        name="next"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>


                                                </tbody>

                                            </table>
                                            <div class="container">
                                                <table class="col-12">
                                                    <tr>
                                                        <td class="text-right col-sm-12 col-lg-10"><b>Total
                                                                adjustment</b></td>
                                                        <td class=" text-left col-sm-12 col-lg-2"><b>&#8360 25,000.00</b></td>
                                                    </tr>
                                                    <!--                                      <tr>-->
                                                    <!--                                        <td class="col-sm-8"></td>-->
                                                    <!--                                        <td class="float-right"><b>Balannce Due</b></td>-->
                                                    <!--                                        <td class="col-sm-1"></td>-->
                                                    <!--                                        <td><b> PRs0.00</b></td>-->
                                                    <!--                                      </tr>-->
                                                </table>

                                            </div>

                                            <!-- modal body starts -->
                                            <div class="modal bd-example-modal-lg"
                                                id="MymodalPreventScript"
                                                data-backdrop="static"
                                                data-keyboard="false" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                Credit Against</h5>
                                                            <button type="button"
                                                                class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="">
                                                                        <div
                                                                            class="card-header">
                                                                            <h6
                                                                                class="card-title">
                                                                                Outstanding
                                                                                transaction
                                                                                list
                                                                            </h6>
                                                                        </div>
                                                                        <div
                                                                            class="card-body">
                                                                            <div
                                                                                class="toolbar">
                                                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                                            </div>
                                                                            <table
                                                                                id="alltransactionsdatatable"
                                                                                class=" table-hover custom_border"
                                                                                cellspacing="0"
                                                                                width="100%">
                                                                                <thead class="table-secondary">
                                                                                    <tr>
                                                                                        <th><input
                                                                                                type="checkbox"
                                                                                                name="select_all"
                                                                                                value="1"
                                                                                                id="example-select-all">
                                                                                        </th>
                                                                                        <th>Date
                                                                                        </th>
                                                                                        <th>
                                                                                            Type
                                                                                        </th>
                                                                                        <th>No.
                                                                                        </th>
                                                                                        <th>Due
                                                                                            date
                                                                                        </th>
                                                                                        <th>Balance
                                                                                            due
                                                                                        </th>
                                                                                        <th>Total
                                                                                        </th>
                                                                                        <th>Status
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td><input
                                                                                                type="checkbox"
                                                                                                name="select_all"
                                                                                                value="1"
                                                                                                id="example-select-all">
                                                                                        </td>
                                                                                        <td>12/08/2020
                                                                                        </td>
                                                                                        <td>
                                                                                            Fee
                                                                                            Bill
                                                                                        </td>
                                                                                        <td>1001
                                                                                        </td>
                                                                                        <td>22/08/2020
                                                                                        </td>
                                                                                        <td>PRs2,250:00
                                                                                        </td>
                                                                                        <td>PRs2,250:00
                                                                                        </td>
                                                                                        <td>Open
                                                                                        </td>

                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><input
                                                                                                type="checkbox"
                                                                                                name="select_all"
                                                                                                value="1"
                                                                                                id="example-select-all">
                                                                                        </td>
                                                                                        <td>12/08/2020
                                                                                        </td>
                                                                                        <td>
                                                                                            Fee
                                                                                            Bill
                                                                                        </td>
                                                                                        <td>1001
                                                                                        </td>
                                                                                        <td>22/08/2020
                                                                                        </td>
                                                                                        <td>PRs2,250:00
                                                                                        </td>
                                                                                        <td>PRs2,250:00
                                                                                        </td>
                                                                                        <td>Open
                                                                                        </td>

                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><input
                                                                                                type="checkbox"
                                                                                                name="select_all"
                                                                                                value="1"
                                                                                                id="example-select-all">
                                                                                        </td>
                                                                                        <td>12/08/2020
                                                                                        </td>
                                                                                        <td>
                                                                                            Fee
                                                                                            Bill
                                                                                        </td>
                                                                                        <td>1001
                                                                                        </td>
                                                                                        <td>22/08/2020
                                                                                        </td>
                                                                                        <td>PRs2,250:00
                                                                                        </td>
                                                                                        <td>PRs2,250:00
                                                                                        </td>
                                                                                        <td>Open
                                                                                        </td>

                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><input
                                                                                                type="checkbox"
                                                                                                name="select_all"
                                                                                                value="1"
                                                                                                id="example-select-all">
                                                                                        </td>
                                                                                        <td>12/08/2020
                                                                                        </td>
                                                                                        <td>
                                                                                            Fee
                                                                                            Bill
                                                                                        </td>
                                                                                        <td>1001
                                                                                        </td>
                                                                                        <td>22/08/2020
                                                                                        </td>
                                                                                        <td>PRs2,250:00
                                                                                        </td>
                                                                                        <td>PRs2,250:00
                                                                                        </td>
                                                                                        <td>Open
                                                                                        </td>

                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <!-- end content-->
                                                                    </div>
                                                                    <!--  end card  -->
                                                                </div>
                                                                <!-- end col-md-12 -->
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn btn-secondary btn-round">Save</button>
                                                            <button type="button"
                                                                class="btn btn-danger btn-round"
                                                                data-dismiss="modal"
                                                                data-target="MymodalPreventScript">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                // $(document).ready(function () {
                                                //     $('#MymodalPreventScript').modal({
                                                //         backdrop: 'static',
                                                //         keyboard: false
                                                //     });
                                                // });
                                            </script>
                                            <!-- modal body ends -->

                                        </div><!-- end content-->
                                    </div><!--  end card  -->
                                </div> <!-- end col-md-12 -->
                            </div> <!-- end row -->

                        </div>


                        <script>
                            // $(document).ready(function () {
                            //     var table = $('#example').DataTable({
                            //         'ajax': 'https://gyrocode.github.io/files/jquery-datatables/arrays_id.json',
                            //         'columnDefs': [{
                            //             'targets': 0,
                            //             'searchable': false,
                            //             'orderable': false,
                            //             'className': 'dt-body-center',
                            //             'render': function (data, type, full, meta) {
                            //                 return '<input type="checkbox" name="id[]" value="'
                            //                     + $('<div/>').text(data).html() + '">';
                            //             }
                            //         }],
                            //         'order': [1, 'asc']
                            //     });

                            //     // Handle click on "Select all" control
                            //     $('#example-select-all').on('click', function () {
                            //         // Check/uncheck all checkboxes in the table
                            //         var rows = table.rows({ 'search': 'applied' }).nodes();
                            //         $('input[type="checkbox"]', rows).prop('checked', this.checked);
                            //     });

                            //     // Handle click on checkbox to set state of "Select all" control
                            //     $('#example tbody').on('change', 'input[type="checkbox"]', function () {
                            //         // If checkbox is not checked
                            //         if (!this.checked) {
                            //             var el = $('#example-select-all').get(0);
                            //             // If "Select all" control is checked and has 'indeterminate' property
                            //             if (el && el.checked && ('indeterminate' in el)) {
                            //                 // Set visual state of "Select all" control
                            //                 // as 'indeterminate'
                            //                 el.indeterminate = true;
                            //             }
                            //         }
                            //     });

                            //     $('#frm-example').on('submit', function (e) {
                            //         var form = this;

                            //         // Iterate over all checkboxes in the table
                            //         table.$('input[type="checkbox"]').each(function () {
                            //             // If checkbox doesn't exist in DOM
                            //             if (!$.contains(document, this)) {
                            //                 // If checkbox is checked
                            //                 if (this.checked) {
                            //                     // Create a hidden element
                            //                     $(form).append(
                            //                         $('<input>')
                            //                             .attr('type', 'hidden')
                            //                             .attr('name', this.name)
                            //                             .val(this.value)
                            //                     );
                            //                 }
                            //             }
                            //         });

                            //         // FOR TESTING ONLY

                            //         // Output form data to a console
                            //         $('#example-console').text($(form).serialize());
                            //         console.log("Form submission", $(form).serialize());

                            //         // Prevent actual form submission
                            //         e.preventDefault();
                            //     });
                            // });
                        </script>


                </div>

            </div>
            <div class="modal-footer">
                <div class="">
                    <button type="button" class="btn btn-round  btn-secondary "
                        data-dismiss="modal">Save</button>
                </div>
                <div class="">
                    <button type="button"
                        class="btn   btn-round btn-danger ">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>