<?php 	
require_once 'core.php';

$sql = "SELECT  product.product_id,product.product_name,product.rate,categories.categories_name,product.quantity,categories.QteCheck,product.active,brands.brand_name FROM product , categories ,brands WHERE product.brand_id=brands.brand_id and product.categories_id = categories.categories_id ORDER BY product_id DESC" ;

$result = $connect->query($sql);

$output = array('data' => array());
if($result->num_rows> 0) { 
 while($row = $result->fetch_array()) {
	 $productId = $row[0];
	 
	 // active 
 	if($row[6] == 1) {
		// activate member
		$active = "<label class='label label-success'>Disponible</label>";
	} else {
		// deactivate member
		$active = "<label class='label label-danger'>Non disponible</label>";
	} // /else
 	
 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
		<li><a type="button" data-toggle="modal" id="editProductModalBtn" data-target="#editProductModal" onclick="editProduct('.$productId.')"> <i class="glyphicon glyphicon-edit"></i> Editer</a></li>
		<li><a type="button" data-toggle="modal" data-target="#removeProductModal" id="removeProductModalBtn" onclick="removeProduct('.$productId.')"> <i class="glyphicon glyphicon-trash"></i> Supprimer</a></li>   
	  </ul>
	</div>';
 	$output['data'][]=array( 		
 		
 		$row[1], 
 		// buy
		$row[2].'€',
		 // family		
		$row[3],
		// rate
		 $row[4],
		 $row[6],
		 $row[7],
		 
		 $active,
		 
 		// button
 		$button 		
 		); 	
 } // /while 

}
$connect->close();

echo json_encode($output);