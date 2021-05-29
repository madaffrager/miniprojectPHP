<?php 
include('connect.php');
function ajouter_adresse($nom,$adresse,$ville,$phone,$zip,$id){

 	 $bd = connectMaBasi();

   $sql = "INSERT INTO adresse (nom, adresse, ville,zip,mobile,idclient) VALUES (?,?,?,?,?,?)";
$stmt= $bd->prepare($sql);
$stmt->execute([$nom,$adresse,$ville,$phone,$zip,$id]);

    $bd = null;
 }
 function fetch_adressebyid($id){
$lien=connectMaBasi(); 
$sql = "select * from adresse where idclient=:id";
$prep=$lien->prepare($sql);
$prep->execute(array(':id'=>$id));
$resultat=$prep->fetch();
return $resultat;
 $lien=null;
 }
function ajouter_order($idclient,$idadresse,$date,$status,$total,$payment){
$lien=connectMaBasi(); 

   $sql = "INSERT INTO orders (idclient, adresseid, datepu,status,prix,method) VALUES (?,?,?,?,?,?)";
$stmt= $lien->prepare($sql);
$stmt->execute([$idclient,$idadresse,$date,$status,$total,$payment]);

    $bd = null;

}



function ajouter_cc($idclient,$cc,$exp,$cvv){
$lien=connectMaBasi(); 

   $sql = "INSERT INTO creditcards (cc, exp, cvv,idclient) VALUES (?,?,?,?)";
$stmt= $lien->prepare($sql);
$stmt->execute([$cc,$exp,$cvv,$idclient]);

    $bd = null;

}

 function fetch_ccbyid($id){
$lien=connectMaBasi(); 
$sql = "select * from creditcards where idclient=:id";
$prep=$lien->prepare($sql);
$prep->execute(array(':id'=>$id));
$resultat=$prep->fetch();
return $resultat;
 $lien=null;
 }


?>