<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- META -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Instadog - Racontez l'histoire de votre chien">
    <meta http-equiv="Content-Type" content="text/html; charset= UTF-8" /> 
    <!-- CHARGEMENT PAR CDN de Bootstrap 4.2.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">                     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <!-- CSS PERSONNALISÉS -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" type="image/ico" href="images/favicon.ico"/>
    <title>
 
 
    </title>
</head>
<body>
<?php

require("config.php");
 
session_start();
 
$appli = new Connexion();

$prof = $appli->getAllUserByAct();

var_dump($prof);

echo '<br>';
echo '<br>';
echo '<br>';

$prof = $appli->getAllUserByActivite ("admin");


var_dump($prof);

$keywords = "";
  
if (isset($_GET["keywords"])){
    $keywords = $_GET["keywords"];

    
    


} else {
 

$prof = $appli->getAllProfileUser();

}


 
?>


<div class="jamb ">
    <div >
        <a href="http://thrive-association.ch/">
        <img class="logo" src="images/Thrive.png" alt="Photo de profie"> 
        </a>   
    </div>

    
    <a href="http://thrive-association.ch/" class="hov" style="text-decoration: none;color: green;  ">
    <h2 class="display-3 hh">THRIVE</h2> 
    </a>  
    <div class="lange">
        <img class="fr" src="images/Fr.png" alt="Photo de profie"> 
        <img class="fr" src="images/Eng.png" alt="Photo de profie">       
    </div>
    
</div>
<h3>Towards Holistic Refugee Integration through Valuable Engagement</h3>
 

<hr class="my-6">

<!------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------>

 
<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #108245;">
    <a href="accuCV.php">
    <div class="navbar-brand" style="color:white;">THRIVE</div> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>

  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
           <li class="nav-item active">
               <a class="nav-link" href="#" style="color:#108245;">Link<span class="sr-only">(current)</span></a></a>
           </li>

           <li class="nav-item dropdown" style="background-color:white;">

    <div class="dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Secteur D'activite</a>
        <?php $act = $appli->getAllActiviteFr(); ?>
            <div class="dropdown-menu">
            <?php foreach  ($act as $active){
            echo"<a class='dropdown-item' href='accuCV.php?act=$active->id'>$active->actFr</a>";  
        }?>
            </div>
    </div>
          </li>

      <li class="nav-item">
        <a class="nav-link" href="#" style="color:#108245;">Link</a>
      </li>


      <li class="nav-item dropdown" style=" background-color:white;">
                    
      <div class="dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Choisir un Permis</a>
         
        <div class="dropdown-menu">
         
         <a class='dropdown-item' href='accuCV.php?permi=N'>N</a>
         <a class='dropdown-item' href='accuCV.php?permi=F'>F</a>
         <a class='dropdown-item' href='accuCV.php?permi=B'>B</a>
         
        </div>
    </div>
    </li>
 
    <li class="nav-item">
        <a class="nav-link" href="#" style="color:#108245;">Link</a>
      </li>
    

    <li class="nav-item dropdown" style="width:170px; background-color:white;  ">
                    
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Choisir Le Canton</a>    
                <div class="dropdown-menu">
                       
                       <a class='dropdown-item' href='accuCV.php?canton=Genève'>Genève</a>
                       <a class='dropdown-item' href='accuCV.php?canton=Vaud'>Vaud</a>         
                      </div>
                  </div>
                  </li>
     
    </ul>
 

    <form class="form-inline my-2 my-lg-0" action="accuCV.php" method="get" enctype="multipart/form-data">
      <input class="form-control mr-sm-2" type="search" name ="keywords" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" style="color:white;" type="submit">Rechercher</button>
    </form>
  </div>
</nav>
 
<!---------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------->
 


