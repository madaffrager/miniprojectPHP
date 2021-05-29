
<?php 



include('../admin/html/header.php');
$getAllcarts=fetch_cartpage($_SESSION['id']);




?>
<br><br><br><br><br>
<table border="1" align="center" width="800">
  <tr>
    <td>Image</td><td>Produit</td> <td>Price</td><td>Qté</td><td>Total</td></tr>

 <?php
$total=0;
        foreach($getAllcarts as $cart)
        { 
          $resultat=fetch_productbyid($cart['productid']);
$total+=$cart['prix'];
          echo'<tr><td><img src=\''.$resultat['image'].'\' width="100"></td><td>'.$resultat['nom'].'</td><td>'.$resultat['prix'].'</td><td>'.$cart['qte'].'

                    </td><td>'.$cart['qte']*$resultat['prix'].' MAD</td><td>&nbsp;<a href="modifycart.php?id='.$cart['id'].'"><font color="red">supprimer</font></a></td></tr>';




      }
?>
</table>
<br><br>

<p align="right"><h4><font color="red"><?php echo $total; ?> MAD</font></h4><a href="<?php 

if($total>0){
    echo 'checkout.php?total='.$total;
}
else{
 echo '#';   
}

?>">Valider votre achat</a></p>


</body>
<?php include('../admin/html/footer.php'); ?></html>