<nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
              
                <a href="?boncommande=dashboard" class="navbar-brand"> <img  src="assets/img/logo.png" class="img-cirle" width="200px" alt="LOGO SeMeuBler.com"></a>
            </div>
<?php
require_once 'php_action/bdd/init.php';
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
            
<div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a aria-expanded="false" role="button" href="?boncommande=dashboard"> TABLEAU DE BORD</a>
                    </li>
                   <?php 
                    if($rows['NameProfil']=='admin')
                    {
                    ?>
                    <li class="dropdown"><a  role="button" href="?boncommande=agents"> AGENTS</a>  </li>
                    <li class="dropdown"><a  role="button" href="?boncommande=produits"> PRODUITS </a>  </li>
                    <li class="dropdown"><a  role="button" href="?boncommande=famille"> FAMILLE </a>  </li>
                    <li class="dropdown"><a  role="button" href="?boncommande=parks"> PARKS </a>  </li>
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> BON DE COMMANDE <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="?boncommande=facture&o=add">CREATION</a></li>
                            <li><a href="?boncommande=facture&o=manord">GERER</a></li>
                            
                        </ul>
                    </li>
                    <?php }else{ ?>
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> BON DE COMMANDE <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="?boncommande=facture&o=add">CREATION</a></li>
                            <li><a href="?boncommande=facture&o=manord">GERER</a></li>
    
                        </ul>
                    </li>
                    <?php } ?>
					

                </ul>
                <ul class="dropdown nav navbar-top-links navbar-right">
                     <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user fa-3x"></i> <span class="caret"></span></a>
					<ul role="menu" class="dropdown-menu">
					<li>
                        <a href="?boncommande=settings">
                            <i class="fa fa-wrench"></i> PARAMETRES
                        </a>
                    </li>
					<li>
                        <a href="?boncommande=deconnexion" data-confirm="ETES-VOUS CERTAIN DE VOULOIR SE DECONNECTER ?">
                            <i class="fa fa-sign-out"></i> QUITTER
                        </a>
                    </li>
					</ul>
					
                </ul>
            </div>
           
        </nav>
