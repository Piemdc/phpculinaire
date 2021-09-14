<?php 

REQUIRE('../gest_recettes/header.php');
REQUIRE('identifiants.php');
REQUIRE ('functions.php');
session_start();
$alert ="";
$count = 0;


if ($username == IDENTIFIANT && $password == MDP) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;

}
if (isset($_POST['deconnexion'])){ session_destroy();
  }

if (!isset($_POST['deconnexion']) && $_SESSION ) {

  INCLUDE ('recettes.php');
  
  $action ="";
  isset($_GET['id'])? $idset = $_GET['id'] : NULL ; //
  isset($_GET['action'])? $action = $_GET['action'] : NULL ;
  isset($_POST['nom'])? $nomset = $_POST['nom'] : NULL ; //
  isset($_POST['resume'])? $resumeset = $_POST['resume'] : NULL ;//
  isset($_POST['temps'])? $tempsset = $_POST['temps'] : NULL ; //
  isset($_POST['prix'])? $prixset = $_POST['prix'] : NULL ;////
  isset($_POST['difficulte'])? $difset = $_POST['difficulte'] : NULL ;//
  isset($_POST['ingredients'])? $ingset = $_POST['ingredients'] : NULL ;//
  isset($_POST['image'])? $imgset = $_POST['image'] : NULL ;//
  isset($_POST['preparation'])? $prepaset = $_POST['preparation'] : NULL ;//
  isset($_POST['type'])? $typeset = $_POST['type'] : NULL ;//


  switch ($action) {
    case 'del':
      echo delete($idset);

      break;
    
    case 'edit':
        echo update($idset,$nomset,$resumeset,$tempsset,$difset,$prixset,$ingset,$imgset,$prepaset,$typeset);

        break;

    case 'add':
          echo insert($nomset,$resumeset,$tempsset,$difset,$prixset,$ingset,$imgset,$prepaset,$typeset);
          break;
    default:
      # code...
      break;
  }

} else {
  $alert = "identifiants invalides";
 ?>



<form class="mb-3 py-5 my-5 px-5 bg-white w-75 mx-auto shadow rounded" method="post" action="index.php">
  <div class="mb-3">
    <label for="identifiant" class="form-label">Identifiant</label>
    <input name ="username" type="text" class="form-control" id="identifiant">
    <?= $count > 1 ? $alert : null ?>

  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Mot de passe</label>
    <input name ="password" type="password" class="form-control" id="password">
  </div>

  <button type="submit" class="btn btn-warning">Se connecter</button>
</form>


<?php } 


REQUIRE('../Footer.php') ?>


