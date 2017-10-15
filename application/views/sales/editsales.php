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
$customer = $this->db->get('customer')->result();
$product = $this->db->get('product')->result();
$company = $this->db->get('company')->result();
$sales = $this->db->get_where('sales_perchasing', array('id' => $this->uri->segment(3)))->row();
$sales_history = $this->db->get_where('sp_history', array('sales_id' => $this->uri->segment(3)))->result();
echo form_open('sales/insSales'); ?>
<div style="padding:10px 180px; width:100%">
	<h4>Edit Sales</h4>
	<br />
	<?php $this->main_model->message($this->session->flashdata('alert_msg')); ?>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Customer</label>
				<select class="form-control" name="customer">
				<?php if(!empty($customer)): foreach($customer as $c): ?>
					<option value="<?= $c->id; ?>" <?= ($c->id == $sales->customerid) ? 'selected' : ''; ?>><?= $c->email; ?></option>
				<?php endforeach; endif; ?>
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Company</label>
				<select class="form-control" name="companyid">
				<?php if(!empty($company)): foreach($company as $c): ?>
					<option value="<?= $c->id; ?>" <?= ($c->id == $sales->companyid) ? 'selected' : ''; ?>><?= $c->company_name; ?></option>
				<?php endforeach; endif; ?>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>Notes</label>
				<textarea name="notes" class="form-control"><?= $sales->notes; ?></textarea>
			</div>
		</div>
	</div>
	<hr />
		<h3>Add Product</h3>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Product</label>
					<select class="form-control" id="product">
						<?php if(!empty($product)): foreach($product as $p): ?>
							<option value="<?= $p->id; ?>"><?= $p->name; ?></option>
						<?php endforeach; endif; ?>
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Qty</label>
					<input type="text" class="form-control" id="qty" />
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Price</label>
					<input type="text" class="form-control" id="price" />
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<br />
					<a href="javascript:void(0)" onClick="addProduct()" class="btn btn-primary btn-block">Add Product</a>
				</div>
			</div>
		</div>
	<div id="productcontainer">
	<?php if(!empty($sales_history)): foreach($sales_history as $h): ?>
		<div class="row" id="rowid_a<?= $h->id; ?>">
			<div class="col-md-3">
				<div class="form-group">
				<?php
					$pro = $this->db->get_where('product', array('id' => $h->productid))->row();
				?>
					<label>Name</label>
					<input type="text" class="form-control" placeholder="Add Product" value="<?= $pro->name; ?>" disabled /><input type="hidden" name="product[]" value="<?= $pro->id; ?>" />
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Qty</label>
					<input type="text" name="qty[]" disabled value="<?= $h->qty; ?>" class="form-control qtycount_<?= $h->qty; ?>" />
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Price</label>
					<input type="text" name="price[]" disabled value="<?= $h->price; ?>" class="form-control qtycount_<?= $h->qty; ?>" />
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<br /><a href="javascript:void(0)" class="btn btn-danger btn-block" onClick="removeRow(a<?= $h->id; ?>)">Remove</a>
				</div>
			</div>
		</div>
	<?php endforeach; endif; ?>
	</div>
	<div class="text-right">
		<p>Total : <span id="total"><?= $sales->total; ?></span>
		<input type="hidden" name="total" id="ftotal" value="<?= $sales->total; ?>" />
	</div>
	<hr />
	<div class="row">
		<div class="col-md-6">
			<a href="#" class="btn btn-primary btn-block">Cancel</a>
		</div>
		<div class="col-md-6">
			<input type="submit" class="btn btn-primary btn-block" value="Send Request" />
		</div>
	</div>
</div>
<?= form_close(); ?>
<script>
	var count = 0;
	function addProduct(){
		var product = $("#product");
		var qty = $("#qty").val();
		var price = $("#price").val();
		if(qty == ''){
			alert('Qty Required');
			return false;
		}else
		if(price == ''){
			alert('Price required');
			return false;
		}else{
			var html = '<div class="row" id="rowid_'+count+'">';
			html+= '<div class="col-md-3"><div class="form-group"><label>Name</label><input type="text" class="form-control" placeholder="Add Product" value="'+product.find('option:selected').text()+'" disabled /><input type="hidden" name="product[]" value="'+product.val()+'" /></div></div>';
			html+= '<div class="col-md-3"><div class="form-group"><label>Qty</label><input type="text" name="qty[]" value="'+qty+'" class="form-control qtycount_'+count+'" /></div></div>';
			html+= '<div class="col-md-3"><div class="form-group"><label>Price</label><input type="text" name="price[]" value="'+price+'" class="form-control pricecount_'+count+'" /></div></div>';
			html+= '<div class="col-md-3"><div class="form-group"><br /><a href="javascript:void(0)" class="btn btn-danger btn-block" onClick="removeRow('+count+')">Remove</a></div></div></div>';
			$("#productcontainer").append(html);
			var total = qty * price;
			total = Number($("#ftotal").val()) + Number(total);
			$("#ftotal").val(total);
			$("#total").html(total);
			$("#qty, #price").val('');
			count++;
		}
	}
	function removeRow(id){
		var totalval = $("#ftotal").val();
		var finalval = $(".qtycount_"+id).val() * $(".pricecount_"+id).val();
		totalval = totalval - finalval;
		$("#ftotal").val(totalval);
		$("#total").html(totalval);
		$("#rowid_"+id).remove();
	}
</script>