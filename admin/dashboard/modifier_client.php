<?php
session_start();
if(isset($_SESSION['id'])){
include('../db/fetch_client.php');
$idclient=$_GET['idclient'];
$resultat=fetch_clientbyid($idclient);

//MAJ des données
}else{
    header("location: ../login.html.php");
}
?>

<form method="post" action="controller.php" enctype="multipart/form-data">
<fieldset>
<legend><h3>Info Client </h3></legend>
<table>
<tr>
  
    <td>id:</td>
    <td><input type='text' name='id'required value="<?php echo $resultat["id"];
?>" ></td>
</tr>
<tr>
  
    <td>nom:</td>
	<td><input type='text' name='nom'required value="<?php echo $resultat["nom"];
?>" ></td>
</tr>
<tr>
  
    <td>categorie:</td>
	<td><input type='text' name='email'required value="<?php echo $resultat["email"];
?>" ></td>
</tr>
<tr>
    <td>password:</td>
	<td><input type='text' name='password'required value="<?php echo $resultat["password"];
?>"  ></td>
</tr>

<tr>
    

<td><input type="submit" name="modifierclient" value="modifier" /></td>
</tr>
</table>
</fieldset>
</form>

