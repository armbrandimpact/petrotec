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
.btn{
	padding:5px 10px;
}
</style>
<?php $company = $this->db->get('company')->result(); ?>
<div style="padding:50px 30px; width:100%">
	<h4>All Company</h4>
	<br />
	<div class="text-right">
		<a href="<?= base_url('company/addCompany'); ?>" class="btn btn-success">Add Company</a>
	</div>
	<br />
	<div class="row">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Company Name</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($company)): foreach($company as $s): ?>
					<tr>
						<td><?= $s->company_name; ?></td>
						<td><?= $s->address; ?></td>
						<td><?= $s->phone; ?></td>
						<td>
							<a href="<?= base_url(); ?>company/editCompany/<?= $s->id; ?>" class="btn btn-primary">Edit</a>
						</td>
					</tr>
				<?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</div>