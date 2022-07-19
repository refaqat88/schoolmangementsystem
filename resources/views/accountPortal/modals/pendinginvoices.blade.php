<!------------------ Pending Invoices --------------------------->
<div class="modal bd-example-modal-lg" id="MymodalPreventScript"  data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Credit Against</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="MymodalPreventScriptForm" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="">
                <div class="card-header">
                  <h6 class="card-title">Outstanding transaction list</h6>
                </div>
                <div class="card-body">
                  <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                  </div>
                  <table id="transactionsdatatablelink" class="table custom_border table-hover" cellspacing="0" width="100%">
                    <thead class="table-secondary">
                    <th><input type="checkbox" name="" value="" id="example-select-all"></th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>No.</th>
                    <th>Due date</th>
                    <th>Balance due</th>
                    <th>Total</th>
                    <th>Status</th>
                </thead>
                <tbody>
                  

                </tbody>
                  </table>
                </div><!-- end content-->
              </div><!--  end card  -->
            </div> <!-- end col-md-12 -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary btn-round">Save</button>
          <button type="button" class="btn btn-danger btn-round" data-dismiss="modal" data-target="MymodalPreventScript">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
             
<!-- Pending Invoices ends -->
