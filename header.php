<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8" />
    <title>Le bon Flemmard</title>
    <link rel="stylesheet" href="styles/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    
</head>

<body>

<div class="headimg"><a href="index.php" class="logohead">
  <img src="styles/french-flemmard.svg" alt="logo french flemmard" ></a>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container-fluid d-flex justify-content-center">
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample05">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-bs-toggle="dropdown" aria-expanded="false">Recettes</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown05">
              <li><a class="dropdown-item" href="index.php?categ=entrée">Entrées</a></li>
              <li><a class="dropdown-item" href="index.php?categ=plat principal">Plats</a></li>
              <li><a class="dropdown-item" href="index.php?categ=dessert">Desserts</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" >Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>