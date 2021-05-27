<?php 

function fetch_loginclient($email, $password){
include('connect.php');
$lien=connectMaBasi(); 
$sql = "select * from clients where email=:email and password=:password";
$prep=$lien->prepare($sql);

$prep->execute(array(':email'=>$email,':password'=>$password));

return $prep->fetch();
 }





function update_client_id($idclient, $nom, $email, $password)
{
    include('connect.php');

    $bd = connectMaBasi();

    $sql = "UPDATE clients set nom=:nom,email=:email,password=:password WHERE id=$idclient";

    $prep = $bd->prepare($sql);

    $resultat = $prep->execute(array(':nom' => $nom, ':email' => $email, ':password' => $password));
    echo "$resultat";

    $bd = null;
}


function fetch_client(){
include('connect.php');
$lien=connectMaBasi(); 
$sql = "select * from clients";
$reponse=$lien->query($sql);
echo "<br><br><br><br><p align='right'><a href='addclient.php'>ajouter un nouveau Client</a></p>";
while($row=$reponse->fetch()){
echo "<br><br><br><br>".$row['nom']."   ".$row['email']."  ".$row['password']."  <a href='../dashboard/modifier_client.php?idclient=".$row['id']."'><font color='green'>modifier</font></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='../dashboard/supprimer_client.php?idclient=".$row['id']." '><font color='red'>supprimer</font></a>";

 }

$lien=null;

}
function fetch_clientbyid($id){
include('connect.php');
$lien=connectMaBasi(); 
$sql = "select * from clients where id=:id";
$prep=$lien->prepare($sql);
$prep->execute(array(':id'=>$id));
$resultat=$prep->fetch();
return $resultat;
 $lien=null;
 }



 function supprimer_clientbyid($id){
include('connect.php');
$lien=connectMaBasi(); 
$sql = "DELETE FROM clients WHERE id=:id";
$prep=$lien->prepare($sql);
$prep->execute(array(':id'=>$id));
  echo "<p>New Records deleted succesfully!</p>";
  $lien=null;
 }

 

?>
