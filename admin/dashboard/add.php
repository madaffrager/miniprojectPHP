<?php
session_start();
if(isset($_SESSION['id'])){
if(isset($_POST["ajouter"])){
$nom=$_POST["nom"];
$categorie=$_POST["categ"];
$description=$_POST["description"];
$qte=$_POST["qte"];
$prix=$_POST["prix"];
$image=$_POST["image"];
include('../db/fetch_product.php');
ajouter_produit($nom,$categorie,$description,$qte,$prix,$image);

header('location: dashboard.php');
}

//MAJ des données
}else{
    header("location: ../login.html.php");
}
?>

<form method="post" enctype="multipart/form-data">
<fieldset>
<legend><h3>Ajouter un Produit </h3></legend>
<table>

<tr>
  
    <td>nom:</td>
	<td><input type='text' name='nom'required value="" placeholder="Nom du produit"></td>
</tr>
<tr>
  
    <td>categorie:</td>
	<td><input type='text' name='categ'required value="" placeholder="categorie du produit"></td>
</tr>
<tr>
    <td>Image</td>
	<td><input type='text' name='image'required value="" placeholder="Le lien de l'image https://....." ></td>
</tr>
<tr>
    <td>description :</td>
	<td><textarea placeholder="Description du produit" id="story" name="description"
          rows="5" cols="33">
</textarea></td>
</tr>
<tr>
    <td>qte :</td>
	<td><input type='text' name='qte'required value="" placeholder="Quantité"></td>
</tr>
<tr>
    <td>prix :</td>
	<td><input type='text' name='prix'required value="" placeholder="Prix"></td>
</tr>
<tr>
    

<td><input type="submit" name="ajouter" value="Ajouter" /></td>
</tr>
</table>
</fieldset>
</form>

