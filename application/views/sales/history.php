<?php 
    $table = $this->db->get_where('sales_history')->result();
?>
<div class="container">
    <div class="row" style="padding-top:20px;">
        <div class="col-md-12">
            <h3>Sales History</h3><br/>
            <br />
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sales ID</th>
                        <th>Amount</th>
                        <th>Paid</th>
                        <th>Total</th>
                        <th>Date Created</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(!empty($table)){
                foreach($table as $ap){
                    $paid = $this->db->get_where('installment', array('salesid'=>$ap->sales_id))->row();
                     ?>
                    <tr>
                        <td><?= $ap->sales_id; ?></td>
                        <td><?= $ap->amount; ?></td>
                        <td><?= $paid->paid; ?></td>
                        <td><?= $this->sales_model->sales_total($ap->sales_id); ?></td>		
                        <td><?= date('d/m/Y',strtotime($ap->date)); ?></td>	
                    </tr>
                <?php } } ?>
                </tbody>
		    </table>
        </div><!-- end of col-md-12-->
    </div><!-- end of row-->
</div>
