<?php
session_start();
require_once 'php_action/db_connect.php';
 if(isset($_SESSION['userId'])) {
    echo "
    <script src='assets/jquery.js'></script>
			 <script>
				 $(document).ready(function() {
					window.location.href='?boncommande=dashboard';
						});
			</script>";
    }else{
       
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gestion de bon de commande ">
    <meta name="author" content="Semeubler.com/partenaire">
    <meta name="keyword" content="Fournisseurs,Clients,marque,Produits,Facture,Rapport">
    <link rel="shortcut icon" href="img/favicon.jpg">

    <title>  PARTENAIRE || Mot de passe oublié</title>

    <!-- Bootstrap CSS -->    
    <link href="login/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="login/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="login/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="login/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="login/css/style.css" rel="stylesheet">
    <link href="login/css/style-responsive.css" rel="stylesheet" />
   
</head>

  <body class="login-img3-body">
    <div class="container" style="margin-top:-75px">
    <form id="register-form" class="login-form" onsubmit="return false;" action="" method="POST" enctype="multipart/form-data" role="form"> 
              <div class="login-wrap">
			
            <p class="login-img">
              <!--<i class="icon_lock_alt icon"></i>-->
              <img  src="assets/img/logo.png" class="img-cirle" width="200px" alt="LOGO SeMeuBler.com">
		 
			</p>
			<div class="messages">
						
						</div>
          <div hidden="" class="erreur" style="color:RED"><b> Le nom ou ot de passe incorrecte !  </b></div>
          <div hidden="" class="pas_activer" style="color:RED"><b> Vous êtes déconnecter, Aurevoir  !  </b></div>
          <div hidden="" class="non_connecter" style="color:RED"><b> Veuillez-vous conecter !  </b></div>
			
           <div class="input-group">
                <span class="input-group-addon"><i class="icon_mail_alt"></i></span>
                <input type="text" id="username" name="username" class="form-control username" placeholder="Indiquer votre adresse e-mail">
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="CONNECTION"> Reintialiser <i class="fa fa-sign-in"> </i></button>

            <hr/>
            <div class="alert alert-loading register-alert"> </div>
                           
            
                 </div>
        <div class="separator" style="font-family: Maiandra GD">
                            <div class='text-center'>
                           
                            <label style="font-size:18px"> Pas de compte ? <a href="?boncommande=inscription"><b>  créer votre compte ! </b></a>  </label>           
                                 
                                <h3 class="text-danger"><b>NEXITY PARTENAIRE</b></h3>
                                <p style="color:#2a6496"> </p>

                                <p style="color:#2a6496">©<?php echo $date=date('Y'); ?> Tous droits Reservés.</p>
                            </div>
                        </div>
      </form>
         
    </div>
    <script type="text/javascript" src="login/scripts/jquery-2.2.0.min.js"></script>
    
    
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
  $(".connection-alert").css('margin-left','200px');
  $('.register-alert').html('<img width="50" src="login/img/login.svg">')
  $('.register-alert').fadeIn(10000)

  if ($('#register-form .username').val() != "" ) {
    
     var  username=$('.username').val();
     console.log("pseudo:" +username);
   
      $.ajax({
        url:'php_action/pdwforget.php',
        method: 'POST',
        data:'username='+username,
   beforesend: function(){
      $('.register-alert').removeClass('alert-error')
               $('.register-alert').addClass('alert-loading')
               $(".connection-alert").css('font-family','maiandra GD'); 
                $(".connection-alert").css('margin-left','10px');
                $(".connection-alert").css('font-size','18px');
               $('.register-alert').html('Vérification encours !!!!!')
               $('.register-alert').fadeIn(2000)
  },
         success:function (data) {
    console.log("data:" +data);
  if(data==0){
  
          $('.register-alert').removeClass('alert-loading')
          $('.register-alert').addClass('alert-success')
          $(".connection-alert").css('font-family','maiandra GD'); 
          $(".connection-alert").css('text-align','center');
          $(".connection-alert").css('font-size','18px');
          $('.register-alert').html("Votre demande a été acceptée <br> Un message contenant le lien d'initialisation du mot de passe vous  a été envoyé  à l'adresse e-mail <br><strong style='color:red'>"+username+"</strong>")
          /*window.setTimeout(function () {
            window.location.href = '?boncommande=accueil'
          }, 1500);*/
     }
   else if(data==1){
            registerSending = false
           $('.register-alert').removeClass('alert-loading')
           $('.register-alert').addClass('alert-danger')
           $(".connection-alert").css('font-family','maiandra GD'); 
          $(".connection-alert").css('margin-left','10px');
          $(".connection-alert").css('font-size','18px');
          $('.register-alert').html("Cet email n'existe pas  , veuillez vous inscrire !!!")
          
     }
  else{
     registerSending = false
          $('.register-alert').removeClass('alert-loading')
          $('.register-alert').addClass('alert-danger')
          $(".connection-alert").css('font-family','maiandra GD'); 
        $(".connection-alert").css('margin-left','10px');
        $(".connection-alert").css('font-size','18px');
         $('.register-alert').html("Problème technique, vueillez vérifier votre connexion internet et réessayez")
    
  }
        },
        error: function (data) {
          registerSending = false
         $('.register-alert').removeClass('alert-loading')
           $(".register-alert").css('font-family','maiandra GD'); 
           $(".register-alert").css('font-size','18px');
     $('.register-alert').addClass('alert-danger')
     $('.register-alert').html("Problème technique, vueillez contactez votre administrateur !!!")
        }
      });
    
  }
  else {
    window.setTimeout(function () {
      $('.register-alert').removeClass('alert-loading')
      $('.register-alert').addClass('alert-danger')
   $(".register-alert").css('font-family','maiandra GD'); 
      $(".register-alert").css('font-size','16px');
    
      $('.register-alert').html("Veuillez remplir  le champs.")
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

  </body>
</html>
<?php     } ?>