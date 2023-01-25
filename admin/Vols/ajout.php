<?php
   session_start();

   //1- récupération les données de la formulaire

   $ville_depart= $_POST['ville_depart'];
   $ville_arrive=$_POST['ville_arrive'];
   $date_depart=$_POST['date_depart'];
   $date_arrive=$_POST['date_arrive'];
   $prix=$_POST['prix'];

   //2- la chaine de connexion
   include "../../fonctions.php";
   $conn= connect();
try{

   //3- la création de la requette 
   $requette= "INSERT INTO vols(ville_depart,ville_arrive,date_depart,date_arrive,prix) VALUES('$ville_depart','$ville_arrive','$date_depart','$date_arrive','$prix')";
   
   //4- exécution de la requette
   $resultat= $conn->query($requette);
   if($resultat){
    header('location:liste.php?ajout=ok');
   }
}catch (PDOException $e){
   if($e->getCode()==23000){
      header('location:liste.php?erreur=duplicate');
   }

}
?>