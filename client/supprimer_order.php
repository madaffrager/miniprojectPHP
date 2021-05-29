
<?php
session_start();
if(isset($_SESSION['id'])){
include('../admin/db/fetch_product.php');
$idclient=$_GET['idorder'];
supprimer_orderdetailbyid($idclient);
supprimer_orderbyid($idclient);
header('location: dashboard.php');
//MAJ des données
}
?>

