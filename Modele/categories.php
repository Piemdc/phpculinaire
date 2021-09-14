<?php
REQUIRE_ONCE('../modele.php');

class Categories extends Connexion
{
    public function getCategorie($categ){
      $sql = 'SELECT *, COUNT(com_id) FROM t_recette LEFT JOIN t_commentaire ON t_recette.rec_id = t_commentaire.id_rec  WHERE rec_categorie = ? GROUP BY rec_id DESC';
      $res = $this->executerRequete($sql,array($categ));
      return $res;
        
    }
}