<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>  PARTENAIRE | INSCRIPTION </title>
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
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
                <a href="?boncommande=accueil" class="navbar-brand"> <img  src="assets/img/logo.png" class="img-cirle" width="200px" alt="LOGO SeMeuBler.com"></a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a aria-expanded="false" role="button" href="?boncommande=accueil"> CONNEXION</a>
                    </li>
                   
            
            </div>
        </nav>
        </div>

        <div class="wrapper wrapper-content animated  fadeInRightBig">
            <div class="container">
            
               <div class="row">
                     <div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				 <i class="glyphicon glyphicon-user"></i> INSCRIPTION
			</div> <!-- /panel-heading -->

			<div class="panel-body">

            <form id="register-form" class="login-form" onsubmit="return false;" action="" method="POST" enctype="multipart/form-data" role="form"> 
					<fieldset>
						<legend>Information Géneral  </legend>

                        <div class="changeUsenrameMessages"></div>


                        <div class="col-lg-6">
		 	 
			
			<div class="form-group">
				  <label for="NomPrenomUser" class="control-label">Nom & Prénom *</label>
			      <input type="text" class="form-control NomPrenomUser" id="NomPrenomUser"  name="NomPrenomUser" placeholder="Indiquer vôtre le nom et le prénom" autocomplete="off" />
			</div>

			<div class="form-group">
				  <label for="user_input_autocomplete_address" class="control-label">Adresse *</label>
			      <input type="text" class="form-control user_input_autocomplete_address" id="user_input_autocomplete_address" required name="user_input_autocomplete_address" placeholder="Saisir votre adresse " autocomplete="off" />
			</div>
		
                </div>
                

                <div class="col-lg-6">
		 	 
				      	<div class="form-group">
				  <label for="TelephoneUser" class="control-label">Télephone mobile * </label>
			      <input type="text" class="form-control TelephoneUser" id="TelephoneUser"  name="TelephoneUser" placeholder="Saisir votre numéro mobile" autocomplete="off" />
			</div>
			<div class="form-group">
				  <label for="NomSociete" class="control-label"> Nom Societe * </label>
			      <input type="text" class="form-control NomSociete" id="NomSociete"  name="NomSociete" placeholder="Indiquer le nom de la societé" autocomplete="off" />
			</div>

		
    			</div>

					</fieldset>
				
					<fieldset>
						<legend>Information de connexion</legend>

						<div class="changePasswordMessages"></div>
						<div class="form-group" style="padding-top: 40px;">
					    <label for="EmailUSer" class="col-sm-3 control-label">Adresse e-mail *</label>
					    <div class="col-sm-9">
              <input type="text" class="form-control EmailUser" id="EmailUser"  name="EmailUser" placeholder="Saisir votre adresse e-mail" autocomplete="off" />
                <input type="hidden"  name="date_user" id="date_user" value="<?php echo $date=date('Y-m-d');?>" class="form-input date_user">
                    <input type="hidden" id="table_name" name="table_name" value="users" class="form-input table_name">
                    <input type="hidden" name="profil" id="profil" value="2" class="form-input profil"/> 
					    </div>
					  </div>

					  <div class="form-group" style="padding-top: 40px;">
					    <label for="password" class="col-sm-3 control-label">Votre mot de passe</label>
					    <div class="col-sm-9">
					      <input type="password" class="form-control password" id="password" name="password" placeholder="Votre  mot de passe">
					    </div>
					  </div>

					  <div class="form-group" style="padding-top: 40px;">
					    <label for="cpassword" class="col-sm-3 control-label">Confirmez mot de passe</label>
					    <div class="col-sm-9">
					      <input type="password" class="form-control cpassword" id="cpassword" name="cpassword" placeholder="Confirmez mot de passe">
					    </div>
                      </div>
                      
					  <div class="form-group" style="padding-top: 40px;">
					    <div class="col-sm-offset-5 col-sm-9">
					    	
					      <button type="submit" class="btn btn-success" data-loading-text="Loading..." id="changeUsernameBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Créer Compte </button>
					    </div>
                      </div>
            
                      
                      <div class="col-lg-12">
                      <div class="form-group" style="padding-top: 20px;">
					    <div class="col-sm-offset-3 col-sm-6">
                        <div class="register-alert alert"></div>

					    </div>
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
        <div class="footer">
            <div class="pull-right">
               <strong> INSCRIPTION </strong>            </div>
			
				
				
                                    
				

                <strong>  @  PARTENAIRE </strong> &copy; <?php echo $date=date('Y'); ?>
            </div>
        </div>
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
    <script src="assets/jquery.js"></script>
    <script type="text/javascript"  src="https://maps.googleapis.com/maps/api/js?libraries=places&amp;key=AIzaSyB0whTx8hYjJ0VPc_rd_celuRaknyFdkPk"></script>

    <!-- Custom JS code to bind to Autocomplete API -->
    <script type="text/javascript" src="assets/js/autocomplete.js"></script>
	 
	
	
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    
    <script>

