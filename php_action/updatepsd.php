<?php
 session_start();
 require 'bdd/init.php'; 
 if(!empty($_POST) ){
    $user_id=$_POST['user_id'];
    $_POST1=array(
        "password"=>md5($_POST['password']),
        "table_name"=>'users',
        );
    $_POST=extractArrays($_POST,array("date","file"));
    $result=updateTable($_POST1,$condition=array("user_id"=>$user_id));
    if($result==0){ 
                       
      $r=0;
      echo $r;
    }
     else{

        $r=1;
	    echo $r;
     }
								
     }
 ?>