<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$productName = $_POST['productName'];
    $rates= $_POST['rate']/1.2;
    $categoryName 	= $_POST['categoryName'];
	$productStatus 	= $_POST['productStatus'];
	$quantity= $_POST['quantity'];
	
	$rate=number_format($rates,2);
				

				$brandStatus = false;

				for($x = 0; $x < count($_POST['brandName']);$x++) {	
					
					$brandName=$_POST['brandName'][$x];
				
					// add into order_item
					$orderItemSql = "INSERT INTO  product (product_name, brand_id, categories_id,quantity,rate,active)  
					VALUES ('$productName','$brandName','$categoryName','$quantity','$rate','$productStatus')";
			
					$connect->query($orderItemSql);
						 
					if($x == count($_POST['brandName'])) {
						$brandStatus = true;
					}	
				}
				$valid['success'] = true;
				$valid['messages'] = "Enregistrement réussi";	
		

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST