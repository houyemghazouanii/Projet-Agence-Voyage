<?php

   include "fonctions.php";
   $hotels = AfficherHotel();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoyaGeo</title>
</head>
<body>
    <?php include "header.php" ?>


<br>
<br>
<br>
<div id="portfolio" class="container-fluid text-center bg-grey">
<h2>Hotels en Tunisie</h2><br>
 
<?php
                      foreach($hotels as $hotel){
              print'        
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="images/'.$hotel['img'].'" alt="Hammemet" width="400" height="300">
        <p><strong>'.$hotel['nom'].'</strong></p>
        <p>'.$hotel['adresse'].'</p>
        <a href="reservation.php?id='.$hotel['id'].'"  class="button-2"> Pour réserver</a>
      </div>
    </div>';  }
 ?>
</div>

</body>
</html>