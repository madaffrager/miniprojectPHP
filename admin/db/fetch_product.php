<?php 
include('connect.php');

function fetch_produits_name($name)
{
   

    $bd = connectMaBasi();

    $sql = "SELECT * FROM produit WHERE nom=:nom";

    $prep = $bd->prepare($sql);

    $prep->execute(array(':nom' => $name));


   
?> <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
         <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">  <?php 
    while ($row = $prep->fetch()) {

    ?><div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                      <img class="card-img-top" src="<?php echo $row['image']; ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $row['nom']; ?></h5>
                                    <!-- Product price-->
                                   <?php echo $row['prix']?> MAD
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="single-product.php?product=<?php echo $row['id']?>">Voir le produit</a></div>
                            </div>
                        </div>
                    </div> 
<?php

  
}
}

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
 function supprimer_orderbyid($id){
$lien=connectMaBasi(); 
$sql = "DELETE FROM orders WHERE id=:id";
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


function fetch_cartbyorderid($id){
$lien=connectMaBasi(); 
$sql = "select * from cart where productid=:id";
$prep=$lien->prepare($sql);
$prep->execute(array(':id'=>$id));
$resultat=$prep->fetch();
return $resultat;
 $lien=null;
 }


function fetch_cartbyid($id){
$lien=connectMaBasi(); 
$sql = "select * from cart where id=:id";
$prep=$lien->prepare($sql);
$prep->execute(array(':id'=>$id));
$resultat=$prep->fetch();
return $resultat;
 $lien=null;
 }


function supprimer_cartbyid($id){
$lien=connectMaBasi(); 
$sql = "DELETE FROM cart WHERE id=:id";
$prep=$lien->prepare($sql);
$prep->execute(array(':id'=>$id));
  echo "<p>New Records deleted succesfully!</p>";
 }
function supprimer_cartbyclient($id){
$lien=connectMaBasi(); 
$sql = "DELETE FROM cart WHERE clientid=:id";
$prep=$lien->prepare($sql);
$prep->execute(array(':id'=>$id));
  echo "<p>New Records deleted succesfully!</p>";
 }

 function find_clientbyid($clientid){
$lien=connectMaBasi(); 
$sql = "select * from clients where id=:id";
$prep=$lien->prepare($sql);
$prep->execute(array(':id'=>$clientid));
$resultat=$prep->fetch();
return $resultat;
 $lien=null;
 }

 function fetch_orderbyid($id){
$lien=connectMaBasi(); 
$sql = "select * from orders where idclient=:id";
$prep=$lien->prepare($sql);
$prep->execute(array(':id'=>$id));
$resultat=$prep->fetch();
return $resultat;
 $lien=null;
 }
 function fetch_adressebyadresseid($id){
$lien=connectMaBasi(); 
$sql = "select * from adresse where id=:id";
$prep=$lien->prepare($sql);
$prep->execute(array(':id'=>$id));
$resultat=$prep->fetch();
return $resultat;
 $lien=null;
 }

function fetch_creditcard(){
$lien=connectMaBasi(); 
$sql = "select * from produit where";
$reponse=$lien->query($sql);
echo "<br><br><br><br><p align='right'><a href='add.php'>ajouter un nouveau produit</a></p>";
while($row=$reponse->fetch()){
echo "<br><br><br><br>".$row['nom']."<img src='".$row['image']."'width='100'>".$row['descri']." Prix : ".$row['prix']." MAD <a href='../dashboard/modifier_produit.php?idproduct=".$row['id']."'><font color='green'>modifier</font></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='../dashboard/supprimer_produit.php?idproduct=".$row['id']." '><font color='red'>supprimer</font></a>";

 }}


 function fetch_adresse($id){
$lien=connectMaBasi(); 
$sql = "select * from adresse where id=$id";
$reponse=$lien->query($sql);
echo "<br><br><br><br><p align='right'><a href='addadresse.php'>ajouter une adresse</a></p>";
while($row=$reponse->fetch()){
echo "<br><br><br><br>".$row['nom']." ".$row['adresse']." ".$row['ville']."  ".$row['zip']." ".$row['mobile']."  <a href='modifieradresse.php?idadresse=".$row['id']."'><font color='green'>modifier</font></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='../dashboard/supprimeradresse.php?idadresse=".$row['id']." '><font color='red'>supprimer</font></a>";

 }}

 function fetch_orders($id){
$lien=connectMaBasi(); 
$sql = "select * from orders where idclient=$id";
$reponse=$lien->query($sql);
echo "<br><br><br><br><p align='right'><a href='../store/cart.php'>Aller au panier</a></p>";
while($row=$reponse->fetch()){
  $adresse=fetch_adressebyadresseid($row['adresseid']);
echo "<br><br><br><br>ID commande :".$row['id']." adresse : ".$adresse['nom']." ".$adresse['adresse']." ".$adresse['ville']." ".$adresse['zip']." ".$adresse['mobile']." date :".$row['datepu']." Prix : ".$row['prix']." MAD  statut: ".$row['status']."  &nbsp;&nbsp;&nbsp;&nbsp;<a href='supprimer_order.php?idorder=".$row['id']." '><font color='red'>Annuler la commande</font></a>";

 }}


?>

