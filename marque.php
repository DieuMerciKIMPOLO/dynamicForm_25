<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> LAVOGUI-STOCK | MARQUE PRODUITS</title>
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
          <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
                <a href="dashboard.php" class="navbar-brand">LAVOGUI-STOCK</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a aria-expanded="false" role="button" href="dashboard.php"> TABLEAU DE BORD</a>
                    </li>
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> FOURNISSEUR <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="">Création</a></li>
                            <li><a href="">Gérer</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> CLIENT <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="">Création</a></li>
                            <li><a href="">Gérer</a></li>
                            
                        </ul>
                    </li>
					
					<li class="dropdown">
                        <a aria-expanded="false" role="button" href="marque.php" class="dropdown-toggle" data-toggle="dropdown"> MARQUE <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                         
                            <li><a href="marque.php">Gérer</a></li>
                            
                        </ul>
                    </li>
					<li class="dropdown">
                        <a aria-expanded="false" role="button" href="famille.php" class="dropdown-toggle" data-toggle="dropdown"> FAMILLE <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            
                            <li><a href="famille.php">Gérer</a></li>
                            
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="produits.php" class="dropdown-toggle" data-toggle="dropdown"> PRODUITS <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="produits.php">CREATION</a></li>
                            <li><a href="">GERER</a></li>
                           
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> FACTURE <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="facture.php?o=add">CREATION</a></li>
                            <li><a href="facture.php?o=manord">GERER</a></li>
                            
                        </ul>
                    </li>
					
					<li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> RAPPORT <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="rapports.php">GERER</a></li>
                            
                        </ul>
                    </li>

                </ul>
                <ul class="dropdown nav navbar-top-links navbar-right">
                     <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user fa-3x"></i> <span class="caret"></span></a>
					<ul role="menu" class="dropdown-menu">
					<li>
                        <a href="settings.php">
                            <i class="fa fa-wrench"></i> PARAMETRES
                        </a>
                    </li>
					<li>
                        <a href="logout.php" data-confirm="ETES-VOUS CERTAIN DE VOULOIR SE DECONNECTER ?">
                            <i class="fa fa-sign-out"></i> QUITTER
                        </a>
                    </li>
					</ul>
					
                </ul>
            </div>
        </nav>
        </div>
        <div class="wrapper wrapper-content">
            <div class="container">
                <div class="row">
				<div class="remove-messages"></div>
				<div class="col-lg-2">
			 <button type="button" data-toggle="modal" data-target="#addBrandModel"  class="ladda-button btn btn-danger"  data-style="slide-down"> <i class="fa fa-plus"></i></button>
            </div>
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title panel panel-primary">
                        <h5>LISTE DES MARQUES</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" id="manageBrandTable">
                    <thead style="background-color:#438eb9;Color:#FFF">
                    <tr>
                    <th>Nom Marque </th>                                             
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
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Ajouter marque</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Nom marque </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="brandName" placeholder="Nom de la marque" name="brandName" autocomplete="off">
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
	        
	        <button type="submit" class="btn btn-primary" id="createBrandBtn" name="createBrandBtn" data-loading-text="Loading..." autocomplete="off">Enregistrer</button>
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
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Editer Marque</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-brand-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
					</div>

		      <div class="edit-brand-result">
		      	<div class="form-group">
		        	<label for="editBrandName" class="col-sm-3 control-label">Nom marque </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editBrandName" placeholder="Nom de la marque" name="editBrandName" autocomplete="off">
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
	        
	        <button type="submit" class="btn btn-success" id="editBrandBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer</button>
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
        <button type="button" class="btn btn-primary" id="removeBrandBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer</button>
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
