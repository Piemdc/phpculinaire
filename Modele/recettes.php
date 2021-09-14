<?php
REQUIRE ('modele.php');

class Recette extends Connexion
{
    public function getRecettes()
    {
        $sql = 'SELECT *, COUNT(com_id) FROM t_recette LEFT JOIN t_commentaire ON t_recette.rec_id = t_commentaire.id_rec GROUP BY rec_id DESC LIMIT 5';
        $res = $this->executerRequete($sql);
        return $res;

    }

    public function getSingleRecette($id)
    {
  
        $sql = 'SELECT * FROM t_recette LEFT JOIN t_commentaire ON t_recette.rec_id = t_commentaire.id_rec WHERE t_recette.rec_id = ?';
        $res = $this->executerRequete($sql,array($id));
        return $res;
    }
    
    public function getCategorie($categ){
      $sql = 'SELECT *, COUNT(com_id) FROM t_recette LEFT JOIN t_commentaire ON t_recette.rec_id = t_commentaire.id_rec  WHERE rec_categorie = ? GROUP BY rec_id DESC';
      $res = $this->executerRequete($sql,array($categ));
      return $res;
        
    }
}