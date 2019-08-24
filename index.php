<?php 
ob_start();
session_start();
require_once 'php_action/bdd/init.php';
require_once 'php_action/db_connect.php';      
if(isset($_GET['boncommande']) or (array_key_exists('boncommande',$_GET))){
    if(file_exists($_GET['boncommande'].'.php')){
		
			include($_GET['boncommande'].'.php');
		
		
    }else{
        include_once('accueil.php');
    }
}else{
	   echo "
			  <script src='assets/jquery.js'></script>
				<script>
				         $(document).ready(function() 
							{
						     window.location.href='?boncommande=accueil';
							});
						 </script>";
}

?>