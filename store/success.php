<?php
include('../admin/html/header.php');
 if (isset($_SESSION['id'])) {
 	# code...
 


$date=$_GET['idorder'];
 
$order=fetch_orderbyid($_SESSION['id']);
$getAllcarts=fetch_cartpage($_SESSION['id']);
$adresse=fetch_adressebyadresseid($order['adresseid']);




?>

<p align="center "><font color="green" size="7">Merci pour votre achat<?php echo' '.$adresse['nom'];?></font></p>
 <?php 
    
$total=0;
        foreach($getAllcarts as $cart)
        { 

          $resultat=fetch_productbyid($cart['productid']);
$total+=$cart['prix'];
echo '<p><img src="'.$resultat['image'].'" width="50">   '.$resultat['nom'].'   '.$cart['prix'];
add_orderdetail($order['id'],$resultat['id'],$cart['qte']);
}
   $_SESSION['total']=$total; 

    
     ?>
     
      <p>Total <span class="price" style="color:black"><b><?php echo $total; ?> MAD</b></span></p>


<table width="900">
	<tr>
		<td>Aresse</td><td>Date de l'achat</td><td>statut</td><td>prix</td><td>methode de paiement</td></tr>
		<tr>
		<td><?php echo $adresse['adresse'].'<br>'.$adresse['ville'].'  '.$adresse['zip'].'<br>'.$adresse['mobile']; ?></td><td><?php echo $date;?></td><td><?php echo $order['status'];?></td><td><?php echo $total.' MAD';?></td><td><?php 
		if( $order['method']=="livraison"){

			echo 'Paiement à la livraison';
		}
		else{
			echo 'Paiement par carte bancaire';
		}



			;?></td></tr>



<?php 

 supprimer_cartbyclient($_SESSION['id']);
?>
<h2>
</h2>
<br><BR>
<table><br><br><a href="../client/dashboard.php">ALLER AU COMPTE</a>
<br><br><a href="index.php">ALLER AU PAGE D'ACCEUIL</a>

</table>
</html>
<?php







}
?>

