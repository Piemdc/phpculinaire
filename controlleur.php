<?php
REQUIRE ('modele.php');

function Accueil(){
    $res = getRecettes();
    INCLUDE ('vueAccueil.php');
};

function Recette(){
    $id = $_GET['id'];
    $res = getSingleRecette($id);
    INCLUDE ('recette.php');
};

function Categorie(){
    $categ = $_GET['categ'];
    $res = getCategorie($categ);
    INCLUDE ('categorie.php');

};


?>