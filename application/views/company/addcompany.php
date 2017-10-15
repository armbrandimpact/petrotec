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
<?= form_open_multipart('company/insCompany'); ?>
<div style="padding:10px 180px; width:100%">
	<h4>Add Company</h4>
	<br />
	<?php $this->main_model->message($this->session->flashdata('alert_msg')); ?>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label>Company Name</label>
				<input type="text" class="form-control" name="name" />
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Phone</label>
				<input type="text" class="form-control" name="phone" />
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Logo</label>
				<input type="file" class="form-control" name="logo" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			<label>Address</label>
			<textarea name="address" class="form-control"></textarea>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<a href="#" class="btn btn-primary btn-block">Cancel</a>
		</div>
		<div class="col-md-6">
			<input type="submit" class="btn btn-primary btn-block" value="Add Company" />
		</div>
	</div>
</div>
<?= form_close(); ?>