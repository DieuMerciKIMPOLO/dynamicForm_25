<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

$brandName = $_POST['editCategoriesName'];
  $brandStatus = $_POST['editQteCheck']; 
  $categoriesId = $_POST['editCategoriesId'];

	$sql = "UPDATE categories SET categories_name = '$brandName', QteCheck = '$brandStatus' WHERE categories_id = '$categoriesId'";

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