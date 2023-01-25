
 <?php
    session_start();

   $nom= $_POST['nom'];
   $adresse=$_POST['adresse'];
   


  //upload image

  $filename="";
if(isset($_FILES['img'])){
    $img = $_FILES['img']['name'];
    $filename = uniqid().$img;
    move_uploaded_file($_FILES['img']['tmp_name'],'../../images/'.$filename);
      
    
}


  //2- la chaine de connexion
  include "../../fonctions.php";
  $conn= connect();


  try{

    //3- la création de la requette 
    $requette= "INSERT INTO hotel(nom,adresse,img) VALUES('$nom','$adresse','$filename')";
    
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