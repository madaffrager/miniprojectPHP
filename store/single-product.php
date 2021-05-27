
<?php
session_start();

$idproduct=$_GET['product'];

include('../admin/db/fetch_product.php');


$resultat=fetch_productbyid($idproduct);



?>
<html>
 
<head>

<style type="text/css">
	p{
		text-align: center;
	}
	h2{
		text-align: center;
	}
	
</style>
</head>
<body>
  <?php 
include('../admin/html/header.php');
    ?><div><br><br><br>
<p><img src="<?php echo$resultat['image']; ?>" width="300"></p>
<p><h2><?php echo$resultat['nom']; ?></h2></p><br><?php echo$resultat['prix']; ?><br>
 <form align="center" method="post"><input type="number"   name="qte" value="1"
     min="1" max="10">

                       <button name="addtocart"class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Ajouter au panier
                            
                        </button>
                    </form><p><?php echo$resultat['descri']; ?></p>
  <?php 
if(isset($_POST["addtocart"])){
if(!isset($_SESSION['id'])){
header('location: ../client/login.php');

}
else{

$qte=$_POST["qte"];
$prix=$resultat["prix"]*$qte;
$clientid=$_SESSION["id"];

ajouter_cart($idproduct,$qte,$prix,$clientid);
header('location: cart.php');
}

}



include('../admin/html/footer.php');
    ?>

</div>



</body></html>