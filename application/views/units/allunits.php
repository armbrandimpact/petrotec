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
.an-tab-control .nav-tabs > li.active a {
	border-color: #70c1b3;
}
.modal-dialog {
	top: 32% !important;
	left: 5%;
}
.btn {
	padding: 5px 10px;
}
</style>
<?php $customer = $this->db->get('units')->result(); ?>
<div style="padding:50px 30px; width:100%">
  <h4>All Units</h4>
  <br />
  <div class="text-right"> <a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Units</a> </div>
  <br />
  <div class="row">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Unit Name</th>
          <th>Delete</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($customer)): foreach($customer as $s): ?>
        <tr>
          <td><?= $s->fname.' '.$s->lname; ?></td>
          <td><?= $s->email; ?></td>
          <td><?= $s->phone; ?></td>
          <td><a href="#" class="btn btn-success">History</a></td>
          <td><a href="<?= base_url(); ?>customer/editCustomer/<?= $s->id; ?>" class="btn btn-primary">Edit</a> <a href="#" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<?= form_open('units/insUnits'); ?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Units</h4>
      </div>
      <div class="modal-body">
      	<div class="form-group">
        	<label>Unit Name</label>
            <input type="text" class="form-control" name="unitname" />
        </div>
        <div class="form-group">
        	<label>Unit Symbol</label>
            <input type="text" class="form-control" name="unitsymbol" />
        </div>
        <div class="form-group">
        	<label>Unit Type</label>
            <select name="unittype" class="form-control">
            	<option value="currency">Currency</option>
                <option value="measerment">Measurement</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Unit</button>
      </div>
    </div>
  </div>
<?= form_close(); ?>
</div>
