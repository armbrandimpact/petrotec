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
<?php $sales = $this->db->get_where('sales_perchasing', array('type' => 'sales'))->result(); ?>
<div style="padding:50px 30px; width:100%">
	<h4>All Sales</h4>
	<br />
	<div class="text-right">
		<a href="<?= base_url('sales/addsales'); ?>" class="btn btn-success">Add Sales</a>
	</div>
	<br />
	<div class="row">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Date</th>
					<th>Customer Email</th>
					<th>Company</th>
					<th>Total</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($sales)): foreach($sales as $s): ?>
					<tr>
						<td><?= $s->date; ?></td>
						<td><?php 
							$customer = $this->db->get_where('customer', array('id' => $s->customerid))->row(); 
							echo $customer->email;
						?></td>
						<td><?php 
							$company = $this->db->get_where('company', array('id' => $s->companyid))->row(); 
							echo $company->company_name;
						?></td>
						<td><?= $s->total; ?></td>
						<td><?= $s->status; ?></td>
						<td>
							<a href="<?= base_url(); ?>sales/editsales/<?= $s->id; ?>" class="btn btn-primary">Edit</a>
							<?php if($s->status == 'pending'): ?>
								<a href="<?= base_url("sales/changestatus/".$s->id); ?>" class="btn btn-success">Approved</a>
							<?php endif; ?>
							<a href="#" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				<?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</div>