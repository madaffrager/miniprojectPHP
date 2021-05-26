<?php
session_start();
if($_SESSION["id"]==null){
header('Location: login.php');
}
else{

if(isset($_POST["logout"])){
	session_destroy();
	header('Location: ../login.html.php');
}

echo'hello there '.$_SESSION['nom'];

}
?>

<form method="post">
	<input type="submit" name="logout"value="logout"></form>




 
<form  method="post" enctype="multipart/form-data">
	<br><br>
<input type="submit" name="clients" value="gestion clients" /><br>
<br>
<input type="submit" name="produits" value="gestion produits" /><br>
<?php 

if(isset($_POST["produits"])){
	
include('../db/fetch_product.php');
fetch_product();
}

if(isset($_POST["clients"])){
	
include('../db/fetch_client.php');
fetch_client();
}
?>

</form>
</body>
</html>