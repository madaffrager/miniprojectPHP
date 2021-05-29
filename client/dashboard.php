<?php
session_start();
if($_SESSION["id"]==null){
header('Location: login.php');
}
else{

if(isset($_POST["logout"])){
	session_destroy();
	header('Location: ../store/index.php');
}

echo'hello there '.$_SESSION['nom'];

}
?>

<form method="post">
	<input type="submit" name="logout"value="logout"></form>




 
<form  method="post" enctype="multipart/form-data">
	<br><br>
<input type="submit" name="orders" value="gestion des commandes" /><br>
<br>
<input type="submit" name="adresse" value="gestion adresses" /><br><br>
<input type="submit" name="creditcards" value="gestion cartes credit" /><br>
<?php 
include('../admin/db/fetch_product.php');
if(isset($_POST["orders"])){
	
fetch_orders($_SESSION['id']);
}

if(isset($_POST["adresse"])){
	
fetch_adresse($_SESSION['id']);
}
if(isset($_POST["creditcards"])){
	

//fetch_client();
}
?>

</form>
</body>
</html>