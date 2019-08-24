
<?php
include_once ('configPDO.php') ;

$dbb = new db("root","","localhost","nexity", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

function dateFR($date){
    setlocale (LC_TIME, 'fr_FR.utf8','fra');
    return ucwords(utf8_encode(strftime("%d %B %Y", strtotime(substr($date, 0, 10))))).' '.substr($date, 10);
}
function dateToFrench($date, $format) 
{
    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $french_days = array('lun.', 'mar.', 'mer.', 'jeu.', 'ven.', 'sam.', 'dim.');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
}
function taille_chaine($chaine,$max){
    if (strlen($chaine)>=$max) {
        echo substr($chaine, 0, $max).'...';
    }else{ echo $chaine;} 
}
$tables_database=array("users");

function pagination_php($count_elements,$current_page=""){
        $perPage=6;
        $npage=ceil($count_elements/$perPage);
        if(isset($current_page) and !empty($current_page) and ctype_digit($current_page)==1){
            if($current_page>$npage){
                $current=$npage;
            }else
                $current=$current_page;

        }else{
            $current=1;
        }
        $firstPage=($current-1)*$perPage;
        $result['firstPage']=$firstPage;
        $result['current']=$current;
        $result['npage']=$npage;
        $result['perPage']=$perPage;
        return $result;
}

function convertFloatVal($val){
    if(strpos(htmlentities(trim($val)),",")==1)
        $val=str_replace(",", ".", $val);
    $val=floatval($val);
    return $val;
}


//date en anglais
function reformatdate($date){
    $tableau=explode('-', $date);
    return $tableau[2].'-'.$tableau[1].'-'.$tableau[0];
}
function formatDate($date){
    $date_array=explode('/', $date);
    return $date_array['2'].'-'.$date_array['1'].'-'.$date_array['0'];
}

function getYear($date){
    $diff = abs(strtotime($date) - strtotime(date('Y-m-d')));
    $years = floor($diff / (365*60*60*24));
    return $years;
}
function dateEng($dates){
$date=date_create($dates);
return date_format($date,"Y-m-d");
}
function dateFrench($dates){
$date=date_create($dates);
return date_format($date,"d-m-Y");
}
// date1(superieur), dat2(inferieur)
function difference_between_two_dates($date1,$date2)
{
    $diff = abs(strtotime($date2) - strtotime($date1));
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    if ($days==0 and $months!=0 and $years!=0)
        printf("%d mois, %d années", $months, $years);
    else if ($days==0 and $months==0 and $years!=0)
        if ($years==1)
            printf("%d année", $years);
        else
            printf("%d années", $years);
        else if ($days==0 and $months!=0 and $years==0)
            printf("%d mois ", $months);
        else if ($days!=0 and $months!=0 and $years!=0)
            printf("%d jours, %d mois, %d années",$days, $months, $years);
        else if ($days!=0 and $months==0 and $years==0)
        {
            if($days==1)
                printf("%d jour", $days);
            else
                printf("%d jours", $days);
        }
        else if ($days!=0 and $months!=0 and $years==0)
            printf("%d jours, %d mois ",$days, $months);
        else if ($days!=0 and $months==0 and $years!=0)
            printf("%d jours, %d années ",$days, $years);
        else if($days==0 and $months==0 and $years==0)
            printf("0");
}

    function treatFile($dossier,$files){
        $image=array();
        foreach ($files as $key => $value) {
        $image[$key]=$value['name'];
        $temp_name=$value['tmp_name'];
        $infoImg=pathinfo($value['name']);
        $extension=$infoImg['extension'];
        $array=array("jpeg","png","jpg","pdf","mp3","mp4","wma","gif");
        if(in_array(strtolower($extension), $array)){
        move_uploaded_file($temp_name,$dossier.$value['name']);
       }
       else{
        echo '<script type="text/javascript">alert("le format du fichier est invalide")</script>';
       }
        
        }
        return $image;
        }

        function extractArrays($array1,$array2=array()){
            $array3=array();
            foreach ($array1 as $key => $value) {
                if(!in_array($key, $array2))
                    $array3[$key]=$value;
                }
            return $array3;
        }

        function treatForm($post_array){

        $post=array();
        if(array_key_exists('table_name', $post_array)){
            foreach ($post_array as $key => $value) {
            if($key=="table_name")
                $table=trim($value);
            else
                $post[$key]=trim($value);
        }
        $result['table']=$table;
        $result['post']=$post;
        $result['message']=1;//cette table existe
        }
        else{
            $result['table']='';
            $result['post']=array();
            $result['message']=0;//la table n'existe pas
        }
        return $result;
        }

function Enregistrer($table,$data=array()){
    global $tables_database;
    if(in_array($table, $tables_database)){
    $sql="INSERT INTO  ".$table." (";
    $array_values=array();
    $j=0;
    foreach ($data as $key => $value) {
        $array_values[$j]=trim($value);
        $j++;
        if(count($data)!=$j)
            $sql.=$key.",";
        else
            $sql.=$key.")";
    }
    $sql.=" VALUES (";
    for($i=1; $i<=count($data);$i++){
        if(count($data)==$i)
            $sql.="?)";
        else
            $sql.="?,";
    }
    $message=1;
}else{
    $message=0;//table inexistante
    $array_values=array();
    $sql='';
}


    $result['requete']=$sql;
    $result['data']=$array_values;
    $result['message']=$message;

    return $result;

}
function VerifierDonneesExiste($table,$data=array()){
    global $tables_database;
    if(in_array($table, $tables_database)){
    $sql="SELECT * FROM ".$table." WHERE ";
    $array_values=array();
    $j=0;
    foreach ($data as $key => $value) {
        $array_values[$j]=htmlentities(trim($value));
        $j++;
        if(count($data)!=$j)
            $sql.=$key."=? AND ";
        else
            $sql.=$key."=?";
    }
    $message=1;
}else{
    $message=0;
    $array_values=array();
    $sql='';
}


    $result['requete']=$sql;
    $result['data']=$array_values;
    $result['message']=$message;

    return $result;

}

function SupprimerTable($table,$key,$value){
    global $dbb;
    $dbb->deleteRow("DELETE FROM ".$table." WHERE ".$key."=?",array($value));
}
function UpdatechangeEtatBy1($table,$etat_name,$id_table,$id_table_value){
    global $dbb;
    $sql="UPDATE ".$table." SET ".$etat_name."=? WHERE ".$id_table."=?";
    // var_dump($sql);
    $dbb->updateRow($sql,array(1,$id_table_value));
}
function UpdatechangeEtatByO($table,$etat_name,$id_table,$id_table_value){
    global $dbb;
    $dbb->updateRow("UPDATE ".$table." SET ".$etat_name." =? WHERE ".$id_table."=?",array(0,$id_table_value));
}

//Fonction pour recuperer les données d'une table, eventuellement avec les donnees 
//best function
function getTableValues($table,$data=array(),$order='',$limit=''){
    global $dbb;
    $sql="SELECT * FROM ".$table;
    if(!empty($data)){
    $array_values=array();
    $j=0;
    $sql.=" WHERE ";
    foreach ($data as $key => $value) {
        $array_values[$j]=trim($value);
        $j++;
        if(count($data)!=$j)
            $sql.=$key."=? AND ";
        else
            $sql.=$key."=?";
        if (!empty($order)) {
            $sql.=" order by ".$order;
        }
         if (!empty($limit)) {
            $sql.=" limit 0,".$limit;
        } 
    }
}
else $array_values=array();
$stmt=$dbb->getRows($sql,$array_values);
return $stmt;
}

function encrypt_decrypt($action, $string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'isyett1995';
    $secret_iv = 'from199506';
    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}


function checkdata($table,$data){
    global $dbb;
    $result=VerifierDonneesExiste($table,$data);
    if($result['message']==1){
        $stmt=$dbb->getRow($result['requete'],$result['data']);
    }
    else
        $stmt=0;
    return $stmt;
}

function enregistrerTable($table,$data){
    global $dbb;
    $result=Enregistrer($table,$data);
    if($result['message']==1 && checkdata($table,$data)==0){
        $stmt=1;
        $dbb->insertRow($result['requete'],$result['data']);
    }
    else if($result['message']!=1)
        $stmt=0;//table inconnue;
    else if(checkdata($table,$data)!=0)
        $stmt=2;
    return $stmt;
}

/*            function without using fast method */

 function timeAgo($datefrom,$dateto=-1)
    {
        // Defaults and assume if 0 is passed in that
        // its an error rather than the epoch
        
        if($datefrom<=0) { return "Il y a longtemps"; }
        if($dateto==-1) { $dateto = time(); }
        
        // Calculate the difference in seconds betweeen
        // the two timestamps
        
        $difference = $dateto - $datefrom;
        
        // If difference is less than 60 seconds,
        // seconds is a good interval of choice
        
        if($difference < 60)
        {
        $interval = "s";
        }
        
        // If difference is between 60 seconds and
        // 60 minutes, minutes is a good interval
        elseif($difference >= 60 && $difference<60*60)
        {
        $interval = "n";
        }
        
        // If difference is between 1 hour and 24 hours
        // hours is a good interval
        elseif($difference >= 60*60 && $difference<60*60*24)
        {
        $interval = "h";
        }
        
        // If difference is between 1 day and 7 days
        // days is a good interval
        elseif($difference >= 60*60*24 && $difference<60*60*24*7)
        {
        $interval = "d";
        }
        
        // If difference is between 1 week and 30 days
        // weeks is a good interval
        elseif($difference >= 60*60*24*7 && $difference <
        60*60*24*30)
        {
        $interval = "ww";
        }
        
        // If difference is between 30 days and 365 days
        // months is a good interval, again, the same thing
        // applies, if the 29th February happens to exist
        // between your 2 dates, the function will return
        // the 'incorrect' value for a day
        elseif($difference >= 60*60*24*30 && $difference <
        60*60*24*365)
        {
        $interval = "m";
        }
        
        // If difference is greater than or equal to 365
        // days, return year. This will be incorrect if
        // for example, you call the function on the 28th April
        // 2008 passing in 29th April 2007. It will return
        // 1 year ago when in actual fact (yawn!) not quite
        // a year has gone by
        elseif($difference >= 60*60*24*365)
        {
        $interval = "y";
        }
        
        // Based on the interval, determine the
        // number of units between the two dates
        // From this point on, you would be hard
        // pushed telling the difference between
        // this function and DateDiff. If the $datediff
        // returned is 1, be sure to return the singular
        // of the unit, e.g. 'day' rather 'days'
        
        switch($interval)
        {
        case "m":
        $months_difference = floor($difference / 60 / 60 / 24 /
        29);
        while (mktime(date("H", $datefrom), date("i", $datefrom),
        date("s", $datefrom), date("n", $datefrom)+($months_difference),
        date("j", $dateto), date("Y", $datefrom)) < $dateto)
        {
        $months_difference++;
        }
        $datediff = $months_difference;
        
        // We need this in here because it is possible
        // to have an 'm' interval and a months
        // difference of 12 because we are using 29 days
        // in a month
        
        if($datediff==12)
        {
        $datediff--;
        }
        
        $res = ($datediff==1) ? "il y'a $datediff mois" : "$datediff
        mois";
        break;
        
        case "y":
        $datediff = floor($difference / 60 / 60 / 24 / 365);
        $res = ($datediff==1) ? "il y'a $datediff année" : "il y'a $datediff
        années";
        break;
        
        case "d":
        $datediff = floor($difference / 60 / 60 / 24);
        $res = ($datediff==1) ? "il y'a $datediff jour" : "il y'a $datediff
        jours";
        break;
        
        case "ww":
        $datediff = floor($difference / 60 / 60 / 24 / 7);
        $res = ($datediff==1) ? "il y'a $datediff semaine" : "$datediff semaines";
        break;
        
        case "h":
        $datediff = floor($difference / 60 / 60);
        $res = ($datediff==1) ? "il y'a $datediff heure" : "il y'a $datediff
        heures";
        break;
        
        case "n":
        $datediff = floor($difference / 60);
        $res = ($datediff==1) ? "environ $datediff minute" :
        "il y'a $datediff minutes";
        break;
        
        case "s":
        $datediff = $difference;
        $res = ($datediff==1) ? "il y'a $datediff seconde" :
        "il y'a $datediff secondes";
        break;
        }
        return $res;
        }

       function updateTable1($table,$post,$condition,$add_conditions=''){
    $sql="UPDATE ".$table." SET ";
    $tab=array_keys($post);
    $last_key=end($tab);
    foreach ($post as $key => $value) {
      if($key!=$last_key)
         $sql.=$key."=?, ";
      else
         $sql.=$key."=? WHERE ";
    }
    $post=array_values($post);
    $tab=array_keys($condition);
    $last_key=end($tab);
    foreach ($condition as $k => $v) {
      if($k!=$last_key)
         $sql.=$k."=?, ";
      else
         $sql.=$k."=? ";
      array_push($post, $v);
    }
    if(!empty($add_conditions)){
        if(!empty($condition))
           $sql.="AND ( ".$add_conditions.") ";
        else
           $sql.=" ".$add_conditions;
    }
$stmt['sql']=$sql;
$stmt['values']=$post;
return $stmt;
}
// updateTable($_POST,$condition=array("id"=>$id));
// updateTable($_POST,array("id"=>12),$add_conditions='age<=4');
// updateTable(array("table_name"=>'etudiant',"nom"=>"pascal"),$condition,$add_conditions='id =(SELECT id FROM classe ) ');
// updateTable($_POST,array("etat"=>1),$add_conditions='');
function updateTable($post_array,$condition,$add_conditions=''){
    global $dbb;
    $r=treatForm($post_array);
    $result=updateTable1($r['table'],$r['post'],$condition,$add_conditions);
    // var_dump($result['sql']);
    $getrow=$dbb->updateRow($result['sql'],$result['values']);
    return $getrow;
}



   

?>
