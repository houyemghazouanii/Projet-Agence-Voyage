<?php


    include"fonctions.php";

    $RegisterAlert=0;
    

    if(!empty($_POST)){
        if(AjouterClient($_POST)){
            $RegisterAlert=1;

        }
    }
    


?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Registre</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.33/sweetalert2.min.css">
</script>
<meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

  <body >
  <form method="post" action="inscription.php">
      <h1>Inscription</h1>
      <p>
        Existe déjà un compte? <a href="connexion.php">connexion</a>
      </p>
     
<table class="tt">
    
    <thead>
        <tr>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td> <p> Nom </p> </td>
            <td> <input type="text" name="nom" placeholder="Entrer votre nom" /></td>
           
        </tr>
        <tr>
            <td> <p> Prénom </p></td>
            <td> <input type="text" name="prenom" placeholder="Entrer votre prénom" /></td>
           
        </tr>
        <tr>
            <td> <p> Email </p></td>
            <td><input type="email" name="email" placeholder="Entrer votre email" /></td>
           
        </tr>
        <tr>
            <td> <p> Mot de passe </p></td>
            <td> <input type="password" name="mdp" placeholder="Entrer votre Mot de passe" />
                </td>
           
        </tr>
        <tr>
            <td> <p> Téléphone </p></td>
            <td><input type="text" name="tel" placeholder="Entrer votre Téléphone" /></td>
           
        </tr>
        <tr></tr>
        <tr >
            <td></td>
            <td>
                    <input type="submit" name="singup" value="Inscription"> 
                
         </td>
        </tr>
    </tbody>
   
</table>
     </form>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.33/sweetalert2.all.min.js"> </script>
<?php
if($RegisterAlert == 1){
   print "<script> 
   Swal.fire({
     title: 'Success',
     text: 'creation de compte avec succés',
     icon: 'success',
     confirmButtonText:'ok',
     timer : 4000
   }) 
   </script>" ;}
   ?>
</html>