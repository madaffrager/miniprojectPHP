<?php 

function update_poduit_id($id, $nom, $prix, $categorie, $description, $qty_stock,$image)
{
    include('connect.php');

    $bd = connectMaBasi();

    $sql = "UPDATE produit set nom=:nom,prix=:prix,categorie=:categorie,descri=:descri,qte=:qte,image=:image WHERE id=$id";

    $prep = $bd->prepare($sql);

    $resultat = $prep->execute(array(':nom' => $nom, ':prix' => $prix, ':categorie' => $categorie, ':descri' => $description, ':qte' => $qty_stock,':image'=>$image));
    echo "$resultat";

    $bd = null;
}


function fetch_product(){
include('connect.php');
$lien=connectMaBasi(); 
$sql = "select * from produit";
$reponse=$lien->query($sql);
echo "<br><br><br><br><p align='right'><a href='add.php'>ajouter un nouveau produit</a></p>";
while($row=$reponse->fetch()){
echo "<br><br><br><br>".$row['nom']."<img src='".$row['image']."'width='100'>".$row['descri']." Prix : ".$row['prix']." MAD <a href='../dashboard/modifier_produit.php?idproduct=".$row['id']."'><font color='green'>modifier</font></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='../dashboard/supprimer_produit.php?idproduct=".$row['id']." '><font color='red'>supprimer</font></a>";

 }

$lien=null;

}
function fetch_productbyid($id){
include('connect.php');
$lien=connectMaBasi(); 
$sql = "select * from produit where id=:id";
$prep=$lien->prepare($sql);
$prep->execute(array(':id'=>$id));
$resultat=$prep->fetch();
return $resultat;
 $lien=null;
 }



 function supprimer_productbyid($id){
include('connect.php');
$lien=connectMaBasi(); 
$sql = "DELETE FROM produit WHERE id=:id";
$prep=$lien->prepare($sql);
$prep->execute(array(':id'=>$id));
  echo "<p>New Records deleted succesfully!</p>";
 }

 function ajouter_produit($nom,$categorie,$description,$qte,$prix,$image){

 include('connect.php');

 	 $bd = connectMaBasi();

   $sql = "INSERT INTO produit (nom, categorie, descri, image, qte, prix) VALUES (?,?,?,?,?,?)";
$stmt= $bd->prepare($sql);
$stmt->execute([$nom,$categorie,$description,$image,$qte,$prix]);

    $bd = null;
 }

?>
