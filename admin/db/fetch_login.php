<?php 
function fetch_login($username, $password){
include('connect.php');
$lien=connectMaBasi(); 
$sql = "select * from admin where username=:username and password=:password";
$prep=$lien->prepare($sql);

$prep->execute(array(':username'=>$username,':password'=>$password));

return $prep->fetch();
 }

  
?>
