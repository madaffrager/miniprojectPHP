<?php
session_start();
if(isset($_SESSION['id']))
{
if(isset($_POST['payer'])){

$payment=$_POST['payss'];
$nom=$_POST['nom'];
$adresse=$_POST['adresse'];
$ville=$_POST['ville'];
$phone=$_POST['mobile'];
$zip=$_POST['zip'];
$total=$_SESSION['total'];
$date=date("j, n, Y"); 
$status="success";
include '../admin/db/fetch_order.php';
ajouter_adresse($nom,$adresse,$ville,$phone,$zip,$_SESSION['id']);


if($payment=='carte'){
$cc=$_POST['cc'];
$exp=$_POST['exp'];
$cvv=$_POST['cvv'];
$adresse=fetch_adressebyid($_SESSION['id']);

ajouter_cc($_SESSION['id'],$cc,$exp,$cvv);

$resultat=fetch_ccbyid($_SESSION['id']);
ajouter_order($_SESSION['id'],$adresse['id'],$date,$status,$total,$resultat['id']);
header('location: success.php?idorder='.$date.'');
}
else{
$adresse=fetch_adressebyid($_SESSION['id']);
ajouter_order($_SESSION['id'],$adresse['id'],$date,$status,$total,$payment);
header('location: success.php?idorder='.$date.'');
}
}
}
else{
	header('location: ../client/login.php');
}
?>