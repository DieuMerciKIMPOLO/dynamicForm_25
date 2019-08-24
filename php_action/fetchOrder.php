<?php 	

require_once 'core.php';
require_once 'bdd/init.php';
$user=getTableValues('users',array("user_id"=>$_SESSION['userId']));
if (!empty($user)) {
            foreach ($user as $key => $value) {
                $row=$value;
                if (!empty($row['profil'])) {
                $profil=getTableValues('profil',array("idprofil"=>$row['profil']));
                    foreach ($profil as $key => $value) {
                        $rows=$value;
                    }
                }
            }
        }
if($rows['NameProfil']=='admin')
{

$sql = "SELECT order_id, order_date, NomPrenomLivraison,TelephoneClient,NomPrenomAgent,TelephoneAgent,NumeroMgAgent,total_amount,order_status FROM orders WHERE order_status = 1 OR order_status=2 ORDER BY order_id DESC";
$result = $connect->query($sql);
$output = array('data' => array());
if($result->num_rows > 0) { 
 
 $paymentStatus = ""; 
 $x = 1;

 while($row = $result->fetch_array()) {
 	$orderId = $row[0];

 	$countOrderItemSql = "SELECT count(*) FROM order_item WHERE order_id = $orderId";
 	$itemCountResult = $connect->query($countOrderItemSql);
 	$itemCountRow = $itemCountResult->fetch_row();


 	// active 
 	if($row[8] == 1) { 		
 		$order_status = "<label class='label label-success'>Valable</label>";
 	} else if($row[8] == 2) { 		
 		$order_status = "<label class='label label-danger'>Supprimé</label>";
 	} else { 		
 		$order_status = "<label class='label label-warning'></label>";
 	} // /else

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	   

	    <li><a type="button" href="view_order.php?pdf=1&order_id='.$orderId.'" target="_blank"> <i class="glyphicon glyphicon-print"></i> Imprimer </a></li>
		
		<li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder('.$orderId.')"> <i class="glyphicon glyphicon-trash"></i> Supprimer</a></li>
	     
	  </ul>
    </div>';
  
    $orderdate =date('d/m/Y',strtotime( $row[1]));

 	$output['data'][] = array( 		
 		// image
 		$row[0],
 		// order date
         $orderdate,
 		// client name
 		$row[2], 
 		// client contact
 		$row[3], 		 	
         $row[4],
         $row[5], 	
         $row[6], 		 	
		 $row[7].'€',
		 $order_status, 
 		
 		// button
 		$button 		
 		); 	
 	$x++;
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);

}
else
{
	$user_id=$_SESSION['userId'];
	$sql = "SELECT order_id, order_date, NomPrenomLivraison,TelephoneClient,NomPrenomAgent,TelephoneAgent,NumeroMgAgent,total_amount FROM orders WHERE order_status = 1 and user=$user_id  ORDER BY order_id DESC";
	$result = $connect->query($sql);
	
	$output = array('data' => array());
	
	if($result->num_rows > 0) { 
	 
	 $paymentStatus = ""; 
	 $x = 1;
	
	 while($row = $result->fetch_array()) {
		 $orderId = $row[0];
	
		 $countOrderItemSql = "SELECT count(*) FROM order_item WHERE order_id = $orderId";
		 $itemCountResult = $connect->query($countOrderItemSql);
		 $itemCountRow = $itemCountResult->fetch_row();
	
	
		 // active 
		 if($row[4] == 1) { 		
			 $paymentStatus = "<label class='label label-success'>Payé</label>";
		 } else if($row[4] == 2) { 		
			 $paymentStatus = "<label class='label label-info'>Avance</label>";
		 } else { 		
			 $paymentStatus = "<label class='label label-warning'>Non payé</label>";
		 } // /else
	
		 $button = '<!-- Single button -->
		<div class="btn-group">
		  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Action <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu">
		   
	
			<li><a type="button" href="view_order.php?pdf=1&order_id='.$orderId.'" target="_blank"> <i class="glyphicon glyphicon-print"></i> Imprimer </a></li>
			<li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder('.$orderId.')"> <i class="glyphicon glyphicon-trash"></i> Supprimer</a></li>
		
		  </ul>
		</div>';
	  
		$orderdate =date('d/m/Y',strtotime( $row[1]));
	
		 $output['data'][] = array( 		
			 // image
			 $row[0],
			 // order date
			 $orderdate,
			 // client name
			 $row[2], 
			 // client contact
			 $row[3], 		 	
			 $row[4],
			 $row[5], 	
			 $row[6], 		 	
			 $row[7].'€', 
			 
			 // button
			 $button 		
			 ); 	
		 $x++;
	 } // /while 
	
	}// if num_rows
	
	$connect->close();
	
	echo json_encode($output);

}