 <div class="panel-body">
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Add Product</h4>
                </div>
                <div class="modal-body">
                    <form action="savecancelinvoice.php" method="post" class = "form-group" >
                        <div id="ac">
                            
                            <span>Invoice No: </span><input type="text" name="invoicen" value = "<?php echo $pcode ?>" class = "form-control" />
                            <span> Invoice Date : </span><input type="date" name="invoiced" class = "form-control" />
							 <span>Status : </span><input type="text" name="invoices" class = "form-control" />
							  <span>Remark : </span><input type="text" name="invoicer" class = "form-control" />
                            <span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" class = "form-control" value="Save" />
                            
                        </div>
						</form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
                        <!-- /.modal -->