<?php
if(!isset($_SESSION['userId'])) {
    echo "
    <script src='assets/jquery.js'></script>
			 <script>
				 $(document).ready(function() {
					window.location.href='?boncommande=accueil&app=3';
						});
			</script>";
    }else{
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
            
            <div class="col-lg-6">
                <!-- DEBUT MODAL  AJOUT-->
                <div class="modal inmodal" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                               <i class="fa fa-money fa-2x"> </i>
                                            <h4 class="modal-title">EDITION  D'UN NOUVEAU BON DE COMMANDE</h4>
                                            
                                        </div>
                                        <div class="modal-body">
										          <form action="?boncommande=facture&o=add" method="POST">
											          <center>VOULEZ-VOUS  EDITER UN NOUVEAU BON DE COMMANDE ?  </center>
                                             
										
                                        </div>
                                        <div class="modal-footer">
                                            <center>
                                           
										          
                                                 <button type="submit" class="ladda-button btn btn-primary"  data-style="slide-down"> OUI  <i class="fa fa-sign-in"></i></button>
											      <button type="button" class="ladda-button btn btn-danger" data-dismiss="modal"> NON <i class="fa fa-times"></i></button>
											        </center>
                                        </div>
										</form>
                                    </div>
                                </div>
                            </div>
							                   <!-- FIN MODAL -->
                </div>
                <div class="col-lg-6">
                <a href="?boncommande=facture&o=add" type="button"   class="btn btn-sm btn-danger pull-right"> <i class="glyphicon glyphicon-plus-sign"></i> CREATION D'UNE NOUVELLE COMMANDE</a>
                               
                </div>
                
            </div>
            </div>
            </div>
        
        <div class="wrapper wrapper-content animated  fadeInRightBig">
            <div class="container">
               
			   <div class="panel panel-primary">
            <div class="panel-heading">
		
            <i class="glyphicon glyphicon-briefcase"></i> <strong>  LISTE  BON DE COMMANDE</strong>
		
	</div> <!--/panel-->	
	<div class="panel-body">
			
			  <table class="table table-hover" id="manageOrderTable">
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

		
			
	 

  		


	</div> <!--/panel-->	
</div> <!--/panel-->	

		
				 

            </div>

        </div>
       <!-- footer-->        
					<?php  require("maquette/footer.php")?>
		<!-- fin footer-->

        </div>
        </div>
     
    <script src="assets/js/jquery-2.1.1.js"></script>
  
	<script src="custom/js/boncommande.js"></script>
	
       
	 
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


	<script src="assets/js/plugins/dataTables/datatables.min.js"></script>

</body>

</html>
<?php     } ?>