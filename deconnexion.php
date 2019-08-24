<?php 
session_unset();
session_destroy();
echo "
	<script src='assets/jquery.js'></script>
			  <script>
				  $(document).ready(function() {
					 window.location.href='?boncommande=accueil&app=2';
						 });
 </script>";

 ?>