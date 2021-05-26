<?php
include('../db/fetch_client.php');
$idclient=$_GET['idclient'];

supprimer_clientbyid($idclient);
header('location: dashboard.php');
//MAJ des données

?>

