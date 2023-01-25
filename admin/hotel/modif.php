<?php
   session_start();

   //1- récupération les données de la formulaire
   $id = $_POST['id'];

   $nom= $_POST['nom'];
   $adresse=$_POST['adresse'];

   $filename="";
   if(isset($_FILES['img'])){
       $img = $_FILES['img']['name'];
       $filename = uniqid().$img;
       move_uploaded_file($_FILES['img']['tmp_name'],'../../images/'.$filename);
         
       
   }
  

   //2- la chaine de connexion
   include "../../fonctions.php";
   $conn= connect();

   //3- la création de la requette 
   $requette= "UPDATE hotel SET nom='$nom', adresse='$adresse', img='$filename' WHERE id='$id' ";
   
   //4- exécution de la requette
   $resultat= $conn->query($requette);
   if($resultat){
    header('location:liste.php?modif=ok');
   }
?>