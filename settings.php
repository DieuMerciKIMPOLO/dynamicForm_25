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

    <title>  PARTENAIRE| PARAMETRES</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
	<!-- l'heure te la date -->
    <script type="text/javascript" src="assets/js/date_heure.js"></script>
	
	<!-- FooTable -->
    <link href="assets/css/plugins/footable/footable.core.css" rel="stylesheet">

</head>

<body class="top-navigation" style="font-family:Maiandra GD;font-size:14px;background:url(assets/images/bg_sable.png);">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
        <?php require_once 'maquette/menu.php'; ?>
        </div>

        <div class="wrapper wrapper-content">
            <div class="container">
            
               <div class="row">
                     <div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				 <i class="glyphicon glyphicon-wrench"></i>Paramètre
			</div> <!-- /panel-heading -->

			<div class="panel-body">

				

				<form action="php_action/changeUsername.php" method="post" class="form-horizontal" id="changeUsernameForm">
					<fieldset>
						<legend>Changer Information utilisateur </legend>

						<div class="changeUsenrameMessages"></div>			

						<div class="form-group">
					    <label for="username" class="col-sm-3 control-label">Nom utilisateur</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="username" name="username" placeholder="Nom utilisateur" value="<?=$row['username']; ?>"/>
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-3 col-sm-9">
					    	<input type="hidden" name="user_id" id="user_id" value="<?=$row['user_id'] ?>" /> 
					      <button type="submit" class="btn btn-success" data-loading-text="traitement encours." id="changeUsernameBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
					    </div>
					  </div>
					</fieldset>
				</form>

				<form action="php_action/changePassword.php" method="post" class="form-horizontal" id="changePasswordForm">
					<fieldset>
						<legend>Changer mot de passe</legend>

						<div class="changePasswordMessages"></div>

						<div class="form-group">
					    <label for="password" class="col-sm-3 control-label">Mot de passe courant</label>
					    <div class="col-sm-9">
					      <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe courant">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="npassword" class="col-sm-3 control-label">Nouveau mot de passe</label>
					    <div class="col-sm-9">
					      <input type="password" class="form-control" id="npassword" name="npassword" placeholder="Nouveau mot de passe">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="cpassword" class="col-sm-3 control-label">Confirmez mot de passe</label>
					    <div class="col-sm-9">
					      <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirmez mot de passe">
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-3 col-sm-9">
					    	<input type="hidden" name="user_id" id="user_id" value="<?=$row['user_id']; ?>" /> 
					      <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer </button>
					    </div>
					  </div>


					</fieldset>
				</form>

			</div> <!-- /panel-body -->		

		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
				
				 
                
               </div>

            </div>

        </div>
        
		
		<!-- footer-->        
					<?php  require("maquette/footer.php")?>
		<!-- fin footer-->

        </div>
        </div>
		
		<!-- DEBUT MODAL  AJOUT-->
                     <div class="modal inmodal" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                               <i class="fa fa-hospital-o fa-2x"> </i>
                                            <h4 class="modal-title">EDITION  D'UNE NOUVELLE FACTURE</h4>
                                            
                                        </div>
                                        <div class="modal-body">
										          <form action="facture.php?o=add" method="POST">
											          <center>VOULEZ-VOUS  EDITER UNE NOUVELLE FACTURE ?  </center>
                                             
										
                                        </div>
                                        <div class="modal-footer">
                                            <center>
                                           
										          
                                            <button type="submit" class="ladda-button btn btn-info"  data-style="slide-down"> OUI  <i class="fa fa-sign-in"></i></button>
											      <button type="button" class="btn btn-danger" data-dismiss="modal"> NON <i class="fa fa-times"></i></button>
											        </center>
                                        </div>
										</form>
                                    </div>
                                </div>
                            </div>
							                   <!-- FIN MODAL -->



    <!-- Mainly scripts -->
    <script src="assets/js/jquery-2.1.1.js"></script>
	 
	 <!-- Js parametres-->
	 <script src="custom/js/setting.js"></script>
	
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="assets/js/inspinia.js"></script>
    <script src="assets/js/plugins/pace/pace.min.js"></script>
	
	<!-- FooTable -->
    <script src="assets/js/plugins/footable/footable.all.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>

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