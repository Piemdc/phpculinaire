<?php
REQUIRE ('../Modele/modele.php');

function Accueil(){
    $res = getRecettes();
    INCLUDE ('Vue/vueAccueil.php');
};

function Recette(){
    $id = $_GET['id'];
    $res = getSingleRecette($id);
    INCLUDE ('Vue/vueRecette.php');
};

function Categorie(){
    $categ = $_GET['categ'];
    $res = getCategorie($categ);
    INCLUDE ('Vue/categorie.php');

};

function erreur($msgErreur) {
    require 'Vue/vueErreur.php';
  }


?>