<?php
session_start();
include "../../fonctions.php";
$hotel =AfficherHotel();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Admin : Profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">VoyaGeo</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../../deconnexion.php">Déconnexion</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="../home.php">
                  <span data-feather="home"></span>
                  Accueil <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Vols/liste.php">
                  <span data-feather="file"></span>
                 Vols
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="shopping-cart"></span>
                  Hôtels
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../client/liste.php">
                  <span data-feather="users"></span>
                  Utilisateurs
                </a>
              </li>
              
             
              <li class="nav-item">
                <a class="nav-link " href="../profile.php">
                  <span data-feather="layers"></span>
                  Profile
                </a>
              </li>
            </ul>

          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Liste des Hotels</h1>
            
            <div>
               <a class="btn btn-primary" name="ajout" data-toggle="modal" data-target="#exampleModal">Ajouter</a>
            </div>
          </div>
          <!-- liste start-->
          <div>
          
            <?php
            if(isset($_GET['ajout']) && $_GET['ajout']== "ok"){
                print'<div class="alert alert-success">
                Hotel ajouter avec succées
                </div>';
            }
            ?>

            <?php
              if(isset($_GET['modif']) && $_GET['modif']== "ok"){
                print'<div class="alert alert-success">
                Hotel modifier avec succées
                </div>';
              }
            ?>
             <?php
               if(isset($_GET['delete']) && $_GET['delete']== "ok"){
                print'<div class="alert alert-success">
                Hotel supprimer avec succées
                </div>';
            }
            ?>
            
            
           
              
          
          <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Adresse</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php 
    
    foreach($hotel as $i => $p){
        $i++;
     print'<tr>
     <th scope="row">'.$i.'</th>
     <td>'.$p['nom'].'</td>
     <td>'.$p['adresse'].'</td>
    
    
     
     <td> <a data-toggle="modal" data-target="#editModal'.$p['id'].'" class="btn btn-success">Modifier</a>
     <a onclick="return popUpDeleteCategorie()" href="supprimer.php?id='.$p['id'].'" class="btn btn-danger">Supprimer</a>
     </td>
   </tr>';

    }
    ?>
  </tbody>
</table>
 </div>
          
        </main>
      </div>
    </div>
  

<!-- Modal Ajout -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout hotel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="ajout.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="nom" required class="form-control" placeholder="Nom...">
            </div>
            <div class="form-group">
                <input type="text" name="adresse" required class="form-control" placeholder="Adresse...">
            </div>
            <div class="form-group">
                <input type="file" name="img" required class="form-control">
            </div>
          
          
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ajouter</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </form>
    </div>
  </div>
</div>


<?php 
foreach($hotel as $index=>$v){    //index c-a-d nb de catégorie
 ?>
<!-- Modal Modification -->
<div class="modal fade" id="editModal<?php echo $v['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier vol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="modif.php" method="POST">
          <input type="hidden" value="<?php echo $v['id']; ?>" name="id" />
          <div class="form-group">
                <input type="text" name="nom" value="<?php echo $v['nom'] ;?>"  class="form-control">
          </div>
          <div class="form-group">
                <input type="text" name="adresse" value="<?php echo $v['adresse'] ;?>" class="form-control">
            </div>
            <div class="form-group">
                <input type="file" name="img"  value="<?php echo $v['img'] ;?>" class="form-control">
            </div>
           
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Modifier</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </form>
    </div>
  </div>
</div>

<?php
}
?>
        
    



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../js/vendor/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
    <script>
      function popUpDeleteCategorie(){
        return confirm("Voulez-vous vraiment supprimer cette vol?");
      }
    </script>


  </body>
</html>
