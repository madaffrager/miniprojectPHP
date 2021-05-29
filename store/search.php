<?php

include('../admin/html/header.php');
  if (isset($_POST['rechercher'])) {
        $name = $_POST['produit'];
   

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
</head>

<body>

   <?php
      


        fetch_produits_name($name);
            

}

?>
 </div>












  </div>
               
        </section>
        <!-- Footer-->
    
  <?php 
include('../admin/html/footer.php');
    ?>
    
</body>

</html>