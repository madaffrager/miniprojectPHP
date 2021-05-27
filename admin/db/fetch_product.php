<?php 
include('connect.php');
function update_poduit_id($id, $nom, $prix, $categorie, $description, $qty_stock,$image)
{
    

    $bd = connectMaBasi();

    $sql = "UPDATE produit set nom=:nom,prix=:prix,categorie=:categorie,descri=:descri,qte=:qte,image=:image WHERE id=$id";

    $prep = $bd->prepare($sql);

    $resultat = $prep->execute(array(':nom' => $nom, ':prix' => $prix, ':categorie' => $categorie, ':descri' => $description, ':qte' => $qty_stock,':image'=>$image));
    echo "$resultat";

    $bd = null;
}


function fetch_product(){
$lien=connectMaBasi(); 
$sql = "select * from produit";
$reponse=$lien->query($sql);
echo "<br><br><br><br><p align='right'><a href='add.php'>ajouter un nouveau produit</a></p>";
while($row=$reponse->fetch()){
echo "<br><br><br><br>".$row['nom']."<img src='".$row['image']."'width='100'>".$row['descri']." Prix : ".$row['prix']." MAD <a href='../dashboard/modifier_produit.php?idproduct=".$row['id']."'><font color='green'>modifier</font></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='../dashboard/supprimer_produit.php?idproduct=".$row['id']." '><font color='red'>supprimer</font></a>";

 }}




function fetch_producthome(){
$lien=connectMaBasi(); 
$sql = "select * from produit";
$reponse=$lien->query($sql);
$row=$reponse->fetchAll(PDO::FETCH_ASSOC);
return $row;
}


function fetch_productbyid($id){
$lien=connectMaBasi(); 
$sql = "select * from produit where id=:id";
$prep=$lien->prepare($sql);
$prep->execute(array(':id'=>$id));
$resultat=$prep->fetch();
return $resultat;
 $lien=null;
 }



 function supprimer_productbyid($id){
$lien=connectMaBasi(); 
$sql = "DELETE FROM produit WHERE id=:id";
$prep=$lien->prepare($sql);
$prep->execute(array(':id'=>$id));
  echo "<p>New Records deleted succesfully!</p>";
 }

 function ajouter_produit($nom,$categorie,$description,$qte,$prix,$image){


 	 $lien = connectMaBasi();

   $sql = "INSERT INTO produit (nom, categorie, descri, image, qte, prix) VALUES (?,?,?,?,?,?)";
$stmt= $lien->prepare($sql);
$stmt->execute([$nom,$categorie,$description,$image,$qte,$prix]);

    $lien = null;
 }
 function ajouter_cart($productid,$qte,$prix,$clientid){



     $bd = connectMaBasi();

   $sql = "INSERT INTO cart (productid, qte, prix, clientid) VALUES (?,?,?,?)";
$stmt= $bd->prepare($sql);
$stmt->execute([$productid,$qte,$prix,$clientid]);

    $bd = null;
 }
function fetch_cartpage($id){
$lien=connectMaBasi(); 
$sql = "select * from cart where clientid=$id";
$reponse=$lien->query($sql);
$row=$reponse->fetchAll(PDO::FETCH_ASSOC);

return $row;
}
function fetch_countcartpage($id){
$lien=connectMaBasi(); 
$sql = "select count(*) from cart where clientid=$id";
$count = $lien->query($sql)->fetchColumn();

return $count;
}
function update_cart_id($id,$qte,$prix)
{
    

    $bd = connectMaBasi();

    $sql = "UPDATE cart set qte=:qte,prix=:prix WHERE id=$id";

    $prep = $bd->prepare($sql);

    $resultat = $prep->execute(array(':qte' => $qte, ':prix' => $prix));
    echo "$resultat";

    $bd = null;
}
function supprimer_cartbyid($id){
$lien=connectMaBasi(); 
$sql = "DELETE FROM cart WHERE id=:id";
$prep=$lien->prepare($sql);
$prep->execute(array(':id'=>$id));
  echo "<p>New Records deleted succesfully!</p>";
 }

?>

