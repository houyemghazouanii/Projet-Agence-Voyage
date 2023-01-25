<?php

    include "../fonctions.php";
    $user = true;
    if(!empty($_POST)){
        $user= ConnecteAdmin($_POST);
        if( is_array($user) && count($user) >0) { //admin connectée
            session_start();
            $_SESSION['id']= $user['id'];
            $_SESSION ['pseudo'] = $user ['pseudo'];
            $_SESSION ['mdp'] = $user ['mdp'];

            header('location:profile.php'); // redirection vers la page profil

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ConnexionAdmin</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.33/sweetalert2.min.css">
</script>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <form method="post" action="connexionAdmin.php">
      <h1>connexion</h1>
      
     
<table class="tt">
    <thead>
        <tr>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td> <p> Pseudo </p></td>
            <td><input type="text" name="pseudo" placeholder="Entrer votre pseudo" /></td>
           
        </tr>
        <tr>
            <td> <p> Mot de passe </p></td>
            <td> <input type="password" name="mdp" placeholder="Entrer votre Mot de passe" />
                </td>
           
        </tr>
        <tr></tr>
        <tr>
        <td></td>
            <td>
                    <input type="submit" name="connexion" value="Connexion"> 
                
         </td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
       <tr><td></td></tr> 
       <tr><td></td></tr> 
       <tr><td></td></tr> 
       <tr><td></td></tr>
       <tr><td></td></tr> 
       <tr><td></td></tr> 
       <tr>
        <td></td>
        <td></td>
       </tr> 
    </tbody>
   
</table>
</form>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.33/sweetalert2.all.min.js"> </script>
<?php
if(!$user){
   print "<script> 
   Swal.fire({
     title: 'Erreur',
     text: 'Cordonnées invalide',
     icon: 'error',
     confirmButtonText:'ok',
     timer : 4000
   }) 
   </script>" ;}
   ?>
</html>