<?php if (isset($_GET["act"])){
       $act = $_GET["act"];
       $prof = $appli->getProfileByActivite($act);
      
      } 
      
      if (isset($_GET["permi"])){
        $permi = $_GET["permi"];
        $prof = $appli->getProfileByPermiTra($permi);
         
      } 

      if (isset($_GET["canton"])){
        $canton = $_GET["canton"];
        $prof = $appli->getProfileByCanton($canton);
         
      } 
      ?>

 
 
<div class="row">
 


<?php foreach ($prof as $profil){ ?>


 
    <div class="card col-lg-3 col-md-6" style="margin:auto;">
            
            <?php  $vid =  $profil->getVedioT();
            if (is_null($vid)) { 
                echo $vid;
            echo '<div class="embed-responsive embed-responsive-16by9">';
            echo '<video controls><source src="vedio/'; echo $profil->getVedioT();  echo 'type="video/mp4"></video>';
            echo '</div>';  }
             else {
                 ?>
                <img class="card-img-top" src="images/<?php echo $profil->getPhoto()?>" >
            <?php  } ?> 

            <div class="card-body" style="height:175px;">
            <?php
            echo '<h5 class="card-title">' . $profil->getFirstName() . str_repeat('&nbsp;', 12) . "Permi : " . $profil->getPermiTra() . '</h5>';
         
            $idAct   = $profil->getIdAct();
            $userAct = $appli->getActiviteById($idAct);
            echo '<p class="card-text">' . $userAct->actFr .'</p>'; ?>
            <a href="profil.php?id=<?php echo $profil->getIdUser() ?>" class="btn btn-success">En Savoir Plus</a> 
                  

        </div>
    </div> <?php }  ?>
 
</div>
<!--
<div class="row style=padding-top:40px;">
    <div class="card col-lg-3 col-md-6 style= margin:auto; padding:0;">
            <div class="embed-responsive embed-responsive-16by9">
            <video controls><source src="vedio/Medina.mp4" type="video/mp4"></video> 
            </div>
        <div class="card-body">
            <h5 class="card-title">Medina</h5>
            <p class="card-text">Medina recherche un emploi en tant que Office Manager.</p>
            <a href="#" class="btn btn-success">En Savoir Plus</a>
        </div>
    </div>

    <div class="card col-lg-3 col-md-6 style= margin:auto; padding:0;">
            <div class="embed-responsive embed-responsive-16by9">
            <video controls><source src="vedio/Karima.mp4" type="video/mp4"></video>
            </div>
        <div class="card-body">
            <h5 class="card-title">Karima</h5>
            <p class="card-text">Karima recherche un emploi en tant que Assistante de Directi.</p>
            <a href="#" class="btn btn-success">En Savoir Plus</a>
        </div>
    </div>

    <div class="card col-lg-3 col-md-6"  >
            <div class="embed-responsive embed-responsive-16by9">
            <video controls><source src="vedio/Jeremy.mp4" type="video/mp4"></video> 
            </div>
        <div class="card-body">
            <h5 class="card-title">Jérémy</h5>
            <p class="card-text">Jérémy recherche un emploi en tant que Office Manager Assist.</p>
            <a href="#" class="btn btn-success">En Savoir Plus</a>
        </div>
    </div>

    <div class="card col-lg-3 col-md-6"  >
            <div class="embed-responsive embed-responsive-16by9">
            <video controls><source src="vedio/Doris.mp4" type="video/mp4"></video> 
            </div>
        <div class="card-body">
            <h5 class="card-title">Doris</h5>
            <p class="card-text">Doris recherche un emploi en tant que Assistante de directio-1.</p>
            <a href="#" class="btn btn-success">En Savoir Plus</a>
        </div>
    </div>

    <div class="card col-lg-3 col-md-6"  >
            <div class="embed-responsive embed-responsive-16by9">
            <video controls><source src="vedio/Doris.mp4" type="video/mp4"></video> 
            </div>
        <div class="card-body">
            <h5 class="card-title">Doris</h5>
            <p class="card-text">Doris recherche un emploi en tant que Assistante de directio-1.</p>
            <a href="#" class="btn btn-success">En Savoir Plus</a>
        </div>
    </div>
    
    <div class="card col-lg-3 col-md-6">
            <div class="embed-responsive embed-responsive-16by9">
            <video controls><source src="vedio/Karima.mp4" type="video/mp4"></video> 
            </div>
        <div class="card-body">
            <h5 class="card-title">Karima</h5>
            <p class="card-text">Karima recherche un emploi en tant que Assistante de Directi.</p>
            <a href="#" class="btn btn-success">En Savoir Plus</a>
        </div>
    </div>

    <div class="card col-lg-3 col-md-6"  >
            <div class="embed-responsive embed-responsive-16by9">
            <video controls><source src="vedio/Medina.mp4" type="video/mp4"></video> 
            </div>
        <div class="card-body">
            <h5 class="card-title">Medina</h5>
            <p class="card-text">Medina recherche un emploi en tant que Office Manager - FYTE.</p>
            <a href="#" class="btn btn-success">En Savoir Plus</a>
        </div>
    </div>

    <div class="card col-lg-3 col-md-6"  >
            <div class="embed-responsive embed-responsive-16by9">
            <video controls><source src="vedio/Jeremy.mp4" type="video/mp4"></video> 
            </div>
        <div class="card-body">
            <h5 class="card-title">Jérémy</h5>
            <p class="card-text">Jérémy recherche un emploi en tant que Office Manager Assist.</p>
            <a href="#" class="btn btn-success">En Savoir Plus</a>
        </div>
    </div>
             
