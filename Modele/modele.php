<?php       

Abstract class Connexion 
{

   // Objet PDO d'accès à la BD
   private $bdd;

   private function getBdd() {
    if ($this->bdd == null) {
      // Création de la connexion
      $this->bdd = new PDO('mysql:host=localhost;dbname=blog_culinaire;charset=utf8',
        'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    return $this->bdd;
  }

   // Exécute une requête SQL éventuellement paramétrée
   protected function executerRequete($sql, $params = null) {
     if ($params == null) {
       $resultat = $this->getBdd()->query($sql);    // exécution directe
     }
     else {
       $resultat = $this->getBdd()->prepare($sql);  // requête préparée
       $resultat->execute($params);
     }
     return $resultat;
   }

  
    
          
}
