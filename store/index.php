<?php 
session_start();
if(!isset($_SESSION['id'])){
   $sess=("<font color='white'><a href=''>Connexion</a></font>");
}
else{
$sess=("<font color='white'><a href=''>Mon Compte</a></font>");
}
include('../admin/db/fetch_product.php');
$getAllProducts=fetch_producthome();
?>

        <!-- Navigation-->
    <?php 
include('../admin/html/header.php');
    ?>
       <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <img src="https://www.hbfuller.com/-/media/images/markets-and-applications/electronics/portable-device/portable-electronic-devices.jpg?h=325&iar=0&w=848&la=fr-fr&hash=AD2D8EA2B454BD0628E95A4FD4975571">
                   
                </div>
            </div>
        </header> <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
         <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">   <?php
        foreach($getAllProducts as $product)
        {
            
        ?>  
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                      <img class="card-img-top" src="<?php echo $product['image']; ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $product['nom']; ?></h5>
                                    <!-- Product price-->
                                   <?php echo $product['prix']?> MAD
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="single-product.php?product=<?php echo $product['id']?>">Voir le produit</a></div>
                            </div>
                        </div>
                    </div> 

          
<?php

}

?>
 </div>












  </div>
               
        </section>
        <!-- Footer-->
    
  <?php 
include('../admin/html/footer.php');
    ?>