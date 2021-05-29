<?php


session_start();
if(isset($_SESSION['id'])){

include('../admin/db/fetch_product.php');
$client=find_clientbyid($_SESSION['id']);
$nom=$client['nom'];
?>
<legend>

	<form method="post" action="verify.php">

	  <div class="row">
          <div class="col-50">
            <h3>Adresse de livraison</h3>
            <label for="fname"><i class="fa fa-user"></i> Nom Complet</label>
            <input type="text" id="fname" name="nom" value="<?php echo $client['nom'];?>"><br><br>
           
            <label for="adr"><i class="fa fa-address-card-o"></i> Adresse </label>
            <input type="text" id="adr" name="adresse" value="<?php echo $client['billing'];?>"><br><br>
            <label for="city"><i class="fa fa-institution"></i> Ville</label>
            <input type="text" id="city" name="ville" value="<?php echo $client['ville'];?>"><br>
<br> <label for="city"><i class="fa fa-institution"></i> Mobile</label>
            <input type="text" id="city" name="mobile" value="<?php echo $client['phone'];?>"><br>
<br>
            <div class="row">
              <div class="col-50">
                <label for="zip">Code Postal</label>
                <input type="text" id="zip" name="zip" value="<?php echo $client['zip'];?>">
              </div>
            </div>
          </div><br><br>
          <select name="payss">
          <option value="livraison">paiement à livraison</option>
          <option value="carte">par carte</option></select>
<br><br><label for="fname">Paiements</label>
            
           <br><br>
            <label for="ccnum">Numéro de carte</label>
            <input type="text" id="ccnum" name="cc" placeholder="1111-2222-3333-4444"><br><br>
                <label for="expyear">Date d'expiration</label>
                <input type="text" id="expyear" name="exp" placeholder="MM / AAAA">
              </div><br><br>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
        </div>
        
        <input name="payer" type="submit" value="Payer votre commande" class="btn">
      </form>
    </div>
  </div>

  <div class="col-25">
    <div class="container">
      <h4>Cart
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
          <b>4</b>
        </span>
      </h4>
     <?php 
    
$getAllcarts=fetch_cartpage($_SESSION['id']);
$total=0;
        foreach($getAllcarts as $cart)
        { 
          $resultat=fetch_productbyid($cart['productid']);
$total+=$cart['prix'];
echo '<p><img src="'.$resultat['image'].'" width="50">   '.$resultat['nom'].'   '.$cart['prix'];
}
   $_SESSION['total']=$total;   ?>
     
      <p>Total <span class="price" style="color:black"><b><?php echo $total; ?> MAD</b></span></p>
    </div>
  </div>
</div>




















<?php


}

?>