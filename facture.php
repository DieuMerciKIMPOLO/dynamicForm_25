<?php if(!isset($_SESSION['userId'])) {
    echo "
    <script src='assets/jquery.js'></script>
			 <script>
				 $(document).ready(function() {
					window.location.href='?boncommande=accueil&app=3';
						});
			</script>";
    }else{ 
if($_GET['o'] == 'add') { 
// add order
	echo "<div class='div-request div-hide' hidden>add</div>";
} else if($_GET['o'] == 'manord') { 
	echo "<div class='div-request div-hide' hidden>manord</div>";
} else if($_GET['o'] == 'editOrd') { 
	echo "<div class='div-request div-hide' hidden>editOrd</div>";
} // /else manage order
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>  PARTENAIRE | Bon de commande </title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
	<!-- l'heure te la date -->
    <script type="text/javascript" src="assets/js/date_heure.js"></script>
	 <link href="assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
	<link href="assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
  <style>
	.text-on-pannel {
  background: #fff none repeat scroll 0 0;
  height: auto;
  margin-left: 20px;
  padding: 3px 5px;
  position: absolute;
  margin-top: -47px;
  border: 1px solid #337ab7;
  border-radius: 8px;
}

.panel {
  /* for text on pannel */
  margin-top: 27px !important;
}

.panel-body {
  padding-top: 30px !important;
}
  </style>  

</head>

<body class="top-navigation" style="font-family:Maiandra GD;font-size:14px">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
		<?php require_once 'maquette/menu.php'; ?>
        </div>
        <div class="wrapper wrapper-content animated  fadeInRightBig">
            <div class="container">
               
			   <div class="panel panel-primary">
                                    <div class="panel-heading">
		<?php if($_GET['o'] == 'add') { ?>
  		<i class="glyphicon glyphicon-plus-sign"></i>CREATION DE BON DE COMMANDE
		<?php } else if($_GET['o'] == 'manord') { ?>
			<i class="glyphicon glyphicon-edit"></i> Gestion commande
		<?php } else if($_GET['o'] == 'editOrd') { ?>
			<i class="glyphicon glyphicon-edit"></i> Création de bon de commande
		<?php } ?>
	</div> <!--/panel-->	
	<div class="panel-body">
			
		<?php if($_GET['o'] == 'add') { 
			?>		
			<div class="success-messages"></div> <!--/success-messages-->

					

  		<form class="form-horizontal" method="POST" action="php_action/createOrder.php" id="createOrderForm">
		 
			
		  
		  <div class="col-lg-4">
		 	 <div class="panel panel-primary">
    			<div class="panel-body" style="margin-left:20px">
     				 <h3 class="text-on-pannel text-primary"><strong class="text-uppercase"> Information Livraison </strong></h3>
				<div class="form-group">
			    <label for="datelivraison" class="control-label">Date  Livraison souhaitée</label><br>
			    <input type="text" class="form-control" id="datelivraison" value="<?=date('m/d/Y');?>" name="datelivraison" placeholder="Indiquer Date  Livraison souhaitée" autocomplete="off" />
			</div>

			<div class="form-group">
				  <label for="NomPrenomLivraison" class="control-label">Nom & Prénom</label>
			      <input type="text" class="form-control" id="NomPrenomLivraison"  name="NomPrenomLivraison" placeholder="Indiquer le nom et le prénom" autocomplete="off" />
			      <input type="hidden" class="form-control" id="user"  name="user" value="<?=$_SESSION['userId']?>" autocomplete="off" />
			</div>

			<div class="form-group">
				  <label for="user_input_autocomplete_address" class="control-label">Adresse Livraison</label>
			      <input type="text" class="form-control" id="user_input_autocomplete_address"  name="user_input_autocomplete_address" placeholder="Indiquer l'adresse de livraison" autocomplete="off" />
			</div>
			<div class="form-group">
				  <label for="TelephoneClient" class="control-label">Télephone Client</label>
			      <input type="text" class="form-control" id="TelephoneClient"  name="TelephoneClient" placeholder="Indiquer le numéro de télephone" autocomplete="off" onkeypress="return ISNumber(event)"/>
			</div>
			<div class="form-group">
				  <label for="EmailClient" class="control-label">E-mail Client</label>
			      <input type="text" class="form-control" id="EmailClient"  name="EmailClient" placeholder="Indiquer e-mail du client" autocomplete="off" />
			      <span id="error" style="display:none;color:red"> L'adresse e-mail ne pas encore conforme</span>
			</div>
    			</div>
  			</div>
		  </div>
		  
		  <div class="col-lg-4">
		 	 <div class="panel panel-primary">
    			<div class="panel-body" style="margin-left:20px">
     				 <h3 class="text-on-pannel text-primary"><strong class="text-uppercase"> Information Facturation </strong></h3>
				 
					  <div class="form-group">
			   			 <label for="orderDate" class="control-label">Date facture</label> <br>
						<input type="text" class="form-control" id="orderDate" value="<?=date('m/d/Y');?>" name="orderDate" placeholder="Date de la facture" autocomplete="off" />
					  </div>
					  <div class="form-group">
				      <label for="NomPrenomSocAg" class="control-label">Nom & Prénom </label>
			          <input type="text" class="form-control" id="NomPrenomSocAg"  name="NomPrenomSocAg" placeholder="Indiquer le nom et prénom " autocomplete="off" />
						</div>

					  <div class="form-group">
				      <label for="Societe" class="control-label">Societe </label>
			          <input type="text" class="form-control" id="Societe"  name="Societe" placeholder="Indiquer le nom de la Societe " autocomplete="off" />
						</div>

					  <div class="form-group">
				      	<label for="AdresseSociete" class="control-label"> Adresse Facturation </label>
			          	<input type="text" class="form-control" id="AdresseSociete"  name="AdresseSociete" placeholder="Indiquer l'adresse de la societé " autocomplete="off" />
					 </div>

					 <div class="form-group">
				      	<label for="TelephoneFixe" class="control-label"> Telephone  </label>
			          	<input type="text" class="form-control" id="TelephoneFixe"  name="TelephoneFixe" placeholder="Indiquer le numero du télephone fixe " autocomplete="off" onkeypress="return ISNumber(event)"/>
					 </div>
    			</div>
  			</div>
		  </div>
		  
		  <div class="col-lg-4">
		 	 <div class="panel panel-primary">
    			<div class="panel-body" style="margin-left:20px">
     				 <h3 class="text-on-pannel text-primary"><strong class="text-uppercase"> Information Agence/Agent </strong></h3>
					 
					  <div class="form-group">
				      	<label for="NomPrenomAgent" class="control-label"> Nom & Prénom de l'agent  </label>
			          	<input type="text" class="form-control" id="NomPrenomAgent"  name="NomPrenomAgent" placeholder="Indiquer le nom & prénom de l'agent " autocomplete="off" />
					 </div>

					 <div class="form-group">
				      	<label for="TelephoneAgent" class="control-label"> Numéro de télephone  </label>
			          	<input type="text" class="form-control" id="TelephoneAgent"  name="TelephoneAgent" placeholder="Indiquer le Telephone de l'agent " autocomplete="off" onkeypress="return ISNumber(event)"/>
					 </div>

					 <div class="form-group">
				      	<label for="EmailAgent" class="control-label"> E-mail de l'Agent   </label>
			          	<input type="text" class="form-control" id="EmailAgent"  name="EmailAgent" placeholder="Indiquer l'email de l'agent " autocomplete="off" />
						  <span id="error1" style="display:none;color:red"> L'adresse e-mail ne pas encore conforme</span>
					</div>

					 <div class="form-group">
				      	<label for="NumeroMgAgent" class="control-label"> Numero de MG   </label>
			          	<input type="text" class="form-control" id="NumeroMgAgent"  name="NumeroMgAgent" placeholder="Indiquer le numero du mandataire G  " autocomplete="off" onkeypress="return ISNumber(event)"/>
					 </div>
					 

					</div>
  			</div>
  		</div>

		  
			
		
              <div class="col-sm-12" style="margin-left:100px">

			  <div class="form-group" >
			 
			  <label for="clientName"> Sélectionner le pack :  </label>
			  
			  					<select  class="form-control packs"  name="packs" id="packs" >
			  						<option value="">---- Selectionner le park ----</option>
			  						<?php
			  							$parkSql = "SELECT * FROM brands where brand_active=1 and brand_status=1 ";
			  							$parkData = $connect->query($parkSql);

			  							while($row =$parkData->fetch_array()) {									 		
			  								echo "<option value='".$row['brand_id']."' id=''>".$row['brand_name']."</option>";
										 	} 
			  						?>
		  						</select>
								  </div>
					</div>

					
					

			
                <div class="table">

				<div id="form">
			</div>
					
		  
			
			   
				<div class="results-ajax"></div>
			  
			  </div>
				
			  <div class="col-md-12 text-center" >
			  <div class="DernierChamp"></div>
			  </div>
			  <div class="col-md-6">
			  	<div class="form-group">
				    <label for="subTotal" class="col-sm-3 control-label">Montant HT</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="subTotal" name="subTotal" disabled="true" />
				      <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" />
				    </div>
				  </div> <!--/form-group-->			  
				  <div class="form-group">
				    <label for="vat" class="col-sm-3 control-label">TVA </label>
				    <div class="col-sm-9">
					<input type="text" class="form-control"  value="20 %" disabled="true" />
				      
				    </div>
				  </div> <!--/form-group-->			  
				  		  		  
			  </div> <!--/col-md-6-->

			  <div class="col-md-6">
			  <div class="form-group">
				    <label for="grandTotal" class="col-sm-3 control-label">  Montant TVA </label>
				    <div class="col-sm-9">
					  <input type="text" class="form-control" id="vat" name="vat" disabled="true" />
				      <input type="hidden" class="form-control" id="vatValue" name="vatValue" />
				    </div>
				  </div>
				  
			  <div class="form-group">
				    <label for="totalAmount" class="col-sm-3 control-label">Loyer mensuel TTC </label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="totalAmount" name="totalAmount" disabled="true"/>
				      <input type="hidden" class="form-control" id="totalAmountValue" name="totalAmountValue" />
				    </div>
				  </div> 						  
			  </div> <!--/col-md-6-->

         <hr>
			  <div class="form-group submitButtonFooter">
			    <div class="col-sm-offset-5 col-sm-10">
			  
			      <button type="submit"  onclick="handleSubmit()" id="createOrderBtn" data-loading-text="Enregistrement du  bon  de commande encours..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Enregistrer</button>

			      <button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="glyphicon glyphicon-refresh"></i> Annuler</button>
			    </div>
			  </div>
			</form>
			
		<?php } else if($_GET['o'] == 'manord') { 
		
			?>

			<div id="success-messages"></div>
			<?php 
			   $user=getTableValues('users',array("user_id"=>$_SESSION['userId']));
                  if (!empty($user)) {
                      foreach ($user as $key => $value) {
                    $row=$value;
                      if (!empty($row['profil'])) {
                       $profil=getTableValues('profil',array("idprofil"=>$row['profil']));
                     foreach ($profil as $key => $value) {
                        $rows=$value;
                           }
                     }
                       }
                       }
					if($rows['NameProfil']=='admin')
					{ ?>
			  <table class="table" id="manageOrderTable">
				<thead>
					
					<tr>
						<th>N°</th>
						<th>Date Commande</th>
						<th>Nom client</th>
						<th>Contact Client</th>
						<th>Nom Agent</th>
						<th>Contact Agent</th>
						<th>Numero MG</th>
						<th>Montant</th>
						<th>Status</th>
						<th>Option</th>
					</tr>
				</thead>
			</table>
        
		<?php } 
		  else { ?>
			<table class="table" id="manageOrderTable">
			<thead>
				
				<tr>
					<th>N°</th>
					<th>Date Commande</th>
					<th>Nom client</th>
					<th>Contact Client</th>
					<th>Nom Agent</th>
					<th>Contact Agent</th>
					<th>Numero MG</th>
					<th>Montant</th>
					<th>Option</th>
				</tr>
			</thead>
		</table>

			<?php  }
		   ?>

		<?php 
		// /else manage order
		} else if($_GET['o'] == 'editOrd') {
			// get order
			?>
			
	  <div class="success-messages"></div> <!--/success-messages-->

  		<form class="form-horizontal" method="POST" action="php_action/editOrder.php" id="editOrderForm">

  			<?php $orderId = $_GET['i'];

  			$sql = "SELECT orders.order_id, orders.order_date, orders.client_name, orders.client_contact, orders.sub_total, orders.vat, orders.total_amount, orders.discount, orders.grand_total, orders.paid, orders.due, orders.payment_type, orders.payment_status FROM orders 	
					WHERE orders.order_id = {$orderId}";

				$result = $connect->query($sql);
				$data = $result->fetch_row();				
  			?>
			  <div class="form-group">
			    <label for="orderDate" class="col-sm-2 control-label">Date facture</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="orderDate" name="orderDate" autocomplete="off" value="<?php echo $data[1] ?>" />
			    </div>
			  </div> <!--/form-group-->
			  <div class="form-group">
			    <label for="clientName" class="col-sm-2 control-label">Nom client</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="clientName" name="clientName" placeholder="Client Name" autocomplete="off" value="<?php echo $data[2] ?>" />
			    </div>
			  </div> <!--/form-group-->
			  <div class="form-group">
			    <label for="clientContact" class="col-sm-2 control-label">Contact client</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="clientContact" name="clientContact" placeholder="Contact Number" autocomplete="off" value="<?php echo $data[3] ?>" />
			    </div>
			  </div> <!--/form-group-->		
			  	  

			  <table class="table" id="productTable">
			  	<thead>
			  		<tr>			  			
			  			<th style="width:40%;">Produit</th>
			  			<th style="width:20%;">Prix HT</th>
			  			<th style="width:15%;">Quantité</th>			  			
			  			<th style="width:15%;">Total HT</th>			  			
			  			<th style="width:10%;"></th>
			  		</tr>
			  	</thead>
			  	<tbody>
			  		<?php

			  		$orderItemSql = "SELECT order_item.order_item_id, order_item.order_id, order_item.product_id, order_item.quantity, order_item.rate, order_item.total FROM order_item WHERE order_item.order_id = {$orderId}";
						$orderItemResult = $connect->query($orderItemSql);
						// $orderItemData = $orderItemResult->fetch_all();						
						
						// print_r($orderItemData);
			  		$arrayNumber = 0;
			  		// for($x = 1; $x <= count($orderItemData); $x++) {
			  		$x = 1;
			  		while($orderItemData = $orderItemResult->fetch_array()) { 
			  			// print_r($orderItemData); ?>
			  			<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">			  				
			  				<td style="margin-left:20px;">
			  					<div class="form-group">

			  					<select class="form-control" name="productName[]" id="productName<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" >
			  						<option value="">---- Choisir ----</option>
			  						<?php
			  							$productSql = "SELECT * FROM product WHERE active = 1 AND status = 1 AND quantity != 0";
			  							$productData = $connect->query($productSql);

			  							while($row = $productData->fetch_array()) {									 		
			  								$selected = "";
			  								if($row['product_id'] == $orderItemData['product_id']) {
			  									$selected = "selected";
			  								} else {
			  									$selected = "";
			  								}

			  								echo "<option value='".$row['product_id']."' id='changeProduct".$row['product_id']."' ".$selected." >".$row['product_name']."</option>";
										 	} // /while 

			  						?>
		  						</select>
			  					</div>
			  				</td>
			  				<td style="padding-left:20px;">			  					
			  					<input type="text" name="rate[]" id="rate<?php echo $x; ?>" autocomplete="off" disabled="true" class="form-control" value="<?php echo $orderItemData['rate']; ?>" />			  					
			  					<input type="hidden" name="rateValue[]" id="rateValue<?php echo $x; ?>" autocomplete="off" class="form-control" value="<?php echo $orderItemData['rate']; ?>" />			  					
			  				</td>
			  				<td style="padding-left:20px;">
			  					<div class="form-group">
			  					<input type="number" name="quantity[]" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" value="<?php echo $orderItemData['quantity']; ?>" />
			  					</div>
			  				</td>
			  				<td style="padding-left:20px;">			  					
			  					<input type="text" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control" disabled="true" value="<?php echo $orderItemData['total']; ?>"/>			  					
			  					<input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" value="<?php echo $orderItemData['total']; ?>"/>			  					
			  				</td>
			  				<td>
			  					<button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
			  				</td>
			  			</tr>
		  			<?php
		  			$arrayNumber++;
		  			$x++;
			  		} // /for
			  		?>
			  	</tbody>			  	
			  </table>

			  <div class="col-md-6">
			  	<div class="form-group">
				    <label for="subTotal" class="col-sm-3 control-label">Montant HT</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="subTotal" name="subTotal" disabled="true" value="<?php echo $data[4] ?>" />
				      <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" value="<?php echo $data[4] ?>" />
				    </div>
				  </div> <!--/form-group-->			  
				  <!--<div class="form-group">
				    <label for="vat" class="col-sm-3 control-label">TVA 0%</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="vat" name="vat" disabled="true" value="<?php echo $data[5] ?>"  />
				      <input type="hidden" class="form-control" id="vatValue" name="vatValue" value="<?php echo $data[5] ?>"  />
				    </div>
				  </div> <!--/form-group-->			  
				  <!--<div class="form-group">
				    <label for="totalAmount" class="col-sm-3 control-label">Montant TTC</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="totalAmount" name="totalAmount" disabled="true" value="<?php echo $data[6] ?>" />
				      <input type="hidden" class="form-control" id="totalAmountValue" name="totalAmountValue" value="<?php echo $data[6] ?>"  />
				    </div>
				  </div> <!--/form-group-->			  
				 <!-- <div class="form-group">
				    <label for="discount" class="col-sm-3 control-label">Remise</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="discount" name="discount" onkeyup="discountFunc()" autocomplete="off" value="<?php echo $data[7] ?>" />
				    </div>
				  </div> <!--/form-group-->	
				  <div class="form-group">
				    <label for="grandTotal" class="col-sm-3 control-label">Net à payer</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="grandTotal" name="grandTotal" disabled="true" value="<?php echo $data[8] ?>"  />
				      <input type="hidden" class="form-control" id="grandTotalValue" name="grandTotalValue" value="<?php echo $data[8] ?>"  />
				    </div>
				  </div> <!--/form-group-->			  		  
			  </div> <!--/col-md-6-->

			  <div class="col-md-6">
			  	<!--<div class="form-group">
				    <label for="paid" class="col-sm-3 control-label">Montant payé</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="paid" name="paid" autocomplete="off" onkeyup="paidAmount()" value="<?php echo $data[9] ?>"  />
				    </div>
				  </div> <!--/form-group-->			  
				  <!--<div class="form-group">
				    <label for="due" class="col-sm-3 control-label">Reste</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="due" name="due" disabled="true" value="<?php echo $data[10] ?>"  />
				      <input type="hidden" class="form-control" id="dueValue" name="dueValue" value="<?php echo $data[10] ?>"  />
				    </div>
				  </div> <!--/form-group-->		
				  <!--<div class="form-group">
				    <label for="clientContact" class="col-sm-3 control-label">Type paiement</label>
				    <div class="col-sm-9">
				      <select class="form-control" name="paymentType" id="paymentType" >
				      	<option value="">---- Choisir ----</option>
				      	<option value="1" <?php /*if($data[11] == 1) {
				      		echo "selected";
				      	} */ ?> >Chèque</option>
				      	<option value="2" <?php/* if($data[11] == 2) {
				      		echo "selected";
				      	}*/ ?>  >Espèce</option>
				      </select>
				    </div>
				  </div> <!--/form-group-->							  
				 <!-- <div class="form-group">
				    <label for="clientContact" class="col-sm-3 control-label">Etat paiement</label>
				    <div class="col-sm-9">
				      <select class="form-control" name="paymentStatus" id="paymentStatus">
				      	<option value="">---- Choisir ----</option>
				      	<option value="1" <?php /*if($data[12] == 1) {
				      		echo "selected";
				      	} */?>  >Payé</option>
				      	<option value="2" <?php /*if($data[12] == 2) {
				      		echo "selected";
				      	}*/ ?> >Avance</option>
				      	<option value="3" <?php /*if($data[10] == 3) {
				      		echo "selected";
				      	}*/ ?> >Non payé</option>
				      </select>
				    </div>
				  </div> <!--/form-group-->							  
			  </div> <!--/col-md-6-->


			  <div class="form-group editButtonFooter">
			    <div class="col-sm-offset-2 col-sm-10">
			    <button type="button" class="btn btn-success" onclick="addRow()" id="addRowBtn" data-loading-text=" Traitement de bon  decommande encours..."> <i class="glyphicon glyphicon-plus-sign"></i> Ajouter produit </button>

			    <input type="hidden" name="orderId" id="orderId" value="<?php echo $_GET['i']; ?>" />

			    <button type="submit" id="editOrderBtn" nclick="handleSubmit()" data-loading-text="Modification de bon  decommande encours..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Enregistrer</button>
			      
			    </div>
			  </div>
			</form>

			<?php
		} // /get order else  ?>


	</div> <!--/panel-->	
</div> <!--/panel-->	

		
				 

            </div>

        </div>
      
       <!-- footer-->        
					<?php  require("maquette/footer.php")?>
		<!-- fin footer-->

        </div>
        </div>

	<!-- edit order -->
<div class="modal fade" tabindex="-1" role="dialog" id="paymentOrderModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-edit"></i> Editer paiement</h4>
      </div>      

      <div class="modal-body form-horizontal" style="max-height:500px; overflow:auto;" >

      	<div class="paymentOrderMessages"></div>

      	     				 				 
			  <div class="form-group">
			    <label for="due" class="col-sm-3 control-label">Reste</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="due" name="due" disabled="true" />					
			    </div>
			  </div> <!--/form-group-->		
			  <div class="form-group">
			    <label for="payAmount" class="col-sm-3 control-label">Montant payé</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="payAmount" name="payAmount"/>					      
			    </div>
			  </div> <!--/form-group-->		
			  <div class="form-group">
			    <label for="clientContact" class="col-sm-3 control-label">Type paiement</label>
			    <div class="col-sm-9">
			      <select class="form-control" name="paymentType" id="paymentType" >
			      	<option value="">---- Choisir ----</option>
			      	<option value="1">Chèque</option>
			      	<option value="2">Espèce</option>
			      </select>
			    </div>
			  </div> <!--/form-group-->							  
			  <div class="form-group">
			    <label for="clientContact" class="col-sm-3 control-label">Etat paiement</label>
			    <div class="col-sm-9">
			      <select class="form-control" name="paymentStatus" id="paymentStatus">
			      	<option value="">---- Choisir ----</option>
			      	<option value="1">Payé</option>
			      	<option value="2">Avance</option>
			      	<option value="3">Non payé</option>
			      </select>
			    </div>
			  </div> <!--/form-group-->							  				  
      	        
      </div> <!--/modal-body-->
      <div class="modal-footer">
      	<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
        <button type="button" class="btn btn-primary" id="updatePaymentOrderBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer</button>	
      </div>           
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /edit order-->

<!-- remove order -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeOrderModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Spprimer facture</h4>
      </div>
      <div class="modal-body">

      	<div class="removeOrderMessages"></div>

        <p>Voulez-vous vraiment supprimer ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
        <button type="button" class="btn btn-primary" id="removeOrderBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove order-->

     
	<script src="assets/js/jquery-2.1.1.js"></script>
	
	<script type="text/javascript">
       $(document).ready(function(){
       $('#packs').on('change',function(){

		var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'php_action/dataproductpaks.php',
                data:'brand_id='+countryID,
                success:function(data){
					$('.results-ajax').html(data);
                }
            }); 
        }else{
            $('.results-ajax').html('<table class="table table-striped table-bordered table-hover dataTables-example" id="productTable"><thead><tr><th >Produit</th><th >Prix HT</th><th >Quantité</th>	<th>Total</th></tr></thead><tbody><tr> <td colspan="4" style="text-align:center"><button  style="font-size:18px"type="button" class="btn btn-lg btn-danger"> Veuillez selectionner un pack </button></td> </tr></tbody>	</table>');
            
        }
    });
    
   
});
</script>
<script type="text/javascript">     
function  ISNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if ( (charCode>31 && charCode < 48) || charCode > 57) {
			
            alert('Veuillez saisir des chiffres ,On attend un nombre');
			return false;
        }
        return true;
    }
</script>

<script type="text/javascript">
       $(document).ready(function(){
        $('#EmailClient').on('keypress', function() {
		var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
		if(!re) {
			$('#error').show();
		} else {
			$('#error').hide();
		}
	})

	$('#EmailAgent').on('keypress', function() {
		var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
		if(!re) {
			$('#error1').show();
		} else {
			$('#error1').hide();
		}
	})
    
   
});
</script>





	<script src="custom/js/index.js"></script>
	<script src="custom/js/order.js"></script>
	<script type="text/javascript"  src="https://maps.googleapis.com/maps/api/js?libraries=places&amp;key=AIzaSyB0whTx8hYjJ0VPc_rd_celuRaknyFdkPk"></script>

    <!-- Custom JS code to bind to Autocomplete API -->
    <script type="text/javascript" src="assets/js/autocomplete.js"></script>     
	 <!-- Data picker -->
   <script src="assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="assets/js/inspinia.js"></script>
    <script src="assets/js/plugins/pace/pace.min.js"></script>
	
	<script src="assets/js/plugins/dataTables/datatables.min.js"></script>

</body>

</html>
<?php     } ?>