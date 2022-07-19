<div class="modal fade nopadd" id="expensestatement" tabindex="-1" role="dialog"
     aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-full modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <i class="fa fa-remove"></i>
                </button>
                <h5 class="title title-up">
                    Statement</h5>
            </div>

            <div class="card-body">

                <div class="row bor-sep">
                    <div class="col-sm-9">
                        <form>
                            <div class="form-row">
                                <div class="row col-12">
                                    <div class="col-sm-4">
                                        <label>Student Name</label>
                                        <h5 class="text-muted">Ahmed</h5>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Report type</label>
                                        <select class="form-control" name="report_type">
                                            <option>Balance Forward</option>
                                            <option>Balance Credit</option>
                                            <option>EasyPaisa Transfer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-sm-4">
                                    <label>Statement date</label>
                                    <input type="date" name="start_date" class="form-control" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <br>
                                    <label>Start date</label>
                                    <input type="date" name="end_date" class="form-control" >
                                </div>
                                <div class="col-sm-4">
                                    <br>
                                    <label>End date</label>
                                    <input type="date" name="end_date" class="form-control" >
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="float-right"><small>TOTAL BALANCE</small></p>
                            </div>
                            <div class="col-sm-12">
                                <h5 class="float-right">PRs 2,250.00</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">Recipients List</h6>
                            </div>
                            <div class="card-body">
                                <div class="toolbar">
                                    <div class="row">
                                        <div class="col-sm-12 float-right">
                                            <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-print" title="Print" data-toggle=""></i></button>
                                            <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-file-excel-o" title="Export to Excel" data-toggle=""></i></button>
                                        </div>
                                    </div>
                                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                                </div>
                                <table class="table table-hover custom_border" cellspacing="0" width="100%">
                                    <thead class="table-secondary">
                                    <tr>
                                        <th class="text-center"><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                                        <th>RECIPIENTS</th>
                                        <th>EMAIL ADDRESS</th>
                                        <th class="text-right">BALANCE</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center"><input type="checkbox" name="select_all" value="1" id="example-select-current"></td>
                                        <td>Ahmed</td>
                                        <td><input type="text" class="form-control" value="ahemd@xyz.com"></td>
                                        <td class="text-right">PRs 1,300.00</td>
                                    </tr>

                                    </tbody>

                                </table>

                            </div><!-- end content-->
                        </div><!--  end card  -->
                    </div> <!-- end col-md-12 -->
                </div> <!-- end row -->
            </div>


            <div class="modal-footer">
                <div class="">
                    <button type="button" class="btn btn-sm btn-link btn-round  btn-secondary "
                            data-dismiss="modal">Save</button>
                </div>
                <div class="divider"></div>
                <div class="">
                    <button type="button"
                            class="btn btn-sm btn-link  btn-round btn-danger " data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>