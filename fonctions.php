<?php

function connect(){
//connexion vers la BD
$servername="localhost";
$DBuser ="root";
$DBpassword="";
$DBname="agence";

try {
   $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   //echo "Connected successfully";
 } catch(PDOException $e) {
   echo "Connection failed: " . $e->getMessage();
 }
 return $conn;
}

function AjouterClient($data){
    $conn =  connect();
    $mdphash= md5($data['mdp']);

      //creation de la requete
  $requette="INSERT INTO client(nom,prenom,tel,email,mdp) VALUES('".$data['nom']."','".$data['prenom']."','".$data['tel']."','".$data['email']."','".$mdphash."')";
  
  //exécution de la requete
  $resultat = $conn->query($requette);
  if ($resultat){
    return true;
     }else
     return false;
  
  
    }

    function ConnecteClient($data){
        //connexion vers la BD
        $conn =  connect();
        $email =$data['email'];
        $mdp =md5($data['mdp']);
   
        $requette = "SELECT * FROM client WHERE email='$email'  AND mdp='$mdp'";
        $resultat = $conn->query($requette);
        $user = $resultat->fetch();
        return $user;
     }
     
     function ConnecteAdmin($data){
      //connexion vers la BD
      $conn =  connect();
      $pseudo =$data['pseudo'];
      $mdp =$data['mdp'];
  
      $requette = "SELECT * FROM admins WHERE pseudo='$pseudo'  AND mdp='$mdp'";
      $resultat = $conn->query($requette);
      $user = $resultat->fetch();
      return $user;
  
   }
   function AfficherVol(){
    $conn =  connect();
  //creation de la requete
  $requete="SELECT * FROM vols ";
  
  //exécution de la requete
  $resultat = $conn->query($requete);
  
  //resultat de la requete
  $vol = $resultat->fetchAll();
   
  
  return $vol;
  
  }

  function AfficherHotel(){
    $conn =  connect();
  //creation de la requete
  $requete="SELECT * FROM hotel ";
  
  //exécution de la requete
  $resultat = $conn->query($requete);
  
  //resultat de la requete
  $hotels = $resultat->fetchAll();
   
  
  return $hotels;
  
  }

  function getHotel($id){
    //connexion vers la BD
    $conn =  connect();
   $id= $_GET['id'];
 //creation de la requete
$requete="SELECT * FROM hotel WHERE id=$id";

//exécution de la requete
$resultat = $conn->query($requete);

//resultat de la requete
$hotel= $resultat->fetch();
 

return $hotel;

}

function AfficherVisiteurs(){
  $conn = connect();

  $requette = "SELECT * FROM client";
    $resultat = $conn->query($requette);

    $users=$resultat->fetchAll();
    return $users;
 }


function getData(){
  $data = array();
  $conn = connect();
 
  
  //calculer le nombre des produits dans la base
  $requette = "SELECT COUNT(*) FROM hotel "; 
  $resultat = $conn->query($requette);
  $nbrHotels= $resultat->fetch();

//calculer le nombre des catégories dans la base
  $requette2 = "SELECT COUNT(*) FROM vols "; 
  $resultat2 = $conn->query($requette2);
  $nbrVols= $resultat2->fetch();



  

  $data["hotel"] = $nbrHotels[0];
  $data["vols"] = $nbrVols[0];
  
  return $data;

}
  ?>