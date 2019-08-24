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

    <title>  PARTENAIRE  | AGENTS </title>
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
			 
			</div>
			<br> <br>
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title panel panel-primary">
                        <h5>LISTE DES AGENTS</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                           
                           
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example"  id="manageAgentTable">
                    <thead style="background-color:#438eb9;Color:#FFF">
                     							
							<th> Nom Prenom </th>
							<th> Societe </th>
							<th>  E-mail </th>
							<th> Téléphone </th>
							
							<th> Date  </th>
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


<!-- /categories brand -->

<div class="modal fade" tabindex="-1" role="dialog" id="DesactiverMemberModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Désactiver agent </h4>
      </div>
      <div class="modal-body">

      	<div class="removeProductMessages"></div>

        <p>Voulez-vous vraiment desactiver l'agent ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
        <button type="button" class="btn btn-primary" id="removeAgentBtn" data-loading-text="Traitement encours..."> <i class="glyphicon glyphicon-ok-sign"></i> Valider </button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="modal fade" tabindex="-1" role="dialog" id="ActivationAgentModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Activer agent </h4>
      </div>
      <div class="modal-body">

      	<div class="removeProductMessages"></div>

        <p>Voulez-vous vraiment activer l'agent ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
        <button type="button" class="btn btn-primary" id="ActiverAgentBtn" data-loading-text="Traitement encours..."> <i class="glyphicon glyphicon-ok-sign"></i> Valider </button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <script src="assets/js/jquery-2.1.1.js"></script>
	 <script src="custom/js/agents.js"></script>
    
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