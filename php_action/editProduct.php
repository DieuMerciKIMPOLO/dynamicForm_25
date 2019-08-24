<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$productId = $_POST['productId'];
	$productName= $_POST['editProductName']; 
    $rate = $_POST['editRate'];
    $brandName = $_POST['editBrandName'];
    $categoryName = $_POST['editCategoryName'];
	$categoryName = $_POST['editCategoryName'];
	$productStatus 	= $_POST['editProductStatus'];
	$quantity= $_POST['editquantity'];
  		
	$sql = "UPDATE product SET product_name = '$productName', brand_id = '$brandName', categories_id = '$categoryName',quantity= '$quantity', rate = '$rate',active = '$productStatus' WHERE product_id = $productId ";
	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Enregistrement réussi";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Erreur";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
