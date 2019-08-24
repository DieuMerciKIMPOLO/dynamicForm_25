<?php if(!isset($_SESSION['userId'])) {
    echo "
    <script src='assets/jquery.js'></script>
			 <script>
				 $(document).ready(function() {
					window.location.href='?boncommande=accueil&app=3';
						});
			</script>";
    }else{ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> PARTENAIRE | PRODUITS </title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

	<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
	<!-- l'heure te la date -->
    <script type="text/javascript" src="assets/js/date_heure.js"></script>
	<link href="assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <!-- file input -->
  <link rel="stylesheet" href="assets/plugins/fileinput/css/fileinput.min.css">

</head>
<body class="top-navigation" style="font-family:Maiandra GD;font-size:14px">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
		<?php require_once 'maquette/menu.php'; ?>
        </div>
        <div class="wrapper wrapper-content animated  fadeInRightBig">
            <div class="container">
                <div class="row">
				<div class="remove-messages"></div>
				<div class="col-lg-2">
			 <button type="button" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal"  class="ladda-button btn btn-danger"  data-style="slide-down"> <i class="fa fa-plus"></i></button>
			</div>
			<br> <br>
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title panel panel-primary">
                        <h5>LISTE DES PRODUITS</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                           
                           
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example"  id="manageProductTable">
                    <thead style="background-color:#438eb9;Color:#FFF">
                     							
							<th>Nom produit</th>
							<th>Prix HT</th>							
							<th>Famille</th>
							
							<th>Qauntité Default Produit</th>
							<th>Qauntité Famille</th>
							<th>Parks</th>
							<th>Statut</th>
							<th style="width:15%;">Options</th>
                    </thead>
                  
                    </table>
                        </div>

                    </div>
                </div>
            </div>
			
			
            </div>

				
				 

            </div>

        </div>
        <!-- footer-->        
					<?php  require("maquette/footer.php")?>
		<!-- fin footer-->

        </div>
        </div>
<!-- add product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitProductForm" action="php_action/createProduct.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Ajouter produit</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-product-messages"></div>
	        <div class="form-group">
	        	<label for="productName" class="col-sm-3 control-label">Nom Produit </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="productName" placeholder="Nom produit" name="productName" autocomplete="off">
				    </div>
			</div> <!-- /form-group-->
			
			<div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label">Prix TTC location </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="rate" placeholder="Prix de location" name="rate" autocomplete="off" onkeyup="VirguleReplaceByPoints(this)">
				    </div>
			</div> <!-- /form-group-->	 
			
			<div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label"> Quantité Default</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="quantity" placeholder="Quantité par default" name="quantity" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

	     	        

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label"> Offre pack </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select widht="20px" class="form-control selectpicker" id="brandName[]" name="brandName[]"  multiple  required>
				      <option value="">---- Choisir ----</option>
				      	<?php 
				      	$sql = "SELECT brand_id,brand_name FROM brands where brand_active=1 and brand_status=1 ";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
				      	?>
				      </select>
				    </div>

					
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="categoryName" class="col-sm-3 control-label">Famille </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select type="text" class="form-control" id="categoryName" " name="categoryName" >
				      	<option value="">---- Choisir ----</option>
				      	<?php 
				      	$sql = "SELECT categories_id,categories_name FROM categories";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while		
				      	?>
				      </select>
				    </div>
			</div> <!-- /form-group-->	
			
			<div class="form-group">
	        	<label for="productStatus" class="col-sm-3 control-label">Statut </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="productStatus" name="productStatus">
				      	<option value="">---- Choisir ----</option>
				      	<option value="1">Disponible</option>
				      	<option value="2">Non disponible</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	

	        	         	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
	        
	        <button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Traitement encours..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->

<!-- add product -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

	<form class="form-horizontal" id="editProductForm" action="php_action/editProduct.php" method="POST">				    
				    	<br />

				    	<div id="edit-product-messages"></div>

				    	<div class="form-group">
			        	<label for="editProductName" class="col-sm-3 control-label"> Nom produit </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editProductName" placeholder="Nom du produit" name="editProductName" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	    

					<div class="form-group">
			        	<label for="editRate" class="col-sm-3 control-label">Prix TTC location </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editRate" placeholder="Rate" name="editRate" autocomplete="off" onkeyup="VirguleByPoint(this)">
						    </div>
					</div> <!-- /form-group-->
					
					<div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label"> Quantité Default</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="editquantity" placeholder="Quantité par default" name="editquantity" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

			        <div class="form-group">
			        	<label for="editBrandName" class="col-sm-3 control-label"> Offre pack </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <select class="form-control" id="editBrandName" name="editBrandName">
						      	<option value="">---- Choisir ----</option>
						      	<?php 
						      	$sql = "SELECT brand_id,brand_name FROM brands where brand_active=1 and brand_status=1";
										$result = $connect->query($sql);

										while($row = $result->fetch_array()) {
											echo "<option value='".$row[0]."'>".$row[1]."</option>";
										} // while
										
						      	?>
						      </select>
						    </div>
			        </div> <!-- /form-group-->	

			        <div class="form-group">
			        	<label for="editCategoryName" class="col-sm-3 control-label">Famille </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <select type="text" class="form-control" id="editCategoryName" name="editCategoryName" >
						      	<option value="">---- Choisir ----</option>
						      	<?php 
						      	$sql = "SELECT categories_id,categories_name FROM categories";
										$result = $connect->query($sql);

										while($row = $result->fetch_array()) {
											echo "<option value='".$row[0]."'>".$row[1]."</option>";
										} // while
										
						      	?>
						      </select>
						    </div>
			        </div> <!-- /form-group-->					        	         	       
					
					<div class="form-group">
			        	<label for="editProductStatus" class="col-sm-3 control-label">Statut </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <select class="form-control" id="editProductStatus" name="editProductStatus">
						      	<option value="">---- Choisir ----</option>
						      	<option value="1">Disponible</option>
						      	<option value="2">Non disponible</option>
						      </select>
						    </div>
			        </div> <!-- /form-group-->	     
			        	         	        

			        <div class="modal-footer editProductFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i>Fermer</button>
				        
				        <button type="submit" class="btn btn-success" id="editProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer</button>
				      </div> <!-- /modal-footer -->				     
			        </form> <!-- /.form -->		     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->
<!-- edit categories brand -->

<!-- /categories brand -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeProductModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Supprimer produit</h4>
      </div>
      <div class="modal-body">

      	<div class="removeProductMessages"></div>

        <p>Voulez-vous vraiment supprimer ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
        <button type="button" class="btn btn-primary" id="removeProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->
    <script src="assets/js/jquery-2.1.1.js"></script>
	 <script src="custom/js/product.js"></script>

	 <script>
		 function VirguleByPoint(srcObj)
		    {
               if(srcObj.value.indexOf(",")!= -1) {
                 srcObj.value = (srcObj.value.split(",")[0] + "." + srcObj.value.split(",")[1]);
                }
            }
     </script>

<script>
		 function VirguleReplaceByPoints(srcObj)
		    {
               if(srcObj.value.indexOf(",")!= -1) {
                 srcObj.value = (srcObj.value.split(",")[0] + "." + srcObj.value.split(",")[1]);
                }
            }
     </script>
    
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

	
  <script src="assets/js/bootstrap-select.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="assets/js/inspinia.js"></script>
    <script src="assets/js/plugins/pace/pace.min.js"></script>
	<script src="assets/js/plugins/dataTables/datatables.min.js"></script>

   <!-- file input -->
	<script src="assets/plugins/fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>	
	<script src="assets/plugins/fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>	
	<script src="assets/plugins/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
	<script src="assets/plugins/fileinput/js/fileinput.min.js"></script>	
	
</body>

</html>
<?php     } ?>