<?php 

include('../admin/html/header.php');

$getAllProducts=fetch_producthome();
?>

        <!-- Navigation-->

       <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <img src="https://www.hbfuller.com/-/media/images/markets-and-applications/electronics/portable-device/portable-electronic-devices.jpg?h=325&iar=0&w=848&la=fr-fr&hash=AD2D8EA2B454BD0628E95A4FD4975571">
                   
                </div>
            </div>
        </header> 
<br><br><form action="./search.php" method="POST">
        Recherche : <input type="text" name="produit" >&nbsp;&nbsp;<br><br><br>Ou par categorie<br><br>
         <input type="radio" name="produit" value="mobile">&nbsp;mobile&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" name="produit" value="cuisine">&nbsp;cuisine &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" name="produit" value="console">&nbsp;Jeu et entertainement &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" name="produit" value="electro">&nbsp;Ordinateurs
       &nbsp;&nbsp;&nbsp;&nbsp;  <input type="radio" name="produit" value="access">&nbsp;Accessoires&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="submit" name="rechercher" value="Search">
    </form>
        <!-- Section-->
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