</div> -->

<?php 
/*
// SE CONNECTER A LA BASE DE DONNEES
require("classes/Connexion.php");
// ON DEMARRE LA SESSION AVANT D'ECRIRE DU CODE HTML
session_start();
// DEMARRER UN NOUVEL OBJET DE CONNEXION
$appli = new Connexion();
// TITRE DE LA PAGE
$title = "Bienvenue sur Instadog";
// INCLURE LE HEADER
include "header.php";
// INITIALISER LA VARIABLE POUR LA RECHERCHE
$keywords = "";
// SI LE PARAMÈTRE PASSÉ PAR L'URL A ÉTÉ RÉCUPÉRÉ  
if (isset($_GET["keywords"])){
    $keywords = $_GET["keywords"];
}
// APPEL DE LA FONCTION DE RECHERCHE DE L'OBJET CONNEXION
$listDogs = $appli->getDogsByKeywords($keywords);
if (isset($_GET["race"])){
    $race = $_GET["race"];
    $listDogs = $appli->getDogsByRace($race);
} */
?>
  


<!-- CONTAINER DU BODY 
<div class="container-fluid bg-white text-dark">
    <div class="row">
        <div class="col">
             
        </div>
    </div>

    <div class="row">

    <div class="card col-lg-3 col-md-4" style="width: 17rem; margin:auto; padding:0;">
                <a href='profil-du-chien.php?id=" . $dog->getId() . "'>
                    <img class="card-img-top" src="images/dog/'.$dog->getPicture().'" alt="Photo de profil de ' . $dog->getNickname() . '">
                    <div class="card-img-overlay">';
                    <h4 class="card-title dogyy"></h4>
                 </div>
                </a>
            </div>-->

        <?php /*
        foreach ($listDogs as $dog) {
            // IMAGE DU CHIEN ET SON NICKNAME
            echo '<div class="card col-lg-3 col-md-4" style="width: 17rem; margin:auto; padding:0;">';
                echo "<a href='profil-du-chien.php?id=" . $dog->getId() . "'>";
                    echo '<img class="card-img-top" src="images/dog/'.$dog->getPicture().'" alt="Photo de profil de ' . $dog->getNickname() . '">';
                    echo '<div class="card-img-overlay">';
                        echo '<h4 class="card-title dogyy">' . $dog->getNickname() . '</h4>';
                    echo '</div>';
                echo'</a>';
            echo'</div>';
        }
      */  ?>
     

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 
 </body>

</html>