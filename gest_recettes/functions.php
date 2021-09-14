<?php
// DELETE / UPDATE / INSERT / ADD PRODUITS / DEL PRODUITS

function update($idset,$nomset,$resumeset,$tempsset,$difset,$prixset,$ingset,$imgset,$prepaset,$typeset){
    
    REQUIRE ('connexion.php');

    $returned = "<div class='update'>
    RECETTE MODIFIEE !
    </div>";

 
    $reponse = $conn->prepare('UPDATE t_recette SET 
    rec_nom = :nomset ,
    rec_resume = :resumeset ,
    rec_temps = :tempsset ,
    rec_budget = :prixset ,
    rec_ingredients = :ingset ,
    rec_image = :imgset ,
    rec_difficulte = :difset ,
    rec_preparation = :prepaset,
    rec_categorie = :typeset
     WHERE rec_id = :idset');
    // var_dump($reponse);

    $reponse->bindParam(':nomset', $nomset, PDO::PARAM_STR);
    $reponse->bindParam(':resumeset', $resumeset, PDO::PARAM_STR);
    $reponse->bindParam(':tempsset', $tempsset, PDO::PARAM_INT);
    $reponse->bindParam(':prixset', $prixset, PDO::PARAM_INT);
    $reponse->bindParam(':ingset', $ingset, PDO::PARAM_STR);
    $reponse->bindParam(':imgset', $imgset, PDO::PARAM_STR);
    $reponse->bindParam(':difset', $difset, PDO::PARAM_STR);
    $reponse->bindParam(':prepaset', $prepaset, PDO::PARAM_STR);
    $reponse->bindParam(':typeset', $typeset, PDO::PARAM_STR);
    $reponse->bindParam(':idset', $idset, PDO::PARAM_INT);
    $reponse -> execute();


    return $returned;
};


function delete($idset){
    
    REQUIRE ('connexion.php');
    $returned = "<div>
    Recette SUPPRIMEE !
    </div>";
 
    $reponsedelIng = $conn->prepare('DELETE FROM t_recette WHERE rec_id= :idset ');

    $reponsedelIng->bindParam(':idset', $idset, PDO::PARAM_INT);
    $reponsedelIng -> execute();

    return $returned;
};

function insert($nomset,$resumeset,$tempsset,$difset,$prixset,$ingset,$imgset,$prepaset,$typeset){
    
    REQUIRE ('connexion.php');
    
    $returned = "<div class='update'>
    Recette crée !
    </div>
    <a href='base.php'><li class='retour ingredient'>Retour</li></a>" ;

 
    $reponse = $conn->prepare('INSERT IGNORE INTO t_recette (rec_nom , rec_resume , rec_temps , rec_difficulte , rec_budget , rec_ingredients , rec_image , rec_preparation , rec_categorie) VALUES
    (:nomset , :resumeset , :tempsset , :difset , :prixset , :ingset , :imgset , :prepaset , :typeset)');

    $reponse->bindParam(':nomset', $nomset, PDO::PARAM_STR);
    $reponse->bindParam(':resumeset', $resumeset, PDO::PARAM_STR);
    $reponse->bindParam(':tempsset', $tempsset, PDO::PARAM_INT);
    $reponse->bindParam(':prixset', $prixset, PDO::PARAM_INT);
    $reponse->bindParam(':ingset', $ingset, PDO::PARAM_STR);
    $reponse->bindParam(':imgset', $imgset, PDO::PARAM_STR);
    $reponse->bindParam(':difset', $difset, PDO::PARAM_STR);
    $reponse->bindParam(':prepaset', $prepaset, PDO::PARAM_STR);
    $reponse->bindParam(':typeset', $typeset, PDO::PARAM_STR);
    $reponse -> execute();
};

