<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$categoriesName = $_POST['categoriesName'];
    $QteCheck = $_POST['QteCheck']; 

	$sql = "INSERT INTO categories (categories_name,QteCheck) 
	VALUES ('$categoriesName','$QteCheck')";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Enregistrement réussi";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Erreur";
	}

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST