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
$product = $this->db->get_where('product', array('id' => $this->uri->segment(3)))->row();
$supplier = $this->db->get('supplier')->result();
echo form_open_multipart(base_url('inventory/insProduct')); ?>
<div style="padding:10px 180px; width:100%">
	<h4>Add Product</h4>
	<br />
	<?php $this->main_model->message($this->session->flashdata('alert_msg')); ?>
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Product Name</label>
						<input type="text" name="name" value="<?= $product->name; ?>" class="form-control" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Product Code</label>
						<input type="text" class="form-control" value="<?= $product->code; ?>" name="code" />
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Supplier</label>
						<select name="supplier_id" class="form-control">
							<?php if(!empty($supplier)): foreach($supplier as $s): ?>
								<option value="<?= $s->id; ?>" <?= ($product->supplier_id == $s->id) ? 'selected' : ''; ?>><?= $s->company; ?></option>
							<?php endforeach; endif; ?>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Category</label>
						<select name="ccatid" class="form-control">
							<?= $this->main_model->getcategory($product->ccatid); ?>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr />
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control"><?= $product->description; ?></textarea>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Notes</label>
				<textarea name="notes" class="form-control"><?= $product->note; ?></textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<?php 
				$attachment = $this->db->get_where('attachment', array('type' => 'product', 'refid' => $product->id))->row();
				if(empty($attachment)): 
				?>
				<label>File</label>
				<input type="file" name="doc" />
				<?php else: ?>
				<a href="<?= base_url('uploads/'.$attachment->url); ?>" class="btn btn-link">Download</a> <a href="<?= base_url('inventory/deleteproductimg'.$attachment->id.'/'.$product->id); ?>">x</a>
				<?php endif; ?>
			</div>
		</div>
		<div class="col-md-6">
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<a href="<?= base_url('supplier'); ?>" class="btn btn-primary btn-block">Cancel</a>
		</div>
		<div class="col-md-6">
			<input type="submit" value="Save" class="btn btn-primary btn-block" />
		</div>
	</div>
</div>
<?= form_close(); ?>