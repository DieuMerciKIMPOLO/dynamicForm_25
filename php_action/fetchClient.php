<?php 	
require_once 'core.php';

$sql = "SELECT *  FROM client";

$result = $connect->query($sql);

$output = array('data'=>array());

if($result->num_rows > 0) { 

 while($row = $result->fetch_array()) {
 	$client_id = $row[0];
 

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editProductModalBtn" data-target="#editProductModal" onclick="editProduct('.$client_id .')"> <i class="glyphicon glyphicon-edit"></i> Editer</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeProductModal" id="removeProductModalBtn" onclick="removeProduct('.$client_id .')"> <i class="glyphicon glyphicon-trash"></i> Supprimer</a></li>       
	  </ul>
	</div>';


	
 	$output['data'][] = array( 		
		$row[1],//Agence
		$row[2],//Adresse Agence
		$row[3],//Adresse Agence
		$row[4],//Code Postal Agence
		$row[5],//Ville Agence
		$row[6],//Nom Agent
		$row[7],//Prenom Agent
		$row[8],//Email Agent
		$button 
		//
 		// button
 				
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);