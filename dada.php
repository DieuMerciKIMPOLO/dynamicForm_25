<?php

    $data = array();
    
    //database details
    $dbHost     = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName     = 'nexity';
    
    //create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if($db->connect_error){
        die("Unable to connect database: " . $db->connect_error);
    }
    
    

  //$dias=$_GET['catid'];
     $dias=50;
	
    
    //get user data from the database
    $query = $db->query("SELECT product.product_name,product.product_id as product_id,product.rate as rate,categories.categories_id as categories_id ,product.categories_id as categorie ,categories.QteCheck,categories.categories_name, product.quantity as quantity  FROM product,categories  WHERE  product.categories_id=categories.categories_id and active=1 AND brand_id=50  ORDER BY product.categories_id");
	
    if($query->num_rows > 0){
       $data = array();
	while($row= $query->fetch_array()) {	
	  
	   $data[]=$row;
       
	}
    }
    
    //returns data as JSON format
    echo json_encode($data);

?>