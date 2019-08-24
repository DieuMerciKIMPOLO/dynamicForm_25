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

    <title>  PARTENAIRE |  FAMILLE</title>
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
        <div class="wrapper wrapper-content animated  fadeInRightBig">
            <div class="container">
                <div class="row">
				<div class="remove-messages"></div>
				<div class="col-lg-2">
			 <button type="button" data-toggle="modal" id="addCategoriesModalBtn" data-target="#addCategoriesModal"  class="ladda-button btn btn-danger"  data-style="slide-down"> <i class="fa fa-plus"></i></button>
           <br>
           <br>
            </div>
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title panel panel-primary">
                        <h5>LISTE DES FAMILLES</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                           
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover dataTables-example" id="manageCategoriesTable">
                    <thead style="background-color:#438eb9;Color:#FFF">
                    <tr>
                    <th>Nom famille </th>                                             
                    <th>Quantité default</th>                                             
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
<!-- add categories -->
<div class="modal fade" id="addCategoriesModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitCategoriesForm" action="php_action/createCategories.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Ajouter famille</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-categories-messages"></div>

	        <div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Nom famille: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="categoriesName" placeholder="Nom famille" name="categoriesName" autocomplete="off">
				    </div>
          </div> <!-- /form-group-->	  
          <div class="form-group">
	        	<label for="QteCheck" class="col-sm-4 control-label"> Qauntité default : </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="QteCheck" placeholder=" qauntité default" name="QteCheck" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	         	        
	       	         	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
	        
	        <button type="submit" class="btn btn-primary" id="createCategoriesBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->


<!-- edit categories brand -->
<div class="modal fade" id="editCategoriesModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editCategoriesForm" action="php_action/editCategories.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Editer famille</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-categories-messages"></div>

	      

		      <div class="edit-categories-result">
		      	<div class="form-group">
		        	<label for="editCategoriesName" class="col-sm-4 control-label">Nom famille: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="editCategoriesName" placeholder="Categories Name" name="editCategoriesName" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	         	        
            <div class="form-group">
	        	<label for="editQteCheck" class="col-sm-4 control-label"> Qauntité default : </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="editQteCheck" placeholder=" qauntité default" name="editQteCheck" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
		      </div>         	        
		      <!-- /edit brand result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editCategoriesFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
	        
	        <button type="submit" class="btn btn-success" id="editCategoriesBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeCategoriesModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Supprimer famille</h4>
      </div>
      <div class="modal-body">
        <p>Voulez-vous vraiment supprimer ?</p>
      </div>
      <div class="modal-footer removeCategoriesFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
        <button type="button" class="btn btn-primary" id="removeCategoriesBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->

    <script src="assets/js/jquery-2.1.1.js"></script>
	
	 <script src="custom/js/categories.js"></script>
    
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