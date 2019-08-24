<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$userId= $_POST['userId'];

if($userId) { 

 $sql ="UPDATE users SET status_user =0 WHERE user_id = {$userId}";
 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Desactivation éffectuée";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Desactivation non éffectuée";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST