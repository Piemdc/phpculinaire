<div class="container-fluid bg-transparent">
    <div class="row bg-transparent d-flex flex-column">

<?php
                
        ob_start();        
        foreach ($res as $donnees)
        { ?>
        
    <div class="card mb-3 col-12 col-lg-7 my-5 mx-auto shadow">
        <div class="row g-0">
            <div class="col-md-4 vignette">
            <img src="<?php echo $donnees['rec_image'] ?>" class="img-fluid rounded-start " alt="<?php echo $donnees['rec_nom'] ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $donnees['rec_nom'] ?></h5>
                    <p class="card-text"><?php echo $donnees['rec_resume'] ?></p>
                    <p class="card-text"><small class="text-muted"> Il y a <?php echo $donnees['COUNT(com_id)'] ?> commentaires</small></p>
                    <a href="index.php?id=<?php echo $donnees['rec_id'] ?>" class="btn btn-warning">En savoir plus</a>
                </div>
            </div>
        </div>
    </div>

    <img src="styles/36211.svg" alt="separation florale" class="img-fluid separateur">

<?php }
$contenu=ob_get_clean();
require('gabarit.php');
?>
    </div>
</div>