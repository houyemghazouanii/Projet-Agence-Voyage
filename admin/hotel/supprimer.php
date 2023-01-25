<?php
  
  $idhotel = $_GET['id'];
  
  include "../../fonctions.php";
  $conn= connect();

  //requete
  $requette= "DELETE FROM hotel WHERE id='$idhotel'";

  $resultat=$conn->query($requette);

  if($resultat){
    
    header('location:liste.php?delete=ok');
  }

?>