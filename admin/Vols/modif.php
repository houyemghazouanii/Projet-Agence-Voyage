<?php
   session_start();

   //1- récupération les données de la formulaire
   $id = $_POST['id'];
   $ville_depart= $_POST['ville_depart'];
   $ville_arrive=$_POST['ville_arrive'];
   $date_depart=$_POST['date_depart'];
   $date_arrive=$_POST['date_arrive'];
   $prix=$_POST['prix'];

   //2- la chaine de connexion
   include "../../fonctions.php";
   $conn= connect();

   //3- la création de la requette 
   $requette= "UPDATE vols SET ville_depart='$ville_depart', ville_arrive='$ville_arrive',
    date_depart='$date_depart', date_arrive='$date_arrive', prix='$prix'
     WHERE id='$id'";
   
   //4- exécution de la requette
   $resultat= $conn->query($requette);
   if($resultat){
    header('location:liste.php?modif=ok');
   }
?>