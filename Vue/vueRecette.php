
<?php 
ob_start();   

    ?>
<?php $preparations = $res[0]['rec_preparation'];
      $preparationTab = explode("ETAPE ",$preparations);
      $ingredients = $res[0]['rec_ingredients'];
      $ingredientTab = explode(",", $ingredients);

// $keywords = preg_split()?>

<div class="container my-5 ">
    <div class="row bg-light shadow py-5 px-5 d-flex flex-column">
        <h2 class="text-center fs-1 text mb-5"><?php echo $res[0]['rec_nom']?> - <?php echo strtoupper($res[0]['rec_categorie'])?> </h2>

        <div class="d-flex justify-content-between mb-5 ">
            <p class="soustitresrec fs-3 text"><?php echo $res [0]['rec_temps']?> <i class="bi bi-alarm"></i></p>
            <p class="soustitresrec fs-3 text"><?php echo $res[0]['rec_difficulte']?> <i class="bi bi-award"></i></p>
            <p class="soustitresrec fs-3 text"><?php echo $res[0]['rec_budget']?> <i class="bi bi-hourglass-split"></i></p>
        </div>

        <div class="d-flex justify-content-around flex-wrap py-5">
            <img src="<?php echo $res[0]['rec_image']?>" alt="<?php echo $res[0]['rec_nom']?>" class="img-fluid w-50 mx-auto rounded shadow mb-5 imgrecette">
            <p class="col-12"><?php echo $res[0]['rec_resume'] ?></p>
        </div>

<img src="styles/36211.svg" alt="separation florale" class="img-fluid separateur">

        <ul class="list-group">
        <li class="list-group-item"><h2>Ingredients :</h2></li>
            <?php foreach ($ingredientTab as $ingredients){ ?>

                <li class="list-group-item"><?php echo $ingredients?></li>
                
           <?php }; ?>
        </ul>
<img src="styles/36211.svg" alt="separation florale" class="img-fluid separateur">

        <ul class="list-group">
        <li class="list-group-item"><h2>Preparation :</h2></li>
            <?php foreach ($preparationTab as $preparations){ ?>

                <li class="list-group-item"><?php echo $preparations?></li>
                
           <?php }; ?>

        </ul>
        
<img src="styles/36211.svg" alt="separation florale" class="img-fluid separateur">


        <h2>Commentaires :</h2>
        <?php foreach ($res as $donnees)
        { ?>

            <div class="card">
            <div class="card-header">
                <?php echo $donnees['com_auteur'] ?>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                <p><?php echo $donnees['com_contenu'] ?></p>
                <footer class="blockquote-footer">Publié le <cite title="Source Title"><?= date("d.m.y") ?></cite></footer>
                </blockquote>
            </div>
            </div>
        <?php } ?>

    <div class="card mt-5">
        <div class="card-header">
                <h4>Ecrire un commentaire : <h4>
        </div>
        <div class="card-body">
            <form action="" method="post">
            <input class="form-control" type="text" name="pseudo" placeholder="Votre pseudo" >
            <input class="form-control mt-3" type="text" name="commentaire" placeholder="Votre commentaire" >
            <button type="button" class="btn btn-warning mt-3">Publier</button>
            </form>
        </div>
    </div>
    </div>
</div>


<?php
    $contenu=ob_get_clean();
    require('gabarit.php');
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>