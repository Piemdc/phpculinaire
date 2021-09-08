<?php       

            function getBdd(){

              $servername = 'localhost';
              $username = 'root';
              $password = '';
                      
              $conn = new PDO("mysql:host=$servername;dbname=blog_culinaire", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              return $conn;
            };

            function getRecettes(){
                $conn = getBdd();
                $reponse = $conn->prepare('SELECT *, COUNT(com_id) FROM t_recette LEFT JOIN t_commentaire ON t_recette.rec_id = t_commentaire.id_rec GROUP BY rec_id DESC LIMIT 5');
                $reponse -> execute();
                $conn = NULL;
                $res = $reponse->fetchAll();

                return $res;

            };

            function getSingleRecette($id){
          
              $conn = getBdd();
              $reponse = $conn->prepare('SELECT * FROM t_recette LEFT JOIN t_commentaire ON t_recette.rec_id = t_commentaire.id_rec WHERE t_recette.rec_id = :idset');
              $reponse->bindParam(':idset', $id, PDO::PARAM_STR);
              $reponse -> execute();
             
              if($reponse -> rowCount()>=1 ){
                $res = $reponse->fetchAll();
                $conn = NULL;
                return $res;
              }

              else {
                throw new Exception('Recette non trouvée, identifiant non valide');
              }

                
            };
            
            function getCategorie($categ){
          
              $conn = getBdd();
              $reponse = $conn->prepare('SELECT *, COUNT(com_id) FROM t_recette LEFT JOIN t_commentaire ON t_recette.rec_id = t_commentaire.id_rec  WHERE rec_categorie = :categ GROUP BY rec_id DESC');
              $reponse->bindParam(':categ', $categ, PDO::PARAM_STR);
              $reponse -> execute();
             
              if($reponse -> rowCount()>=1 ){
                $res = $reponse->fetchAll();
                $conn = NULL;
                return $res;
              }

              else {
                throw new Exception('Recette non trouvée, categorie non valide');
              }

                
            };
            

