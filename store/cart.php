
<?php session_start();



if(!isset($_SESSION['id'])){
   $sess=("<font color='white'><a href=''>Connexion</a></font>");
}
else{
$sess=("<font color='white'><a href=''>Mon Compte</a></font>");
}
if(isset($_SESSION['id'])){
include('../admin/db/fetch_product.php');

$getAllcarts=fetch_cartpage($_SESSION['id']);

$count=fetch_countcartpage($_SESSION['id']);


?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">LUNA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $count; ?></span>
                        </button>
                    </form><p > &nbsp;&nbsp;&nbsp;</p>
                    <p class="d-flex"><span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $sess; ?></span></p>
                </div>
            </div>
        </nav>

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

<?php }?>
</body></html>