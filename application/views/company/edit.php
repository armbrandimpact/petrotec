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
$row = $this->db->get_where('company', array('id' => $this->uri->segment(3)))->row();
?>
<?= form_open_multipart(base_url('company/update')); ?>
<div style="padding:10px 180px; width:100%">
	<h4>Add Applicant</h4>
	<br />
	<input type="hidden" name="id" value="<?=$row->id;?>">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<div class="form-group">
					<label>Company Name</label>
					<input type="text" name="company_name" value="<?=$row->company_name;?>" class="form-control" />
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Company Phone</label>
				<input type="text" name="company_phone" value="<?=$row->company_phone;?>" class="form-control" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Company Address</label>
				<input type="text" name="company_address" value="<?=$row->company_address;?>" class="form-control" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Logo</label>
				<input type="file" name="company_logo" class="form-control" />
			</div>
			<span>
				<img src="<?= base_url(); ?>/uploads/<?=$row->company_logo;?>" alt="logo" width="150" class="img-responsive">
			</span><br/>
		</div>
	</div>
	
	
	<div class="row">
		<div class="col-md-6">
			<a href="<?= base_url('company/index'); ?>" class="btn btn-primary btn-block">Cancel</a>
		</div>
		<div class="col-md-6">
			<input type="submit" value="Save" class="btn btn-primary btn-block" />
		</div>
	</div>
</div>
<?= form_close(); ?>