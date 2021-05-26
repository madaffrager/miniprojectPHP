<?php
require('connect.php');
if(isset($_POST["valider"])){
  $auteur=$_POST["auteur"];
  $bio=$_POST["bio"];
//echo$auteur." ".$bio;

$lien=connectMaBasi();  
$sql = "INSERT INTO auteurs(nom,bio) VALUES '$auteur' ''$bio";
$reponse=$lien->exec($sql);
if($reponse==FALSE){
  $err=$lien->errorinfo();
  echo'requete echoué: '.$err[2];
}else{
	 
echo'OK';
$lien=null;
  }

}

?>