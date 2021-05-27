<?php
session_start();
if(isset($_POST["envoyer"])){
  $username=$_POST["username"];
  $password=$_POST["password"];

require('./db/fetch_login.php');
$resultat=fetch_login($username, $password);

if($resultat!=null){
  if($resultat['username']==$username && $resultat['password']==$password){

    $_SESSION['id']=$resultat['id'];
    $_SESSION['nom']=$resultat['nom'];
    setcookie('id',$resultat['id'],time()+3600);
    $lien=null;
header('Location: dashboard/dashboard.php');
  }

else echo"Utilisateur non trouvé";
}
}

if(isset($_POST["loginclient"])){
   $email=$_POST["email"];
  $password=$_POST["password"];
 require('./db/fetch_client.php');
$resultat=fetch_loginclient($email, $password);
if($resultat!=null){
  if($resultat['email']==$email && $resultat['password']==$password){

    $_SESSION['id']=$resultat['id'];
    $_SESSION['nom']=$resultat['nom'];
    setcookie('id',$resultat['id'],time()+3600);
    $lien=null;
header('Location: ../store/index.php');
  }

else header('Location: ../client/login.php');
}


 }
 ?>