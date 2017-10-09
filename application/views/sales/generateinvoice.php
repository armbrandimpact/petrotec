<style>
	.form-control {
    display: block;
    width: 100%;
    height: 25px;
    padding: 0px 6px;
}
hr {
    border-top: 1px solid #1f2740;
}
.an-tab-control .nav-tabs > li a {
    color: #ccc;
}
.an-tab-control .nav-tabs > li.active a{
	border-color:#70c1b3;
}
.modal-dialog {
    top: 32% !important;
    left: 5%;
}
</style>
<?= form_open_multipart(base_url('Sales/generateinvoice_post')); ?>
<div style="padding:10px 180px; width:100%">
	<h4>Create Vendor</h4>
	<br />
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<br />
				<h1>Petrotech Invoice</h1>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Invoice Number</label>
				<input name="invoice_number" type="text" class="form-control" placeholder="starts with 000" />
			</div>
			<div class="form-group" id="invoice_info">
				<label>Date <span id="change_date" class="badge badge-secondary pull-right" style="margin-left: 35px; cursor: pointer;">change date</span></label>
				<input name="date" type="text" class="form-control datepicker" id="invoice_date" value="<?= date('Y-m-d'); ?>" disabled />
				<input type="hidden" value="<?= date('Y-m-d'); ?>" name="hidden_invoice_date" id="hidden_invoice_date">
			</div>
		</div>
	</div>
	<hr />
	
	<div class="row">
		<div class="col-md-6">
			<a href="<?= base_url('Sales/index'); ?>" class="btn btn-primary btn-block">Cancel</a>
		</div>
		<div class="col-md-6">
			<input type="submit" value="Create" class="btn btn-primary btn-block" />
		</div>
	</div>

</div>
<?= form_close(); ?>