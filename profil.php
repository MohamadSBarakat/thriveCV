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

//echo var_dump($appli);

$idUser = $_GET['id'];

$prof = $appli->getProfileUserById($idUser);

//echo var_dump($prof);

//echo "<br> . <br>";

//echo $prof->VedioT;

?>


<div class="jamb ">
    <div >
        <a href="accuCV.php">
        <img class="logo" src="images/Thrive.png" alt="Photo de profie"> 
        </a>   
    </div>

    
    <a href="accuCVphp" class="hov" style="text-decoration: none;color: green;  ">
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

<div class="row">

<div class="col-sm-6" style= "margin:auto; padding:20px;" >
    <div class="card">
            <div class="embed-responsive embed-responsive-16by9">
            <video controls><source src="vedio/<?php echo $prof->getVedioT();?>" type="video/mp4"></video> 
            </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $prof->getFirstName();?></h5>
           <?php $idAct   = $prof->getIdAct();
            $userAct = $appli->getActiviteById($idAct);?>
            <p class="card-text"><?php echo $userAct->actFr; ?></p>
             
        </div>
    </div>
</div>


    <div class="col-sm-6" style= " padding:20px;">
    <div class="card">
      <div class="card-body" style= "  ">
      
        <h4 class="card-title" style= "color: green">Mes Compétences</h4>
        
        <p class="card-text">Organisation de RDV, réunions, séminaires.</p>
        <p class="card-text">Gestion des agendas.</p>
        <p class="card-text">Traitement des dossiers, classement, archivage.</p>
        <p class="card-text">Très bonne maitrise des outils informatiques.</p> 
        <p class="card-text">Office management : gestion et suivi des contrats des différents prestataires.</p>      
        <div>
        <a href="pdf/cv1.pdf">
        <img class="logo" style="margin-left: 150px; "  src="images/CV.png" alt="Photo de profie"><br><br><br> 
        <div>
        <a href="pdf/cv1.pdf" class="btn btn-success">Telecharche le CV PDF</a> 
        </div>
        </a> 
        </div>
      </div>
    </div>
  </div>


</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 
 </body>

</html>