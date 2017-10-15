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
$supplier = $this->db->get('supplier')->result();
$company = $this->db->get('company')->result();
echo form_open_multipart(base_url('inventory/insProduct')); ?>
<div style="padding:10px 180px; width:130%">
	<h4>Add Product</h4>
	<br />
	<?php $this->main_model->message($this->session->flashdata('alert_msg')); ?>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name" />
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Supplier</label>
				<select name="supplier_id" class="form-control">
					<?php if(!empty($supplier)): foreach($supplier as $s): ?>
						<option value="<?= $s->id; ?>"><?= $s->company; ?></option>
					<?php endforeach; endif; ?>
				</select>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Category</label>
				<select name="ccatid" class="form-control">
					<?= $this->main_model->getcategory(); ?>
				</select>
			</div>
		</div>
	</div>
	<hr />
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control"></textarea>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Notes</label>
				<textarea name="notes" class="form-control"></textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>File</label>
				<input type="file" name="doc" />
			</div>
		</div>
		<div class="col-md-6">
			
		</div>
	</div>
	<hr />
	<h3>Product Name</h3>
	<div class="row">
		<div class="col-md-4">
			<label>Product Code</label>
			<input type="text" class="form-control" id="code" />
		</div>
		<div class="col-md-4">
			<label>Company Name</label>
			<select id="company" class="form-control">
				<?php if(!empty($company)): foreach($company as $c): ?>
					<option value="<?= $c->id; ?>"><?= $c->company_name; ?></option>
				<?php endforeach; endif; ?>
			</select>
		</div>
		<div class="col-md-4">
			<br />
			<a class="btn btn-primary" href="javascript:void(0)" onClick="createproductrow()">Add Row</a>
		</div>
	</div>
	<div id="addproductalt">
		
	</div>
	<hr />
	<div class="row">
		<div class="col-md-6">
			<a href="#" class="btn btn-primary btn-block">Cancel</a>
		</div>
		<div class="col-md-6">
			<input type="submit" value="Save" class="btn btn-primary btn-block" />
		</div>
	</div>
</div>
<?= form_close(); ?>
<script>
	var count = 0;
	function createproductrow(){
		if($("#code").val() == ''){
			alert('Code Required');
			return false;
		}else{
			var code = $("#code").val();
			var company = $('#company');
			var html = '<div class="row" id="rowid_'+count+'">';
			html+= '<div class="col-md-4"><div class="form-group"><label>Code</label><input type="text" class="form-control" name="code[]" value="'+code+'" /></div></div>';
			html+= '<div class="col-md-4"><div class="form-group"><label>Company</label><input type="text" disabled class="form-control" value="'+company.find('option:selected').text()+'" /><input type="hidden" name="company[]" value="'+company.val()+'" /></div></div>';
			html+= '<div class="col-md-4"><div class="form-group"><br /><a href="javascript:void(0)" onClick="removeRow('+count+')" class="btn btn-danger">Remove</a></div></div>';
			html+= "</div>";
			$("#addproductalt").append(html);
			$("#code").val('');
			count++;
		}
	}
	function removeRow(id){
		$("#rowid_"+id).remove();
		$("#name, #code").val('');
	}
</script>