<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- META -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Instadog - Racontez l'histoire de votre chien">
    <!-- CHARGEMENT PAR CDN de Bootstrap 4.2.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">                     
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- CSS PERSONNALISÉS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" type="image/ico" href="images/favicon.ico"/>
    <title>
      <?php 
        if(isset($title) && !empty($title)) { 
          echo $title; 
        } 
        else { 
          echo "Bienvenue sur Instadog"; 
        } 
      ?>
    </title>
</head>
<body>


<header class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="thrive-association.ch/en/">Thrive</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="thrive-association.ch/en/">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Races</a>
    <?php $listRaces = $appli->getAllRaces(); 
    echo var_dump($listRaces); ?>
    <div class="dropdown-menu">
      <?php foreach($listRaces as $race){
        echo"<a class='dropdown-item' href='index.php?race=$race->id'>$race->nameRace</a>";  
      }
      ?>
 
    </div>
  </li>
      <li class="nav-item">
        <a class="nav-link" href="articles.php">Articles</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="index.php" method="get" enctype="multipart/form-data">
      <input class="form-control mr-sm-2" type="search" name ="keywords" placeholder="Rechercher par race, nom ou ville" aria-label="Search">
      <!-- <button type="submit"><i class="btn btn-outline-success my-2 my-sm-0 fa fa-search"></i></button> -->
      <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button> -->
    </form>
    <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['email']) && isset($_SESSION['pwd'])){
          echo '<li class="nav-item mr-1">';
            echo '<a class="nav-link btn bg-primary" href="ajouter-un-chien.php">Ajouter un chien</a>';
          echo '</li>';
          echo '<li class="nav-item dropdown">';
            echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mon compte</a>';
            echo '<div class="dropdown-menu menu-deroulant" aria-labelledby="navbarDropdown">';
            echo '<a class="dropdown-item" href="profil.php">Ton profil</a>
            <a class="dropdown-item" href="#">Tes chiens</a>
            <a class="dropdown-item" href="#">Tes articles</a>
            <div class="dropdown-divider"></div>';
            // MET LE BOUTON DECONNEXION
            echo '<form class="form-inline my-2 my-lg-0" action="deconnexion.php" method="post" enctype="multipart/form-data">';
              echo '<button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Déconnexion</button>';
            echo '</form>';
            echo '</div>';
          echo '</li>';
        }else{
          // MET LES BOUTONS SE CONNECTER ET SINSCRIRE
          echo '<li class="nav-item mr-1">';
            echo '<a class="nav-link btn bg-success" href="connexion.php">Se connecter</a>';
          echo '</li>';
          echo '<li class="nav-item">';
            echo '<a class="nav-link btn btn-outline-success" href="inscription.php">Sinscrire</a>';
          echo '</li>';
    
          }
        ?>
      
    </ul>
  </div>
</nav>
</header>