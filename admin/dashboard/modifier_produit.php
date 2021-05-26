<?php
session_start();
if(isset($_SESSION['id'])){
include('../db/fetch_product.php');
$idproduct=$_GET['idproduct'];

$resultat=fetch_productbyid($idproduct);

//MAJ des données
}else{
    header("location: ../login.html.php");
}
?>

<form method="post" action="controller.php" enctype="multipart/form-data">
<fieldset>
<legend><h3>Info Product </h3></legend>
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
	<td><input type='text' name='categ'required value="<?php echo $resultat["categorie"];
?>" ></td>
</tr>
<tr>
    <td><img src='<?php echo $resultat["image"];
?>' width="100"></td>
	<td><input type='text' name='image'required value="<?php echo $resultat["image"];
?>" placeholder="Ajouter un nouveau URL" ></td>
</tr>
<tr>
    <td>description :</td>
	<td><textarea id="story" name="description"
          rows="5" cols="33">
<?php echo $resultat["descri"];
?></textarea></td>
</tr>
<tr>
    <td>qte :</td>
	<td><input type='text' name='qte'required value="<?php echo $resultat["qte"];
?>"></td>
</tr>
<tr>
    <td>prix :</td>
	<td><input type='text' name='prix'required value="<?php echo $resultat["prix"];
?>" ></td>
</tr>
<tr>
    

<td><input type="submit" name="modifier" value="modifier" /></td>
</tr>
</table>
</fieldset>
</form>

