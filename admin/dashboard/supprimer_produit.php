<?php
include('../db/fetch_product.php');
$idproduct=$_GET['idproduct'];

supprimer_productbyid($idproduct);
header('location: dashboard.php');
//MAJ des données

?>

