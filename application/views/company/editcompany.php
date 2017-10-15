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
<?php
$company = $this->db->get_where('company', array('id' => $this->uri->segment(3)))->row();
echo form_open_multipart('company/insCompany'); ?>
<div style="padding:10px 180px; width:100%">
	<h4>Add Company</h4>
	<br />
	<?php $this->main_model->message($this->session->flashdata('alert_msg')); ?>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label>Company Name</label>
				<input type="text" class="form-control" value="<?= $company->company_name; ?>" name="name" />
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Phone</label>
				<input type="text" class="form-control" value="<?= $company->phone; ?>" name="phone" />
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Logo</label>
				<?php 
				$attachment = $this->db->get_where('attachment', array('type' => 'companylogo', 'refid' => $company->id))->row();
				if(empty($attachment)): 
				?>
				<input type="file" class="form-control" name="logo" />
				<?php else: ?>
				<br />
				<a href="<?= base_url('uploads/'.$attachment->url); ?>" class="btn btn-link">Download</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			<label>Address</label>
			<textarea name="address" class="form-control"><?= $company->address; ?></textarea>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<a href="#" class="btn btn-primary btn-block">Cancel</a>
		</div>
		<div class="col-md-6">
			<input type="hidden" name="id" value="<?= $company->id; ?>" />
			<input type="submit" class="btn btn-primary btn-block" value="Edit Company" />
		</div>
	</div>
</div>
<?= form_close(); ?>