//Open popin links

$('.vip-family-link').click(function (e) {
  if ($('.vip-family-link').attr('href') === "#") {
    e.preventDefault();
    togglePopin()
  }
})

$('header .pronostics-link').click(function (e) {
  if ($(this).children('a').attr('href') === "#") {
    e.preventDefault();
    togglePopin()
  }
})


//Login - register features
$('.register-button').click(function (e) {
$('.right-container').addClass('opened')
})

$('.overlay-clickable').click(function (e) {
  togglePopin();
})


var isPopinOpen = false;

function togglePopin() {
if (isPopinOpen) {
  closePopin()
} else {
  openPopin()
}

isPopinOpen = !isPopinOpen
}

function openPopin() {
//$('.login-register-popin').fadeIn(300);

$('.login-register-popin').addClass('open')

$('body').addClass('popin')

if (!$('.vip-family').hasClass('open')) {
  $('.vip-family').addClass('open')
}
}

function closePopin() {
//$('.login-register-popin').fadeOut(300);

$('.login-register-popin').removeClass('open')


$('body').removeClass('popin')


if ($('.vip-family').hasClass('open')) {
  $('.vip-family').removeClass('open')
}
}

$(document).keyup(function (e) {
if (e.keyCode == 27) {
  if (isPopinOpen) {
    closePopin()
    isPopinOpen = false;
  }
}
});


var connectionSending = false

// Connection form submit
var connectionForm = $('#connection-forms')
connectionForm.submit(function (e) {
e.preventDefault();
//var formData = connectionForm.serialize();

if (!connectionSending) {
  connectionSending = true

  $('.connection-alert').removeClass('alert-error')
  $('.connection-alert').addClass('alert-loading')
  $(".connection-alert").css('margin-left','110px');
  $('.connection-alert').html('<img width="50" src="login/img/login.svg">')
  $('.connection-alert').fadeIn(10000)

  if (!$('#connection-forms .cgu-accept-inputs').prop('checked')) {
    $('.connection-alert').addClass('alert-error')
    $('.connection-alert').removeClass('alert-loading')
    $('.connection-alert').html('Veuillez accepter les CGU.')
    connectionSending = false;
    return false;
  }

  if ($('#connection-forms .username').val() != "" && $('#connection-forms .password').val() != "") {
    

      var  username=$('#username').val();
      var  password=$('#password').val();
    
    console.log("email_user m:" +username);
    console.log("password_user:" +password);
        
     
    $.ajax({
      url: 'php_action/login_process.php',
      method: 'POST',
      data:'username='+username+'&password='+password,
 beforesend: function(){
     $('.connection-alert').removeClass('alert-error')
      $('.connection-alert').addClass('alert-loading')
      $('.connection-alert').html('Connexion en cours')
      $('.connection-alert').fadeIn(5000)
  },
      success:function (data) {
    console.log("data:" +data);
  if(data==1){
  
        $('.connection-alert').removeClass('alert-loading')
        $('.connection-alert').addClass('alert-success')
        $(".connection-alert").css('margin-left','4px');
        $(".connection-alert").css('font-size','16px');
        $('.connection-alert').html("Connexion réussie... Vous allez être redirigé dans quelques instants..")

        window.setTimeout(function () {

         window.location.href ='?boncommande=dashboard';

        }, 1500);
      }
  else{
     connectionSending = false
        $('.connection-alert').removeClass('alert-loading')
        $('.connection-alert').addClass('alert-danger')
        $('.connection-alert').addClass('alert-danger')
        $(".connection-alert").css('font-family','maiandra GD'); 
        $(".connection-alert").css('margin-left','10px');
        $(".connection-alert").css('font-size','18px');
        $('.connection-alert').html("Le mot de passe est incorrect.")
        $(".connection-alert").show("slow").delay(5000).hide("slow");
    
  }
      },
      error: function (data){
        connectionSending = false
        $('.connection-alert').removeClass('alert-loading')
        $('.connection-alert').addClass('alert-error')
        //$('.connection-alert').html(response.responseJSON.message)
   $('.connection-alert').html("smarphonz")
      }
    });
  } else {
    window.setTimeout(function () {
      $('.connection-alert').removeClass('alert-loading')
      $('.connection-alert').addClass('alert-error')
      $(".connection-alert").css('font-family','maiandra GD'); 
      $(".connection-alert").css('margin-left','8px');
      
      $(".connection-alert").css('color','red');
      $(".connection-alert").css('font-size','16px');

      $('.connection-alert').html("Veuillez remplir tous les champs.")
      //$('.connection-alert').html("")
      connectionSending = false;
    }, 500);
  }
}
})

