<?php

if(isset($_GET["pdf"]) && isset($_GET['order_id']))
{
	require_once 'pdf.php';
	include('php_action/database_connection.php');
	include('function.php');

	
	$output = '';
	$statement = $connect->prepare("SELECT * FROM orders WHERE order_id = :order_id LIMIT 1
	");
	$statement->execute(
		array(
			':order_id' =>  $_GET["order_id"]
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
				<td width="20%" style="margin-to:-100px;"><img src="assets/img/logo.png" width="200" heigth="200"/></td>
				<td width="50%" align="center" >
					<p> A l\'attention de <br>
					    Bon de commande N° <strong>'.$_GET["order_id"].' </strong>
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
						Societe : <strong>'.$row['Societe'].'  </strong> <br>
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
			<th scope="col"> NOM PRODUIT </th>
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
		
	    $order_id=$row['order_id'];
	  
		$query="SELECT * FROM order_item WHERE  order_id = :order_id and quantity!=0";
		$Stmt=$connect->prepare($query);
		$Stmt->bindParam(':order_id',$row['order_id'],PDO::PARAM_STR);
		$Stmt->execute();
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


		//$totaltva[]=$valtvaux*$qte;
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
			<th scope="row">'.$product_data['product_name'].'</th>
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
		  <th scope="col"> '
		 .$arraynumber.
		 '  € </th>
		</tr>
		<tr style="font-size:14px;background-color:#d9e2f3;">
		  <th scope="col"> Dont TVA 20 % </th>
		  <th scope="col"> </th>
		  <th scope="col"> </th>
		  <th scope="col"></th>
		  <th scope="col"></th>
		  <th scope="col"> '.$arraytva.
		  ' €</th>
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
	$pdf->stream($file_name, array("Attachment" => false));

	
}
}
