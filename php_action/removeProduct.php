<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$productId = $_POST['productId'];

if($productId) { 

 $sql ="DELETE  FROM product   WHERE product_id = {$productId}";
 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Suppression éffectuée";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Erreur";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST