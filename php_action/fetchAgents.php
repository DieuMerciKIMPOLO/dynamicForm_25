<?php 	

require_once 'core.php';

function dateToFrench($date, $format) 
{
    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $french_days = array('lun.', 'mar.', 'mer.', 'jeu.', 'ven.', 'sam.', 'dim.');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
}

$sql = "SELECT  users.user_id,users.NomPrenomUser,users.NomSociete,users.username,users.TelephoneUser,users.AdresseUser,users.date_user,users.status_user FROM users where profil=2";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 
 $status_user = ""; 

 while($row = $result->fetch_array()) {
	 $userId = $row[0];
	 
	 $dates=dateToFrench($row[6],"d/m/Y");
 	// active 
 	if($row[7] == 1) {
 		// activate member
 		$status_user = "<label class='label label-success'>Active</label>";
 	} else {
 		// deactivate member
 		$status_user = "<label class='label label-danger'> Désactiver/en attente d'activation</label>";
	 }
	 
	 if($row[7] == 1) {
		$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	   
	    <li style="color:#FFF"><a type="button"  class="btn btn-danger" data-toggle="modal" data-target="#DesactiverMemberModal" onclick="DesactiverRemenber('.$userId.')"> <i class="glyphicon glyphicon-trash"></i> Desactiver</a></li>       
	  </ul>
	</div>';
	} else {
		$button = '<!-- Single button -->
		<div class="btn-group">
		  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Action <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu">
			<li style="color:#FFF"><a type="button"  class="btn btn-success" data-toggle="modal" data-target="#ActivationAgentModal" onclick="ActiverAgent('.$userId.')"> <i class="glyphicon glyphicon-trash"></i> Activer</a></li>       
		  </ul>
		</div>';
	}

 	$output['data'][] = array( 		
 		$row[1], 		
 		$row[2], 		
 		$row[3],	
 		$row[4],	
		 //$row[6]=date('d/m/Y',strtotime($row[6])),	
		 $dates,
 		$status_user,	
 		
 		
 		$button
 		); 	
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);