var registerSending = false

// Register form submit
var registerForm = $('#register-form')
registerForm.submit(function (e) {
e.preventDefault();

//var formData = registerForm.serialize();

if (!registerSending) {
  registerSending = true

  $('.register-alert').removeClass('alert-error')
  $('.register-alert').addClass('alert-loading')
  $('.register-alert').html('<img width="50" src="login/img/login.svg">')
  $('.register-alert').fadeIn(20000)

  if ($('#register-form .NomPrenomUser').val() != "" && $('#register-form .EmailUser').val() != "" && $('#register-form .TelephoneUser').val() != "" && $('#register-form .user_input_autocomplete_address').val() != "" && $('#register-form .NomSociete').val() != "" && $('#register-form .password').val() != "" ) {
    console.log($('#register-form .password').val(), $('#register-form .cpassword').val())
      
      var  NomPrenomUser=$('.NomPrenomUser').val();
      var  EmailUser=$('.EmailUser').val();
      var  password=$('.password').val();
      var  profil=$('.profil').val();
      var  date_user=$('.date_user').val();
      var  table_name=$('.table_name').val();
      var  TelephoneUser=$('.TelephoneUser').val();
      var   NomSociete=$('.NomSociete').val();
      var  user_input_autocomplete_address=$('.user_input_autocomplete_address').val();
    
      console.log("Nom:" +NomPrenomUser);
      console.log("email:" +EmailUser);
      console.log("password:" +password);
      console.log("profil:" +profil);
      console.log("usernanme:" +table_name);
      console.log("prenom:" +NomSociete);
     console.log("adresse:" +user_input_autocomplete_address);
        
   
    if( $('#register-form .password').val() != $('#register-form .cpassword').val() ){
      $('.register-alert').removeClass('alert-loading')
      $(".register-alert").css('text-align','center');
      $('.register-alert').addClass('alert-danger')
      $('.register-alert').html("Les mot de passe doivent correspondre")
      registerSending = false
    }else{
      $.ajax({
        url:'php_action/register_membre.php',
        method: 'POST',
        data:'username='+EmailUser+'&NomPrenomUser='+NomPrenomUser+'&AdresseUser='+user_input_autocomplete_address+'&password='+password+'&NomSociete='+NomSociete+'&TelephoneUser='+TelephoneUser+'&date_user='+date_user+'&profil='+profil+'&table_name='+table_name,
   beforesend: function(){
      $('.register-alert').removeClass('alert-error')
               $('.register-alert').addClass('alert-loading')
               $(".register-alert").css('text-align','center');
               $('.register-alert').html('Vérification encours !!!!!')
               $('.register-alert').fadeIn(2000)
  },
         success:function (data) {
    console.log("data:" +data);
  if(data==11){
  
          $('.register-alert').removeClass('alert-loading')
          $('.register-alert').addClass('alert-success')
          $(".register-alert").css('text-align','center');
          $('.register-alert').html("Inscription réussie... Vous allez être redirigé..")

          window.setTimeout(function () {

            window.location.href ='?boncommande=dashboard';

          }, 1500);
     }
   else if(data==77){
            registerSending = false
          $('.register-alert').removeClass('alert-loading')
          $('.register-alert').addClass('alert-danger')
          $(".register-alert").css('text-align','center');
          $('.register-alert').html("Tu viens de reçevoir par mail un lien le détails concernant ton compte ! N\'oublie pas de jeter un coup d\'oeil à tes spams ou tes courriers indésirables ,Vous récevoir un deuxieme lorsque vous compte sera activé par l\'administrateur   ")

     }
     else if(data==0){
            registerSending = false
          $('.register-alert').removeClass('alert-loading')
          $('.register-alert').addClass('alert-danger')
          $(".register-alert").css('text-align','center');
          $('.register-alert').html("Cet email existe déja , veuillez vous connecté")
          
     }
  else{
     registerSending = false
          $('.register-alert').removeClass('alert-loading')
          $('.register-alert').addClass('alert-danger')
          $(".register-alert").css('text-align','center');
          $('.register-alert').html("Problème technique, veuillez contactez votre administrateur !!!")
    
  }
        },
        error: function (data) {
          registerSending = false
         $('.register-alert').removeClass('alert-loading')
         $(".register-alert").css('text-align','center');
           $(".register-alert").css('font-family','maiandra GD'); 
           $(".register-alert").css('font-size','18px');
     $('.register-alert').addClass('alert-danger')
     $('.register-alert').html("Problème technique, veuillez contactez votre administrateur !!!")
        }
      });
    }
  }
  else {
    window.setTimeout(function () {
      $('.register-alert').removeClass('alert-loading')
      $('.register-alert').addClass('alert-danger')
      $(".register-alert").css('text-align','center');
      $(".register-alert").css('font-family','maiandra GD'); 
      $(".register-alert").css('font-size','16px');
    
      $('.register-alert').html("Veuillez remplir tous les champs.")
      registerSending = false;
    }, 500);
  }
}
})

