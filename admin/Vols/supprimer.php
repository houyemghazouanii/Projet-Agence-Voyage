<?php
  
  $idvol = $_GET['id'];
  
  include "../../fonctions.php";
  $conn= connect();

  //requete
  $requette= "DELETE FROM vols WHERE id='$idvol'";

  $resultat=$conn->query($requette);

  if($resultat){
    
    header('location:liste.php?delete=ok');
  }

?>