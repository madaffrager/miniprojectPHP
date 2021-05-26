<?php 




function connectMaBasi(){

$basi = new PDO('mysql:host=localhost;dbname=biblio','root','');

return $basi;

 } 
?>