</script>
<script>
//afficher le message apres une action
function getval() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}
$(document).ready(function(){
    
    var lavogui=getval()["app"];
    
    if(lavogui==1){
        $(".erreur").css('font-family','maiandra GD'); 
         $(".erreur").css('margin-left','30px');
         $(".erreur").css('font-size','18px');
         $(".erreur").show("slow").delay(8000).hide("slow");
    }else if(lavogui==2){
        $(".pas_activer").css('font-family','maiandra GD'); 
         $(".pas_activer").css('margin-left','30px');
         $(".pas_activer").css('font-size','18px');
         $(".pas_activer").show("slow").delay(4000).hide("slow");
    }
    else if(lavogui==3){
        $(".non_connecter").css('font-family','maiandra GD'); 
         $(".non_connecter").css('margin-left','30px');
         $(".non_connecter").css('font-size','20px');
         $(".non_connecter").show("slow").delay(8000).hide("slow");
    }
    
    else if(lavogui==6){
        $(".profil").css('font-family','maiandra GD'); 
         $(".profil").css('margin-left','30px');
         $(".profil").css('font-size','18px');
         $(".profil").show("slow").delay(4000).hide("slow");
    }else if(lavogui==8){
        $(".inactivite").css('font-family','maiandra GD');
         $(".inactivite").css('margin-left','30px');
         $(".inactivite").css('font-size','18px'); 
         $(".inactivite").show("slow").delay(4000).hide("slow");
    }
})

 
</script>
	

    <!-- Peity -->
    <script src="assets/js/plugins/peity/jquery.peity.min.js"></script>
    <!-- Peity demo -->
    <script src="assets/js/demo/peity-demo.js"></script>
	

</body>
</html>