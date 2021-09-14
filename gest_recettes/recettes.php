<?php
    REQUIRE ('connexion.php'); 

?>

<div class="container-fluid py-5 d-flex flex-row justify-content-start">
    <div class="row d-flex flex-row bg-light col-2">

        <div class="d-flex flex-column flex-shrink-0 p-3   col-4" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4"><?= "Bienvenue !";?></span>
            </a>
                <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong><?= $_SESSION['username']?></strong>
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                    <li> <form action="index.php" method="POST"><input type="submit" name="deconnexion" class="dropdown-item" value="Se déconnecter"></input></form></li>
                </ul>
                </div>
        </div>
    </div>


        <div class="row col-8 flex-grow-1 p-0 ">
            <ul class="recettes bg-white list-group p-0 ">
                        
                <?php
               foreach ($res as $donnees)
                { ?>
                
                    <li class="list-group-item d-flex justify-content-between">
                        <h3><strong> <?php echo $donnees['rec_nom']; ?></strong> </h3>
                        <div class="buttons">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticEdit<?=$donnees['rec_id']?>"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$donnees['rec_id']?>"><i class="bi bi-x-lg"></i></button>
                        </div>
                    </li>
                    <!---MODAL DELETE --->
                    <div class="modal fade" id="staticBackdrop<?=$donnees['rec_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel<?=$donnees['rec_id']?>">Voulez vous vraiment supprimer '<?php echo $donnees['rec_nom']; ?>'</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    <a href="index.php?action=del&amp;id=<?=$donnees['rec_id']?>" class="delete">Supprimer</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---MODAL EDIT --->
                    <div class="modal fade" id="staticEdit<?=$donnees['rec_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticEdit<?=$donnees['rec_id']?>">Edition de <?php echo $donnees['rec_nom']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">
                                    <form action="index.php?action=edit&amp;id=<?=$donnees['rec_id']?>" method="POST">
                                        <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                                            <input class="form-control" type="text" aria-label="Nom recette" name="nom" value="<?=$donnees['rec_nom']?>">

                                        <label for="resume" class="col-sm-2 col-form-label">Résumé</label>
                                        <textarea class="form-control" id="resume<?=$donnees['rec_id']?>" name="resume" rows="3" ><?=$donnees['rec_resume']?></textarea>
                                            
                                        <label for="temps" class="col-sm-2 col-form-label">Temps</label>
                                            <input class="form-control" type="number" aria-label="temps recette" name="temps" value="<?=(int)$donnees['rec_temps']?>">
                                       
                                        <label for="difficulte" class="col-sm-2 col-form-label">Temps</label>
                                            <select class="form-select" multiple aria-label="difficulte" name="difficulte"  value="<?=$donnees['rec_difficulte']?>">
                                                <option value="Très Facile">Très Facile</option>
                                                <option value="Facile">Facile</option>
                                                <option value="Moyen">Moyen</option>
                                                <option value="Difficile">Difficile</option>
                                                <option value="Très Difficile">Très Difficile</option>
                                            </select>

                                            <label for="prix" class="col-sm-2 col-form-label">Prix</label>
                                        <select class="form-select" multiple aria-label="prix" name="prix" value="<?=$donnees['rec_difficulte']?>">
                                            <option value="Bon marché">Bon marché</option>
                                            <option value="Moyen">Moyen</option>
                                            <option value="Cher">Cher</option>
                                            <option value="Très Cher">Très Cher</option>
                                        </select>

                                        <label for="ingredients" class="col-sm-2 col-form-label">Ingredients</label>
                                            <textarea class="form-control" id="ingredients<?=$donnees['rec_id']?>" name="ingredients" rows="3" ><?=$donnees['rec_ingredients']?></textarea>

                                        <label for="image" class="col-sm-2 col-form-label">Lien de l'image</label>
                                            <input class="form-control" type="text" aria-label="lien image" name="image" value="<?=$donnees['rec_image']?>">

                                        <label for="preparation" class="col-sm-2 col-form-label">Preparation</label>
                                            <textarea class="form-control" id="preparation<?=$donnees['rec_id']?>" name="preparation" rows="3" ><?=$donnees['rec_preparation']?></textarea>

                                        <label for="type" class="col-sm-2 col-form-label">Type de recette</label>
                                        <select class="form-select" multiple aria-label="type" name="type" value="<?=$donnees['rec_categorie']?>">
                                            <option value="Entrée">Entrée</option>
                                            <option value="Plat">Plat</option>
                                            <option value="Dessert">Dessert</option>
                                        </select>
                                        <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Valider</button>
                                </div>
                                    </form>
                                </div>
                    
                            </div>
                        </div>
                    </div> <!-- fin EDIT-->

                    
                    

                <?php
                }
                ?>
                <li class='list-group-item'>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticAdd"><i class="bi bi-plus-circle-dotted"></i></button>
                </li>

                <div class="modal fade" id="staticAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticEditAdd">Ajout d'une recette</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">
                                    <form action="index.php?action=add" method="POST">
                                        <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                                            <input class="form-control" type="text" aria-label="Nom recette" name="nom" value="" required>

                                        <label for="resume" class="col-sm-2 col-form-label" required>Résumé</label>
                                        <textarea class="form-control" id="resume" name="resume" rows="3" ></textarea>
                                            
                                        <label for="temps" class="col-sm-2 col-form-label" >Temps</label>
                                            <input class="form-control" type="number" aria-label="temps recette" name="temps" value="" required>
                                       
                                        <label for="difficulte" class="col-sm-2 col-form-label">Temps</label>
                                            <select class="form-select" multiple aria-label="difficulte" name="difficulte" required>
                                                <option value="Très Facile">Très Facile</option>
                                                <option value="Facile">Facile</option>
                                                <option value="Moyen">Moyen</option>
                                                <option value="Difficile">Difficile</option>
                                                <option value="Très Difficile">Très Difficile</option>
                                            </select>

                                            <label for="prix" class="col-sm-2 col-form-label">Prix</label>
                                        <select class="form-select" multiple aria-label="prix" name="prix" required>
                                            <option value="Bon marché">Bon marché</option>
                                            <option value="Moyen">Moyen</option>
                                            <option value="Cher">Cher</option>
                                            <option value="Très Cher">Très Cher</option>
                                        </select>

                                        <label for="ingredients" class="col-sm-2 col-form-label">Ingredients</label>
                                            <textarea class="form-control" id="ingredients" name="ingredients" rows="3" required ></textarea>

                                        <label for="image" class="col-sm-2 col-form-label">Lien de l'image</label>
                                            <input class="form-control" type="text" aria-label="lien image" name="image" value="" required>

                                        <label for="preparation" class="col-sm-2 col-form-label">Preparation</label>
                                            <textarea class="form-control" id="preparation" name="preparation" rows="3" required></textarea>

                                        <label for="type" class="col-sm-2 col-form-label">Type de recette</label>
                                        <select class="form-select" multiple aria-label="type" name="type" value="" required>
                                            <option value="Entrée">Entrée</option>
                                            <option value="Plat">Plat</option>
                                            <option value="Dessert">Dessert</option>
                                        </select>
                                        <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal" required>Valider</button>
                                </div>
                                    </form>
                                </div>
                    
                            </div>
                        </div>
                    </div>

                    
                <?php 
                
                
                $reponse->closeCursor(); // Termine le traitement de la requête
                $conn = null;
                ?>

            </ul>
        </div>
  </div>

</div>