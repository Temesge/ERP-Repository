


<!DOCTYPE html>
<html>
<head>
<style>
            .button-74 {
		    text-align:center;
  background-color: white;
  border: 2px solid black;
  border-radius: 30px;
  box-shadow: black 4px 4px 0 0;
  color: white;
  cursor: pointer;
  display: inline-block;
  font-weight: 600;
  font-size: 18px;
  padding: 0 18px;
  line-height: 30px;
  margin-left:1160px;
  margin-bottom:1200px;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-74:hover {
  background-color: darkcyan;
}

.button-74:active {
  box-shadow: darkcyan 2px 2px 0 0;
  transform: translate(2px, 2px);
}

@media (min-width: 768px) {
  .button-74 {
    min-width: 120px;
    padding: 0 25px;
  }
}
    .btupending{
     background-color: white;
  border: 2px solid #422800;
  border-radius: 30px;
  box-shadow: darkcyan 4px 0px 0 0;
  color: white;
  cursor: pointer;
  display: inline-block;
  font-weight: 600;
  font-size: 18px;
  padding: 0 18px;
  line-height: 30px;
  margin-left:150px;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}
.btuaccept{
     background-color: white;
  border: 2px solid #422800;
  border-radius: 30px;
  box-shadow: darkcyan 4px 0px 0 0;
  color: white;
  cursor: pointer;
  display: inline-block;
  font-weight: 600;
  font-size: 18px;
  padding: 0 18px;
  line-height: 30px;
  margin-left:200px;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}
.btureject
{
     background-color: white;
  border: 2px solid #422800;
  border-radius: 30px;
  box-shadow: darkcyan 4px 0px 0 0;
  color: white;
  cursor: pointer;
  display: inline-block;
  font-weight: 600;
  font-size: 18px;
  padding: 0 18px;
  line-height: 30px;
  margin-left:200px;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}
.btupending:hover{
     background-color: darkcyan;
}
.btuaccept:hover{
     background-color: darkcyan;
}
.btureject:hover{
     background-color: darkcyan;
}
  /* table td{
     width: 25px;
  } */
      </style> 


	<link rel="shortcut icon" type="x-icon" href="tankwa.png">
      <title>Entrepris resource planing</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.11.5/api/sum().js"></script>

</head>
<!--<div style="background-color: #0c0030; margin-right:0px;">-->
<!--    <td><button class="btupending"><a href="approve_pending_self.php" name="pending" >Pending</a></button></td>-->
<!--    <td><button class="btuaccept"><a href="approve_accept_self.php" name="accept" >Accept</a></button></td>-->
<!--    <td><button class="btureject"><a href="approve_reject_self.php" name="reject" >Reject</a></button></td> -->
<!--</div>-->
<body style="padding: 10px;">
	<table id="table_id" class="display" border="1">
	    <thead>
	        <tr>
            <th>S_No</th>
<th>Date</th>
<th>Bank</th>
<th>Transaction</th>
<th>To Bank</th>
<th>Amount</th>
<th>Depositor</th>
<th>Approver</th>
<th>Receiver</th>
<th>Status</th>
<th>Action</th>
	        </tr>
	    </thead>
<tbody>
<?php  
include('connection.php');
$sql=mysqli_query($conn,"SELECT * FROM  TransferMoney WHERE Status=3 ");
//Get Update id and status  
if (isset($_GET['id']) && isset($_GET['status'])) {  
    $id=$_GET['id'];  
    $status=$_GET['status'];  
    mysqli_query($conn,"update TransferMoney set status='$status' where id='$id'");  
    header("View_transfered_money.php");  
    die();  
}
$i=1;  
if (mysqli_num_rows($sql)>0) {  
      while ($row=mysqli_fetch_assoc($sql)) { ?>  
      <tr>  
      <td><?php echo $row['ID'] ?></td>
             <td><?php echo $row['date'] ?></td>
             <td><?php echo $row['bank'] ?></td>
             <td><?php echo $row['transaction'] ?></td>
             <td><?php echo $row['Tobank'] ?></td>
             <td><?php echo $row['amount'] ?></td>
             <td><?php echo $row['depositor'] ?></td>
             <td><?php echo $row['approver'] ?></td>
             <td><?php echo $row['receiver'] ?></td>
                      <td>  
                           <?php  
                           if ($row['Status']==1) {  
                                echo "Pending";  
                           }if ($row['Status']==2) {  
                                echo "Accept";  
                           }if ($row['Status']==3) {  
                                echo "Reject";  
                           }
                           if ($row['Status']==4) {  
                                echo "Complet";  
                           }
                           ?>  
                      </td>  
                      <td>  
                           <select onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['ID'] ?>')">  
                                <option value="1">Pending</option>  
                                <option value="2">Accept</option>  
                                <option value="3">Reject</option>
                                 <option value="4">Complet</option> 
                           </select>  
                      </td>  
      </tr>       
<?php      }  
 } ?> 
	    </tbody>
	    <tfoot>
	    	<th></th>
	    	<th></th>
	    	<th></th>
	    	<th></th>
	    	<th></th>
	    	<th></th>
            <th></th>
	    	<th></th>
	    	<th></th>
	    	<th></th>
            
	    </tfoot>
	</table>
    <button class="button-74" role="button"><a href="applybyself.php"  name="self">Apply</a></button>
    <script type="text/javascript">  
      function status_update(value,ID){  
           //alert(id);  
           let url = "https://erp.tankwatravels.com/View_transfered_money.php";  
           window.location.href= url+"?id="+ID+"&status="+value;  
      }  
 </script> 
 <script type="text/javascript">
	$(document).ready( function () {
	    $('#table_id').DataTable( {
		    drawCallback: function () {
		      var api = this.api();
		      var sum = 0;
		      var formated = 0;
		      //to show first th
		      $(api.column(0).footer()).html('Total');

		      for(var i=3; i<=3;i++)
		      {
		      	sum = api.column(i, {page:'current'}).data().sum();

		      	//to format this sum
		      	formated = parseFloat(sum).toLocaleString(undefined, {minimumFractionDigits:2});
		      	$(api.column(i).footer()).html('Br'+formated);
		      }
		      
		    }
		});
	});
</script> 

<script type="text/javascript">  
      function status_update(value,ID){  
           //alert(id);  
           let url = "https://erp.tankwatravels.com/View_transfered_money.php";  
           window.location.href= url+"?id="+ID+"&status="+value;  
      }  
 </script> 
</body>
</html>
