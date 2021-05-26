<?php
session_start();
if(isset($_SESSION['id'])){
if(isset($_POST["ajouter"])){
$nom=$_POST["nom"];
$email=$_POST["email"];
$password=$_POST["password"];

include('../db/fetch_client.php');
ajouter_client($nom,$email,$password);

header('location: dashboard.php');
}

//MAJ des données
}else{
    header("location: ../login.html.php");
}
?>

<form method="post" enctype="multipart/form-data">
<fieldset>
<legend><h3>Ajouter un client </h3></legend>
<table>

<tr>
  
    <td>nom:</td>
	<td><input type='text' name='nom'required value="" placeholder="Nom du client"></td>
</tr>
<tr>
  
    <td>email:</td>
	<td><input type='text' name='email'required value="" placeholder="email"></td>
</tr>
<tr>
    <td>password</td>
	<td><input type='text' name='password'required value="" placeholder="password" ></td>
</tr>


<td><input type="submit" name="ajouter" value="Ajouter" /></td>
</tr>
</table>
</fieldset>
</form>

