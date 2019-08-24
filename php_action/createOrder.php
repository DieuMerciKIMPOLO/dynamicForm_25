<?php 	
/*
require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array(), 'order_id' => '');

if($_POST) {	

  $orderDate 				   = date('Y-m-d', strtotime($_POST['orderDate']));	
  $user				= $_POST['user'];
  $subTotalValue     = $_POST['subTotalValue'];
  $vatValue 	=	$_POST['vatValue'];
  $totalAmountValue     = $_POST['totalAmountValue'];
  $datelivraison				    = $_POST['datelivraison'];
  $NomPrenomLivraison		        = $_POST['NomPrenomLivraison'];
  $user_input_autocomplete_address	= $_POST['user_input_autocomplete_address'];
  $TelephoneClient				   = $_POST['TelephoneClient'];
  $EmailClient			          = $_POST['EmailClient'];
  $packs				        = $_POST['packs'];
  $Societe				        = $_POST['Societe'];
  $AdresseSociete				= $_POST['AdresseSociete'];
  $NomPrenomAgent				= $_POST['NomPrenomAgent'];
  $TelephoneFixe				= $_POST['TelephoneFixe'];
  $NumeroMgAgent				 = $_POST['NumeroMgAgent'];
  $TelephoneAgent				 = $_POST['TelephoneAgent'];
  $EmailAgent 				     = $_POST['EmailAgent'];
  $NomPrenomSocAg 				 = $_POST['NomPrenomSocAg'];

 // $arrayfamilyId=$_POST['arrayfamilyId'];

  /*$Famille=$_POST['Famille'];

  var_dump($Famille);

  /*var_dump($categories_id);

  $categorie=$_POST['categorie'];


   var_dump($categorie);

  /*$quantity=$_POST['quantity'];

  var_dump($quantity);

  /*for($x = 0;$x<count($categorie); $x++)
  {*/
   /*if($categories_id==$categorie)
    {
	$a=$_POST['quantity'];
	echo $caluclqtenew=array_sum($a);
	
    }
  /*}*/

  /*$search_array =$_POST['arrayfamilyId'];
if (array_key_exists($productName,$search_array)) {

    echo "L'élément  existe dans le tableau";
}*/



  /*  

  
  			
	$sql = "INSERT INTO orders (user,order_date,sub_total, vat, total_amount,order_status,datelivraison,NomPrenomLivraison,user_input_autocomplete_address,TelephoneClient,EmailClient,packs,Societe,AdresseSociete,NomPrenomAgent,TelephoneFixe,NumeroMgAgent,TelephoneAgent,EmailAgent,NomPrenomSocAg) VALUES
	 ('$user','$orderDate','$subTotalValue', '$vatValue', '$totalAmountValue', 1,'$datelivraison','$NomPrenomLivraison','$user_input_autocomplete_address','$TelephoneClient','$EmailClient','$packs','$Societe','$AdresseSociete','$NomPrenomAgent','$TelephoneFixe','$NumeroMgAgent','$TelephoneAgent','$EmailAgent','$NomPrenomSocAg')";
	
	
	$order_id;
	$orderStatus = false;
	if($connect->query($sql) === true) {
		$order_id = $connect->insert_id;
		$valid['order_id'] = $order_id;		
 

		$orderStatus = true;
	}
	

	for($x = 0; $x < count($_POST['productName']); $x++) {			
		
		// add into order_item
		
		
		$orderItemSql = "INSERT INTO order_item (order_id, product_id, quantity, rate, total, order_item_status) 
		VALUES ('$order_id', '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['rateValue'][$x]."', '".$_POST['totalValue'][$x]."', 1)";

		$connect->query($orderItemSql);
			 
		if($x == count($_POST['productName'])) {
			$orderItemStatus = true;
		}	
	} // /for quantity

	require_once '../pdf.php';
	include('database_connection.php');
	include('function.php');

	
	$output = '';
	$statement = $connect->prepare("SELECT * FROM orders WHERE order_id = :order_id LIMIT 1
	");
	$statement->execute(
		array(
			':order_id' => $order_id
		)
	);
	$result = $statement->fetchAll();
	
	foreach($result as $row)

	{
		$querys="SELECT * FROM brands WHERE brand_id = :brand_id";
		$Stmts=$connect->prepare($querys);
		$Stmts->bindParam(':brand_id',$row['packs'],PDO::PARAM_STR);
		$Stmts->execute();
		$comptes=$Stmts->rowCount();						
		foreach($Stmts as $data)
					{
				
		$day=date('Y')-2000;
		$output .= '
		
		<table width="100%" border="0" cellpadding="5" cellspacing="0">
			
		<tr style="margin-top:-200px;">
				<td width="20%" style="margin-to:-100px;"><img src="../assets/img/logo.png" width="200" heigth="200"/></td>
				<td width="50%" align="center" >
					<p> A l\'attention de <br>
						Bon de commande N° <strong>'.$order_id.' </strong>
					</p>
					
				</td><td width="30%" align="center" >
					<p> Date de création <br>  '.$row['order_date']=date('d/m/Y').'  </p>
					
				</td>
			</tr>
		
			
	<tr style="margin-top:-200px;">
	<td width="40%" style="margin-top:-200mm;"> 
		 <div style="width:100%;border:1px solid;text-align:center">
		 <strong>Information de Livrasion <hr> </strong> 
		  Nom & Prénom : <strong>'.$row['NomPrenomLivraison'].'</strong> <br>
		  <strong>Adresse : '.$row['user_input_autocomplete_address'].'</strong> <br>
			<br><br><br><br>
		 </div>
	</td>
	
	<td width="40%" style="margin-top:-200mm;"> 
		 <div style="width:100%;border:1px solid;text-align:center">
		 <strong>Information de Facturation <hr> </strong> 
		 Nom & Prénom  : <strong>'.$row['NomPrenomSocAg'].' </strong> <br>
		 Societe : <strong>'.$row['Societe'].' </strong> <br>
		 Adresse :<strong> '.$row['AdresseSociete'].' </strong>  <br>
			 <br>
			 <br>

		 </div>

	</td>
	
	<td width="40%"> 
		 <div style="width:100%;border:1px solid;text-align:center">
		 <strong>Information Agent <hr> </strong> 
		 Nom & Prénom   : <strong> '.$row['NomPrenomAgent'].'</strong> <br>
		 Télephone Fixe :<strong> '.$row['TelephoneFixe'].'</strong> <br>
		 N° mandataire G :<strong> '.$row['NumeroMgAgent'].'  </strong><br>
		   <br><br><br><br>
		   

		 </div>

	</td>
		 </tr>
		<tr style="margin-top:-200px;">
				<td width="50%" style="margin-to:-100px;">
				<p> <label style="font-weight:900;text-decoration: underline;" > Information BDC de : </label> <br>
				Offre :    <strong> '.$data["brand_name"].'</strong>  <br>
				Durée de location : <strong> 48 Mois </strong> <br>
				Durée liv souhaitée : <strong> '.$row['datelivraison']=date('d/m/Y').'</strong><br>
						
				</p>
				 
				</td>

				<td width="50%" style="margin-to:-100px;">
				<p> <label style="font-weight:900;text-decoration: underline;" > Pour le client </label> <br>
				Télephone mobile : <strong> '.$row['TelephoneClient'].'</strong> <br>   
				Email  : <strong> '.$row['EmailClient'].'</strong>   <br> 
				</p>
				 
				</td>

				<td width="50%" style="margin-to:-100px;">
				<p> <label style="font-weight:900;text-decoration: underline;" > Pour l\'agent </label> <br>
				
				Télephone mobile : <strong> '.$row['TelephoneAgent'].'</strong> <br>
				Email  : <strong> '.$row['EmailAgent'].'</strong>   <br>    
				</p>
				 
				</td>
				
			</tr>
			
		</table>

		<table  width="100%" border="0" cellpadding="5" cellspacing="0">
		<thead>
		  <tr style="font-size:14px;background-color:#d8d8d8;">
			<th scope="col"> NOM PRODUIT</th>
			<th scope="col"> PU (HT)</th>
			<th scope="col">TVA </th>
			<th scope="col">PU (TTC)</th>
			<th scope="col">Qté</th>
			<th scope="col">Total(TTC)</th>
		  </tr>
		</thead>
		<tbody>
		</tr>
		';
   
	$statement = $connect->prepare("SELECT * FROM order_item WHERE order_id = :order_id");
	$statement->execute(
		array(
			':order_id' => $order_id
		)
	);
	$result = $statement->fetchAll();
	
		$order_id=$row['order_id'];
		$query="SELECT * FROM order_item WHERE  order_id = :order_id and quantity!=0";
		$Stmt=$connect->prepare($query);
		$Stmt->bindParam(':order_id',$order_id,PDO::PARAM_STR);
		$Stmt->execute() or die(Print_r($connect->errorInfo()));
		
		$compte=$Stmt->rowCount();						
		foreach($Stmt as $data)
					{
		$product_data = fetch_product_details($data['product_id'], $connect);
		$valtva = ($product_data['price'] *20)/100;
		$prixtcc=$valtva +$product_data['price'];
		$prixQteTCC=$data["quantity"]*$prixtcc;

		$SommeTVA[]=$valtva*$data["quantity"];
		
		$summatrice=$product_data['price']*$product_data["quantity"]; 
	   
		$valtvaux[]= ($product_data['price'] *20)/100;
		$qte[]=$data["quantity"];

		$sumqte=array_sum($qte);
		$sumqTVa=array_sum($valtvaux);


		$totaltva[]=$sumqte*$sumqTVa;

		$totalfinal[]=$prixQteTCC;

         if(isset($totalfinal))
		 {
		  $arraynumber=number_format(array_sum($totalfinal),2);	 
		 }
		 else{
			$arraynumber=0;
		 }

		 if(isset($SommeTVA))
		 {
		  $arraytva=number_format(array_sum($SommeTVA),2);	 
		 }
		 else{
			$arraytva=0;
		 }
		
		

		$output .= ' <tr>
			<th scope="row">'.$product_data['product_name'].'-'.$row['order_id'].'</th>
			<td>'.$product_data['price'].' €</td>
			<td>'.number_format($valtva,2).'</td>
			<td>'.number_format($prixtcc, 2).' €</td>
			<td>'.$data["quantity"].'</td>
			<td>'.number_format($prixQteTCC, 2). '€</td>
		  </tr> ';
		}
		
		$output .= '
		<tr style="font-size:14px;background-color:#d9e2f3;">
		  <th scope="col"> Loyer Mensuel  TTC </th>
		  <th scope="col"> </th>
		  <th scope="col"> </th>
		  <th scope="col"></th>
		  <th scope="col"></th>
		  <th scope="col"> '.$arraynumber.
		 
		 '  € </th>
		
		  </tr>
		<tr style="font-size:14px;background-color:#d9e2f3;">
		  <th scope="col"> Dont TVA 20 % </th>
		  <th scope="col"> </th>
		  <th scope="col"> </th>
		  <th scope="col"></th>
		  <th scope="col"></th>
		  <th scope="col"> '.$arraytva.' €</th>
		</tr>			
						';
		 
		$output .= '</tbody>
	  </table>
	  <p style="text-align:center;">	
	  Le contrat de location démarrera le jour de la livraison et sera en vigueur pour une durée de 48 mois.	<br>														
																	
	  Nous restons à votre écoute pour toute question complémentaire :	 <br>															
	  <strong>Service commercial SeMeubler.com  <br>															
	   01 86 65 10 00 / serviceclient@semeubler.com </strong>	</p>
	 
		';
	}
	$pdf = new Pdf();
	$file_name ='Bon_de_commande-'.$row["order_id"].'.pdf';
	$pdf->loadHtml($output);
	$pdf->render();
	
	$dossier = '../pdfcommande';
	if(!is_dir($dossier))
	mkdir($dossier,0777,true);
	$r = $dossier.'/'.$file_name;
	$output=$pdf->output();
	file_put_contents("$dossier/$file_name",$output);

	
	/*********  ENVOI EMAIL  CLIENT  *******/
	/*//recipient
    $to =$EmailClient;
    //sender
    $from=$EmailAgent;
    $fromName=$NomPrenomAgent;
    
    //email subject
    $subject = 'BON DE COMMANDE '. $order_id.' CREE'; 
    //attachment file path
    $file ='../pdfcommande/'.$file_name.'';
    //email body content
    $htmlContent = '<!doctype html>
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
 @media only screen and (max-width: 608px) {
     td[class="table-td-wrap"] {
         width: 100% !important;
     }
 }
</style>
</head>
<body style="font-family: Maiandra GD; font-size:13px; color: #444444; min-height: 200px;" bgcolor="#E4E6E9" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table width="100%" height="100%" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
<tr><td width="100%" align="center" valign="top" bgcolor="#E4E6E9" style="background-color:#E4E6E9; min-height: 200px;">
<table><tr><td class="table-td-wrap" align="center" width="608"><div style="font-family: Maiandra GD; line-height: 32px; color: #444444; font-size: 13px;">

</div>

<table class="table-row" style="table-layout: auto; padding-right: 24px; padding-left: 24px; width: 600px; background-color: #ed661e;" bgcolor="#FFFFFF" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr height="55px" style="font-family: Maiandra GD; line-height: 19px; color: #444444; font-size: 13px; height: 55px;">
<td class="table-row-td" style="height: 55px; padding-right: 16px; font-family: Maiandra GD; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; vertical-align: middle;" valign="middle" align="left">
  <a href="#" style="color: #ffffff; text-decoration: none; padding: 0px; font-size: 14px; line-height: 20px; height: 50px; background-color: transparent;">
   BON COMMANDE SeMeuBler.com
  </a>
</td>

<td class="table-row-td" style="height: 55px; font-family: Maiandra GD; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; text-align: right; vertical-align: middle;" align="right" valign="middle">
  <a href="#" style="color: #ffffff; text-decoration: none; font-size: 14px; background-color: transparent;">
   MON COMPTE
  </a>
 
</td>
</tr>
</tbody></table>


<table class="table-space" height="6" style="height: 6px; font-size: 0px; line-height: 0; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="6" style="height: 6px; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table>
<table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>


<table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Maiandra GD; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
<table class="table-col" align="left" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="528" style="font-family: Maiandra GD; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
  <table class="header-row" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="528" style="font-size: 14px; margin: 0px; font-family: Maiandra GD; font-weight: normal; line-height: 19px; color: #ed661e; padding-bottom: 10px; padding-top: 15px;" valign="top" align="left">Bonjour '.addslashes($NomPrenomLivraison). ', </td></tr></tbody></table>
  <table class="header-row" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="528" style="font-family: Maiandra GD; font-weight: normal; line-height: 19px; color: #444444; margin: 0px; font-size: 14px; padding-bottom: 8px; padding-top: 10px;" valign="top" align="left"> Votre bon commande a été établi  </td></tr></tbody></table>
</td></tr></tbody></table>
</td></tr></tbody></table>

 <table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Maiandra GD; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
<table class="table-col"  width="100%" style="table-layout: fixed;" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="table-col-td" width="100%" style="font-family: Maiandra GD; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
 <table class="header-row" width="100%" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="255" style="font-family: Maiandra GD; font-weight: normal; line-height: 19px; color:#ed661e; margin: 0px; font-size: 18px; padding-bottom: 8px; padding-top: 10px;" valign="top"></td></tr></tbody></table>
 
 <div style="font-family: Maiandra GD; color: #444444; font-size: 13px;">
 <br>
           Ci-joints le bon de commande : <br> <br>
           
         
        
         
         
         <br>
         
         <b><br>
         <b><b>
         
             <br>	<br>
             <br>	<br>
         <b>Cordialement:  <br>
           Equipe SeMeubler.com</b><br>
             
         </div>
</td></tr></tbody>


</table>
</td></tr></tbody></table>

<table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
<table class="table-space" height="24" style="height: 24px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="24" style="height: 24px; width: 600px; padding-left: 18px; padding-right: 18px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="center">&nbsp;<table bgcolor="#E8E8E8" height="0" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td bgcolor="#E8E8E8" height="1" width="100%" style="height: 1px; font-size:0;" valign="top" align="left">&nbsp;</td></tr></tbody></table></td></tr></tbody></table>


<table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Maiandra GD; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">

 <table class="table-col" align="left" width="160" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="255" style="font-family: Maiandra GD; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
 <table class="header-row" width="160" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="255" style="font-family: Maiandra GD; font-weight: normal; line-height: 19px; color: #ed661e; margin: 0px; font-size: 18px; padding-bottom: 8px; padding-top: 10px;" valign="top" align="left"> CONTACTS :</td></tr></tbody></table>
      <div style="font-family: Maiandra GD; line-height: 36px; color: #444444; font-size: 13px;">
      <b> Téléphone : (+33) 01 86 65 10 00 </b><br>
      <b> E-mail : serviceclient@semeubler.com </b><br>
     </div>
</td>
</tr></tbody></table>
<table class="table-col" align="left" width="273" style="padding-right: 12px; table-layout: fixed;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-col-td" width="160" style="font-family: Maiandra GD; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
 <table class="header-row" width="255" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="160" style="font-family: Maiandra GD; font-weight: normal; line-height: 19px; color: #ed661e; margin: 0px; font-size: 14px; padding-bottom: 8px; padding-top: 10px;" valign="top" align="left"> TROUVEZ-NOUS SUR :</td></tr></tbody></table>
 
 <div style="font-family: Maiandra GD; line-height: 36px; color: #444444; font-size: 12px;">
     
     <a href="#" style="color: #6688a6; text-decoration: none; margin: 0px; text-align: center; vertical-align: baseline; border-width: 1px 1px 2px; border-style: solid; border-color: #8aafce; padding: 6px 12px; font-size: 14px; line-height: 20px; background-color: #ffffff;">Facebook</a>
     
 </div>
</td></tr></tbody></table>

    
</td></tr></tbody></table>

<table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>


<table class="table-space" height="6" style="height: 6px; font-size: 0px; line-height: 0; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="6" style="height: 6px; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table>
<table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Maiandra GD; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
<table class="table-col" align="left" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="528" style="font-family: Maiandra GD; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
  <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
  <div style="font-family: Maiandra GD; line-height: 19px; color: #777777; font-size: 14px; ">AVIS: Ce courriel est confidentiel et peut être l objet de secret professionnel. Tout usage ou diffusion de celui-ci par une personne autre que son destinataire est illégal. Si vous recevez ce courriel par erreur, veuillez nous en aviser sans délai.</div>
  <table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
  <div style="font-family: Maiandra GD; line-height: 19px; color: #bbbbbb; font-size: 13px; text-align: center;">
     <a href="#" style="color:#ed661e; text-decoration: none; background-color: transparent;">Contact</a>
     &nbsp;|&nbsp;
     <a href="#" style="color: #ed661e; text-decoration: none; background-color: transparent;">FAQ</a>
     &nbsp;|&nbsp;
     <a href="#" style="color: #ed661e; text-decoration: none; background-color: transparent;">Comment ?marche </a>
  </div>
  <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
</td></tr></tbody></table>
</td></tr></tbody></table>
<table class="table-space" height="8" style="height: 8px; font-size: 0px; line-height: 0; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="8" style="height: 8px; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table></td></tr></table>
</td></tr>
</table>
</body>
</html>';
    
    //header for sender info
    $headers = "From: $fromName"." <".$from.">";
    
    //boundary 
    $semi_rand = md5(time()); 
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
    
    //headers for attachment 
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
    
    //multipart boundary 
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
    "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 
    
    //preparing attachment
    if(!empty($file) > 0){
        if(is_file($file)){
            $message .= "--{$mime_boundary}\n";
            $fp =    @fopen($file,"rb");
            $data =  @fread($fp,filesize($file));
    
            @fclose($fp);
            $data = chunk_split(base64_encode($data));
            $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . 
            "Content-Description: ".basename($file)."\n" .
            "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" . 
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        }
    }
    $message .= "--{$mime_boundary}--";
    $returnpath = "-f" . $from;
    
    //send email
    $mail = @mail($to, $subject, $message, $headers, $returnpath);*/
	

/*	
}


// print_r($_POST['productName']);


$orderItemStatus = false;

	$valid['success'] = true;
	$valid['messages'] = "Bon de commande Ajouté";		
	
	//$connect->close();

	echo json_encode($valid);
} // /if $_POST