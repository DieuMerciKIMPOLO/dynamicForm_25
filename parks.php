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

    <title> PARTENAIRE | PARK PRODUIT </title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
	<!-- l'heure te la date -->
    <script type="text/javascript" src="assets/js/date_heure.js"></script>
	<link href="assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
</head>

<body class="top-navigation" style="font-family:Maiandra GD;font-size:14px">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
        <?php require_once 'maquette/menu.php'; ?>

        </div>
        <div class="wrapper wrapper-content">
            <div class="container">
                <div class="row">
				<div class="remove-messages"></div>
				<div class="col-lg-2">
			 <button type="button" data-toggle="modal" data-target="#addBrandModel"  class="ladda-button btn btn-danger"  data-style="slide-down"> <i class="fa fa-plus"></i></button>
             
            </div>
            <br><br>
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title panel panel-primary">
                        <h5>LISTE DES PARKS</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                           
                           
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" id="manageBrandTable">
                    <thead style="background-color:#438eb9;Color:#FFF">
                    <tr>
                    <th>Nom park </th>                                             
                    <th>Statut</th>                                             
                     <th>Actions</th>                                     
                    </tr>
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
<div class="modal fade" id="addBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="submitBrandForm" action="php_action/createBrand.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Ajouter park</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Nom park</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="brandName" placeholder="Nom du park" name="brandName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	         	        
	        <div class="form-group">
	        	<label for="brandStatus" class="col-sm-3 control-label">Statut </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="brandStatus" name="brandStatus">
				      	<option value="">---- Choisir ----</option>
				      	<option value="1">Disponible</option>
				      	<option value="2">Non disponible</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	         	        

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
	        
	        <button type="submit" class="btn btn-primary" id="createBrandBtn" name="createBrandBtn" data-loading-text="Traitement encours..." autocomplete="off">Enregistrer</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->

<!-- edit brand -->
<div class="modal fade" id="editBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editBrandForm" action="php_action/editBrand.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Editer park</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-brand-messages"></div>

	      

		      <div class="edit-brand-result">
		      	<div class="form-group">
		        	<label for="editBrandName" class="col-sm-3 control-label">Nom park </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editBrandName" placeholder="Nom du park" name="editBrandName" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	         	        
		        <div class="form-group">
		        	<label for="editBrandStatus" class="col-sm-3 control-label">Statut </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <select class="form-control" id="editBrandStatus" name="editBrandStatus">
					      	<option value="">---- Choisir ----</option>
					      	<option value="1">Disponible</option>
					      	<option value="2">Non disponible</option>
					      </select>
					    </div>
		        </div> <!-- /form-group-->	
		      </div>         	        
		      <!-- /edit brand result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editBrandFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
	        
	        <button type="submit" class="btn btn-success" id="editBrandBtn" data-loading-text="Traitement encours...." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->
<!-- /edit brand -->

<!-- remove brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Supprimer marque</h4>
      </div>
      <div class="modal-body">
        <p>Voulez-vous vraiment supprimer ?</p>
      </div>
      <div class="modal-footer removeBrandFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
        <button type="button" class="btn btn-primary" id="removeBrandBtn" data-loading-text="Traitement encours...."> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove brand -->
  
     
    <script src="assets/js/jquery-2.1.1.js"></script>
	
	
    <!-- Mainly scripts -->
	<script src="custom/js/brand.js"></script>
	
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="assets/js/inspinia.js"></script>
    <script src="assets/js/plugins/pace/pace.min.js"></script>
	
	<script src="assets/js/plugins/dataTables/datatables.min.js"></script>
   


    <!-- Flot -->
    <script src="assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="assets/js/plugins/flot/jquery.flot.resize.js"></script>

    <!-- ChartJS-->
    <script src="assets/js/plugins/chartJs/Chart.min.js"></script>

    <!-- Peity -->
    <script src="assets/js/plugins/peity/jquery.peity.min.js"></script>
    <!-- Peity demo -->
    <script src="assets/js/demo/peity-demo.js"></script>

</body>

</html>
<?php     } ?>