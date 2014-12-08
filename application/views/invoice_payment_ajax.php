
		<form class="form-horizontal" method="POST" action='<?php echo base_url()."invoices/ajax_invoice_payment";?>'>
			<input name="invoice_id" id="invoice_id" value="<?php echo $id_invoice;?>" type="hidden">
			<input name="jenis" id="jenis" value="add" type="hidden">
			<input name="invoice_status" value="<?php echo $invoice_status;?>" type="hidden">
			<!-- <input name="invoice_id" id="invoice_id" value="5" type="hidden"> -->
			<div class="col-xs-12">
			<div class="control-group error">
				<label class="control-label">Amount (<?php echo $this->config->item("currency");?>): </label>
				<div class="controls">
					<input name="invoice_payment_amount" class="form-control" id="payment_amount" value="" type="text">
				</div>
			</div>

			<label class="control-label">Payment Date: </label>
			<div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                            <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="invoice_payment_date" value="">
                                                    </div>

			<div class="control-group">
				<label class="control-label">Payment Method: </label>
				<div class="controls">
					<select name="payment_id" class="form-control" id="payment_id">
						<option value="">--Select Payment--</option>
					<?php
					foreach ($payment_type as $key => $value) { ?>
						<option value="<?php echo $value['payment_id'];?>"><?php echo $value['payment_method'];?></option>
					<?php } ;?>
						</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Note: </label>
				<div class="controls">
					<textarea name="invoice_payment_note" class="form-control" id="payment_note"></textarea>
				</div>

			</div>
			</div>
			<!-- <button class="btn btn-primary" id="btn_add_payment" type="button"><i class="fa fa-check"></i> Save Payment</button> -->
			<div style="clear:both"></div>
	<div class="modal-footer">
		<input class="btn btn-primary" id="btn_add_payment" type="submit" name="save" value="Save Payment">
        <button class="btn btn-danger" type="reset" data-dismiss="modal"><i class="fa fa-times"></i> Reset</button>
	</div>
		</form>
	
	<!-- <div style="clear:both"></div>
	<div class="modal-footer">
		<button class="btn btn-primary" id="btn_add_payment" type="button"><i class="fa fa-check"></i> Save Payment</button>
        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
	</div> -->
