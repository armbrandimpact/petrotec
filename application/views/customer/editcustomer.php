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
$customer = $this->db->get_where('customer', array('id' => $this->uri->segment(3)));
$customer = $customer->row();
echo form_open('customer/inscustomer'); ?>
<div style="padding:10px 180px; width:100%">
	<h4>Edit Customer</h4>
	<br />
	<?php $this->main_model->message($this->session->flashdata('alert_msg')); ?>
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Title</label>
						<select class="form-control" name="title">
							<option value="Mr." <?= ($customer->title == 'Mr.') ? 'selected' : ''; ?>>Mr.</option>
							<option value="Mrs." <?= ($customer->title == 'Mrs.') ? 'selected' : ''; ?>>Mrs.</option>
							<option value="Ms." <?= ($customer->title == 'Ms.') ? 'selected' : ''; ?>>Ms.</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" name="fname" value="<?= $customer->fname; ?>" class="form-control" />
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" name="lname" value="<?= $customer->lname; ?>" class="form-control" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Company Name</label>
				<input type="text" name="company" value="<?= $customer->company; ?>" class="form-control" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" value="<?= $customer->email; ?>" class="form-control" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Phone</label>
						<input type="text" name="phone" value="<?= $customer->phone; ?>" class="form-control" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Mobile</label>
						<input type="text" name="mobile" value="<?= $customer->mobile; ?>" class="form-control" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Fax</label>
						<input type="text" value="<?= $customer->fax; ?>" name="fax" class="form-control" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr />
	<div class="row">
		<div class="col-md-12">
			<div>
				<div class="an-component-body">
					<div class="an-bootstrap-custom-tab">
						<div class="an-tab-control">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs text-left" role="tablist">
								<li role="presentation" class="active"><a href="#diska"
									aria-controls="diska" role="tab" data-toggle="tab">Address</a>
								</li>
								<li role="presentation"><a href="#diskb"
									aria-controls="diskb" role="tab" data-toggle="tab">Notes</a>
								</li>
							</ul>
						</div>
						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="diska">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Billing Address</label>
											<textarea class="form-control" name="billing_address" rows="4"><?= $customer->billingaddress; ?></textarea>
										</div>
										<br />
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>City</label>
													<input type="text" value="<?= $customer->city; ?>" name="city" class="form-control" />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input type="text" value="<?= $customer->country; ?>" class="form-control" name="country" />
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> <!-- end .TAB-PANE -->
							<div role="tabpanel" class="tab-pane fade" id="diskb">
								<div class="form-group">
									<label>Notes</label>
									<textarea class="form-control" name="notes" rows="4"><?= $customer->notes; ?></textarea>
								</div>
							</div> <!-- end .TAB-PANE -->
						</div> <!-- end .TAB-CONTENT -->
					</div> <!-- end .AN-BOOTSTRAP-CUSTOM-TAB -->
				</div> <!-- end .AN-COMPONENT-BODY -->
			</div> <!-- end .AN-SINGLE-COMPONENT -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<a href="#" class="btn btn-primary btn-block">Cancel</a>
		</div>
		<div class="col-md-6">
			<input type="hidden" value="<?= $this->uri->segment(3); ?>" name="id" />
			<input type="submit" class="btn btn-primary btn-block" value="Edit Customer" />
		</div>
	</div>
</div>
<?= form_close(); ?>