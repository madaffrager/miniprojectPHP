<?php
session_start();
if(isset($_SESSION['id'])){


$id=$_GET['id'];
	 include('../admin/db/fetch_product.php');
supprimer_cartbyid($id);

header('Location: cart.php');
}else{
	header('Location: ../client/login.php');
}



?>
