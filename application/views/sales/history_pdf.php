<!DOCTYPE html>
<html>
<head>
  <title>Sales History</title>
  
  <style type="text/css">
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
    #outtable{
        padding:5px;
        /*border: 1px solid red;*/
        width: 100%;
      
    }
    thead th{
      text-align: left;
      padding: 10px;
    }
    tbody td{
        padding: 8px;
        font-size: 10px;
    }
    /* tbody tr:nth-child(even){
      background: #F6F5FA;
    } */
    .small-text {
        font-size:9px;
        font-weight: none;
        padding: 0;
    }
    h5{
        margin:0;
        padding:0;
    }
    .border-none {
        border:none !important;
    }
    .inside-table{
        padding:3px;
    }
    .rowline{
        width: 100%;
    }
    .leftside{
        width: 70%;
        
    }
    .borderline{
        border: 1px solid black;
        width: 50%;
        padding: 2px;
    }
    .rightside{
        background: blue;
        width: 50%;
    }
    .leftside ul li{
        padding: 5px 0;
        font-size: 12px;
    }
    .leftside ul li span{
        float:right;
    }
    .table-striped th{
        font-size: 14px;
    }
  </style>
</head>
<body>
<?php 
    $paid = $this->db->get_where('installment', array('salesid'=>$row->sales_id))->row();
?>
<div id="outtable">

    <div class="row" style="left:0; margin-left: 0;">
        <div class="top-header"><br />
            <h5>Sales History</h5>
        </div>
    </div> <br/>
    <div class="middle" style="background:white; width: 100%;">
        <div class="inside-table">

            <table class="table table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th> Agent Name </th>
                        <th> Customer </th>
                        <th> Invoice No </th>
                        <th> Amount </th>
                        <th> Paid </th>
                        <th> Total </th>
                        <th> Date created </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <?= $this->sales_model->get_employee_name($row->sales_id); ?> </td>		
                        <td> <?= $this->sales_model->get_customer_name($row->sales_id); ?> </td>		
                        <td> 000<?= $row->sales_id; ?> </td> 
                        <td> <?= $row->amount; ?></td>
                        <td> <?= $paid->paid; ?></td>
                        <td> <?= $this->sales_model->sales_total($row->sales_id); ?></td>		
                        <td> <?= date('d/m/Y',strtotime($row->date)); ?></td> 
                    </tr>
                </tbody>
		    </table>
           
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <div class="row">
                <span>Sign: ___________________________ </span>
                <span>Date: ___________________________ </span>
            </div>

        </div>
        
    </div> <!-- end of middle-->

</div>

</body>
</html>