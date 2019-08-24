
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gestion de bon de commande ">
    <meta name="author" content="Flanord NZIENGUI">
    <meta name="keyword" content="Fournisseurs,Clients,marque,Produits,Facture,Rapport">
    <link rel="shortcut icon" href="img/favicon.jpg">

    <title>  PARTENAIRE || BON DE COMMANDE </title>

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
    <form id="connection-forms" class="login-form" onsubmit="return false;" action="" method="POST" enctype="multipart/form-data" role="form"> 
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
                <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input type="text" id="username" name="username" class="form-control" placeholder="Indiquer votre nom d'utilisateur">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" id="password" name="password" class="form-control" placeholder="Votre mot de passe">
            </div>
            <input type="hidden" class="cgu-accept-inputs filled-in"  checked id="filled-in-box-1"  name="cgu-accept">
           
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="CONNECTION"> Connexion <i class="fa fa-sign-in"> </i></button>

            <hr/>
           
            <div class="alert alert-loading connection-alert"> </div>
                 </div>
        <div class="separator" style="font-family: Maiandra GD">
                            <div class='text-center'>
                            
                            <label style="font-size:18px"> Pas de compte ? <a href="?boncommande=inscription"><b>  créer votre compte ! </b></a>  </label>           
                            <label style="font-size:18px">  <a href="?boncommande=forget"><b>  Mot de passe oublié ? </b></a>  </label>           
                                <h3 class="text-danger"><b> PARTENAIRE</b></h3>
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

         window.location.href = '?boncommande=dashboard';

        }, 1500);
      }
  else if(data==2){
    connectionSending = false
        $('.connection-alert').removeClass('alert-loading')
        $('.connection-alert').addClass('alert-danger')
        $('.connection-alert').addClass('alert-danger')
        $(".connection-alert").css('font-family','maiandra GD'); 
        $(".connection-alert").css('margin-left','10px');
        $(".connection-alert").css('font-size','18px');
        $('.connection-alert').html("Votre compte est désactivé, veuillez contacter l'administrateur.")
        $(".connection-alert").show("slow").delay(8000).hide("slow");
  }
  else{
     connectionSending = false
        $('.connection-alert').removeClass('alert-loading')
        $('.connection-alert').addClass('alert-danger')
        $('.connection-alert').addClass('alert-danger')
        $(".connection-alert").css('font-family','maiandra GD'); 
        $(".connection-alert").css('margin-left','10px');
        $(".connection-alert").css('font-size','18px');
        $('.connection-alert').html("Vos identifiant sont  incorrect.")
        $(".connection-alert").show("slow").delay(5000).hide("slow");
    
  }
      },
      error: function (data){
        connectionSending = false
        $('.connection-alert').removeClass('alert-loading')
        $('.connection-alert').addClass('alert-error')
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
  $('.register-alert').html('<img width="50" src="images/casting.gif">')
  $('.register-alert').fadeIn(10000)

  if ($('#register-form .nom_user').val() != "" && $('#register-form .email_user').val() != "" && $('#register-form .password_user').val() != "" ) {
    console.log($('#register-form .Cpassword_user').val(), $('#register-form .password_user').val())
      
    var  nom_user=$('.nom_user').val();
      var  email_user=$('.email_user').val();
      var  password_user=$('.password_user').val();
     var  date_user=$('.date_user').val();
      var  profil=$('.profil').val();
      var  status_user=$('.status_user').val();
      var  table_name=$('.table_name').val();
      var  prenom_user=$('.prenom_user').val();
      var  sexe=$('.sexe').val();
      var  telephone_user=$('.telephone_user').val();
      var  avatar='avatar.png';
      var  user_input_autocomplete_address=$('.user_input_autocomplete_address').val();
    
      console.log("pseudo:" +nom_user);
      console.log("email:" +email_user);
      console.log("password:" +password_user);
      console.log("profil:" +profil);
      console.log("status_user:" +status_user);
      console.log("table_name:" +table_name);
      console.log("prenom:" +prenom_user);
      console.log("date_user:" +date_user);
        
   
    if( $('#register-form .password_user').val() != $('#register-form .Cpassword_user').val() ){
      $('.register-alert').removeClass('alert-loading')
      $('.register-alert').addClass('alert-error')
      $('.register-alert').html("Les mot de passe doivent correspondre")
      registerSending = false
    }else{
      $.ajax({
        url:'api/register_membre.php',
        method: 'POST',
        data:'sexe='+sexe+'&nom_user='+nom_user+'&prenom_user='+prenom_user+'&email_user='+email_user+'&password_user='+password_user+'&date_user='+date_user+'&profil='+profil+'&table_name='+table_name+'&status_user='+status_user+'&avatar='+avatar+'&telephone_user='+telephone_user,
   beforesend: function(){
      $('.register-alert').removeClass('alert-error')
               $('.register-alert').addClass('alert-loading')
              $('.register-alert').html('Vérification encours !!!!!')
             $('.register-alert').fadeIn(2000)
  },
         success:function (data) {
    console.log("data:" +data);
  if(data==11){
  
          $('.register-alert').removeClass('alert-loading')
          $('.register-alert').addClass('alert-success')
          $('.register-alert').html("Inscription réussie... Vous allez être redirigé..")

          window.setTimeout(function () {

            window.location.href = '?castings=my_profile';

          }, 1500);
     }
   else if(data==0){
            registerSending = false
          $('.register-alert').removeClass('alert-loading')
          $('.register-alert').addClass('alert-error')
     $('.register-alert').html("Cet email existe déja , veuillez vous connecté")
          
     }
  else{
     registerSending = false
          $('.register-alert').removeClass('alert-loading')
          $('.register-alert').addClass('alert-error')
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
  }
  else {
    window.setTimeout(function () {
      $('.register-alert').removeClass('alert-loading')
      $('.register-alert').addClass('alert-danger')
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

  </body>
</html>
