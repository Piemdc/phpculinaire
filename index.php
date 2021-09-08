
<?php
        REQUIRE ('controlleur.php');
 try {
               
        if(isset($_GET['id'])){
                
                Recette();
        }
        else if (isset($_GET["categ"])){
                Categorie();
        }

        else {
                Accueil();
        } 
          
}

        catch(Exception $e){
                $msgError = $e->getMessage();
                INCLUDE ('vueerreur.php');
              }
?>
