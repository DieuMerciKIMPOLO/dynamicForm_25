<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
$userId= $_POST['userId'];

if($userId) { 
//mise à jour de la statut utilisateur
 $sql ="UPDATE users SET status_user =1 WHERE user_id = {$userId}";

 if($connect->query($sql) === TRUE) {
	$sqls = "SELECT * FROM users WHERE user_id ={$userId}";
	$results = $connect->query($sqls);
    while($row = $results->fetch_array()) {

		$NomPrenomUser= $row['NomPrenomUser'];
		$username= $row['username'];
	}
	 /**
      * ENVOI MAIL D'ACTIVATION DU COMPTE CLIENT
	  */
	  $sujet='Votre compte est désormais activé';
		                            $message= '<!doctype html>
									<html xmlns="http://www.w3.org/1999/xhtml">
									<head>
									 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
									 <meta name="viewport" content="initial-scale=1.0" />
									 <meta name="format-detection" content="telephone=no" />
									 <title></title>
									 <style type="text/css">
										body {
										   width: 100%;
										   margin: 0;
										   padding: 0;
										   -webkit-font-smoothing: antialiased;
									   }
									   @media only screen and (max-width: 600px) {
										   table[class="table-row"] {
											   float: none !important;
											   width: 98% !important;
											   padding-left: 20px !important;
											   padding-right: 20px !important;
										   }
										   table[class="table-row-fixed"] {
											   float: none !important;
											   width: 98% !important;
										   }
										   table[class="table-col"], table[class="table-col-border"] {
											   float: none !important;
											   width: 100% !important;
											   padding-left: 0 !important;
											   padding-right: 0 !important;
											   table-layout: fixed;
										   }
										   td[class="table-col-td"] {
											   width: 100% !important;
										   }
										   table[class="table-col-border"] + table[class="table-col-border"] {
											   padding-top: 12px;
											   margin-top: 12px;
											   border-top: 1px solid #E8E8E8;
										   }
										   table[class="table-col"] + table[class="table-col"] {
											   margin-top: 15px;
										   }
										   td[class="table-row-td"] {
											   padding-left: 0 !important;
											   padding-right: 0 !important;
										   }
										   table[class="navbar-row"] , td[class="navbar-row-td"] {
											   width: 100% !important;
										   }
										   img {
											   max-width: 100% !important;
											   display: inline !important;
										   }
										   img[class="pull-right"] {
											   float: right;
											   margin-left: 11px;
											   max-width: 125px !important;
											   padding-bottom: 0 !important;
										   }
										   img[class="pull-left"] {
											   float: left;
											   margin-right: 11px;
											   max-width: 125px !important;
											   padding-bottom: 0 !important;
										   }
										   table[class="table-space"], table[class="header-row"] {
											   float: none !important;
											   width: 98% !important;
										   }
										   td[class="header-row-td"] {
											   width: 100% !important;
										   }
									   }
									   @media only screen and (max-width: 480px) {
										   table[class="table-row"] {
											   padding-left: 16px !important;
											   padding-right: 16px !important;
										   }
									   }
									   @media only screen and (max-width: 320px) {
										   table[class="table-row"] {
											   padding-left: 12px !important;
											   padding-right: 12px !important;
										   }
									   }
									   @media only screen and (max-width: 458px) {
										   td[class="table-td-wrap"] {
											   width: 100% !important;
										   }
									   }
									 </style>
									</head>
									<body style="font-family: Arial, sans-serif; font-size:13px; color: #444444; min-height: 200px;" bgcolor="#E4E6E9" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
									<table width="100%" height="100%" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
									<tr><td width="100%" align="center" valign="top" bgcolor="#E4E6E9" style="background-color:#E4E6E9; min-height: 200px;">
								   <table><tr><td class="table-td-wrap" align="center" width="658"><table class="table-space" height="18" style="height: 18px; font-size: 0px; line-height: 0; width: 650px; background-color: #e4e6e9;" width="650" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="18" style="height: 18px; width: 650px; background-color: #e4e6e9;" width="650" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table>
								   <table class="table-space" height="8" style="height: 8px; font-size: 0px; line-height: 0; width: 650px; background-color: #ffffff;" width="650" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
									   <tbody>
										   <tr><td class="table-space-td" valign="middle" height="8" style="height: 8px; width: 650px; background-color: #ffffff;" width="650" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
								   
								   <table class="table-row" width="650" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
									 <table class="table-row" width="650" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 24px; padding-right: 24px;" valign="top" align="left">
									<table class="table-col" align="center" width="650" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
										<tbody><tr><td class="table-col-td" width="650" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="center">	
									   
									</td></tr></tbody></table>
								   </td></tr></tbody></table>
								   <br><br>
								   <div style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 14px; text-align: center;margin-left:135px" align="center" >
										
								   <img   src="https://www.semeubler.com/partenaire/assets/img/logo.png"  width="250" style="border: 0px none #444444; vertical-align: middle; display: block; padding-bottom: 9px;" hspace="0" vspace="0" border="0">
									   </div>

									   <br><br>
									 
									 <table class="table-col" align="center" width="600" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="378" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; width: 378px;" valign="top" align="left">
									   <table class="header-row" width="650" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="378" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; margin: 0px; font-size: 18px; padding-bottom: 10px; padding-top: 15px;" valign="top" align="left">
										   
											   Bonjour '.$NomPrenomUser.',</td></tr></tbody></table>
											   
									   <div style="font-family: Arial, sans-serif; line-height: 20px; color: #444444; font-size:14px;text-align:justify" align="center">
										 Votre compte sur <a href="https://www.semeubler.com/partenaire/?boncommande=accueil" target="_blank">Nexity Partenaire</a> est désormais activé. Vous pourrez y accéder maintenant.
										 Pour vous connecter à votre compte, cliquez sur le bouton ci-dessous puis saisissez l\'adresse email et le mot de passe indiqués lors de la création de votre compte.
									   </div>
									 </td></tr></tbody></table>
								   </td></tr></tbody></table>
									   
								   <table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 650px; background-color: #ffffff;" width="650" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 650px; background-color: #ffffff;" width="650" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
								   <table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 650px; background-color: #ffffff;" width="650" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 650px; background-color: #ffffff;" width="650" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
								   <table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 650px; background-color: #ffffff;" width="650" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 650px; background-color: #ffffff;" width="650" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
								   <table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 650px; background-color: #ffffff;" width="650" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 650px; padding-left: 16px; padding-right: 16px; background-color: #ffffff;" width="650" bgcolor="#FFFFFF" align="center">&nbsp;<table bgcolor="#E8E8E8" height="0" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td bgcolor="#E8E8E8" height="1" width="100%" style="height: 1px; font-size:0;" valign="top" align="left">&nbsp;</td></tr></tbody></table></td></tr></tbody></table>
								   <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 650px; background-color: #ffffff;" width="650" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 650px; background-color: #ffffff;" width="650" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
								   
								   <table class="table-row" width="650" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
									 <table class="table-col" align="center" width="378" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="378" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; width: 378px;" valign="top" align="left">
									   <div style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; text-align: center;">
										 <a href="https://www.semeubler.com/partenaire/?boncommande=accueil" target="_blank" style="color: #ffffff; text-decoration: none; margin: 0px; text-align: center; vertical-align: baseline; border: 4px solid #ed661e; padding: 4px 9px; font-size: 15px; line-height: 21px; background-color: #ed661e;">&nbsp; Me Connecter &nbsp;</a>
									   </div>
									   <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 378px; background-color: #ffffff;" width="378" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 378px; background-color: #ffffff;" width="378" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
									 </td></tr>
									 
									 
									 </tbody></table>
									 <br> <br>
									 Si le bouton ne marche pas, veuillez copier le lien dans la barre d\'adresse de votre navigateur Internet: <br>
								   <a href="https://www.semeubler.com/partenaire/ " target="_blank"> https://www.semeubler.com/partenaire/  </a>
									  <br> <br>
									 Merci de votre confiance et à très bientôt, <br> <br>
									 Equipe Nexity Partenaire</b><br>
								   </td></tr></tbody></table>
								   
								   <table class="table-space" height="6" style="height: 6px; font-size: 0px; line-height: 0; width: 650px; background-color: #ffffff;" width="650" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="6" style="height: 6px; width: 650px; background-color: #ffffff;" width="650" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
								   
								   <table class="table-row-fixed" width="650" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-fixed-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 16px; font-weight: normal; padding-left: 1px; padding-right: 1px;" valign="top" align="left">
									 <table class="table-col" align="left" width="650" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="448" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
									   <table width="100%" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td width="100%" align="center" bgcolor="#f5f5f5" style="font-family: Arial, sans-serif; line-height: 24px; color: #bbbbbb; font-size: 13px; font-weight: normal; text-align: center; padding: 9px; border-width: 1px 0px 0px; border-style: solid; border-color: #e3e3e3; background-color: #f5f5f5;" valign="top">
										 <a href="#" style="color: #ed661e; text-decoration: none; background-color: transparent;">Nexity Partenaire &copy; </a>
										 <br>
										 
										 <a href="#" style="color: #ed661e; text-decoration: none; background-color: transparent;">facebook</a>
										
									   </td></tr></tbody></table>
									 </td></tr></tbody></table>
								   </td></tr></tbody></table>
								   <table class="table-space" height="1" style="height: 1px; font-size: 0px; line-height: 0; width: 650px; background-color: #ffffff;" width="650" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="1" style="height: 1px; width: 650px; background-color: #ffffff;" width="650" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
								   <table class="table-space" height="36" style="height: 36px; font-size: 0px; line-height: 0; width: 650px; background-color: #e4e6e9;" width="650" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="36" style="height: 36px; width: 650px; background-color: #e4e6e9;" width="650" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table></td></tr></table>
								   </td></tr>
									</table>
									</body>
									</html>';
										 
													$destinataire=$username;
													$headers = "From: \"Nexity Partenaire\"<serviceclient@semeubler.com>\n";
													$headers .= "Reply-To: serviceclient@semeubler.com\n";
													$headers .= "Content-Type: text/html; charset=\"utf-8\"";
												
												    mail($destinataire,$sujet,$message,$headers);
 	$valid['success'] = true;
	$valid['messages'] = "Activation éffectuée";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Activation non éffectuée";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} 