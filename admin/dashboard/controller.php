<?php

if (isset($_POST['modifier'])) {
  include('../db/fetch_product.php');
$idproduct=$_POST["id"];
$nom=$_POST["nom"];
$categorie=$_POST["categ"];
$image=$_POST["image"];
$descri=$_POST["description"];
$qte=$_POST["qte"];
$prix=$_POST["prix"];

update_poduit_id($idproduct, $nom, $prix, $categorie, $descri, $qte ,$image);
  @header('location: dashboard.php');
}




if(isset($_POST['modifierclient'])){

 include('../db/fetch_client.php');
$idclient=$_POST["id"];
$nom=$_POST["nom"];
$email=$_POST["email"];
$password=$_POST["password"];


update_client_id($idclient, $nom, $email, $password);
  @header('location: dashboard.php');

}
?>
