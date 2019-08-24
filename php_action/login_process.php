<?php
 session_start();
require 'bdd/init.php'; 
 if (isset($_POST['username'])) {
                                 $username=trim($_POST['username']);
                                         $password=trim($_POST['password']);
                                         $passwordcry=md5($password);
                                 $valeur=getTableValues('users',array("username"=>$username,"password"=> $passwordcry));
		                        
                                if (!empty($valeur)) {
                                   foreach ($valeur as $key => $value) {
                                       $val=$value;
                                 
                                   }
                                if($val['status_user']!=0)
                                {
								   $_SESSION['userId']=$val['user_id'];
                                   $_SESSION['username']=$val['username'];
								   
								   $r=1;
                                     echo $r;
                                    }
                                    else{
                                        $r=2;
                                         echo $r; 
                                    }
                                   }else{
									   $r=0;
	                                 echo $r;
                                  
                                   }
                            }

?>