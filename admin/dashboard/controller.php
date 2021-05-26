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
