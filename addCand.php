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

require("config.php");      // SE CONNECTER A LA BASE DE DONNEES

session_start();            // ON DEMARRE LA SESSION AVANT D'ECRIRE DU CODE HTML
// SECURISER LA PAGE
//if (!isset($_SESSION['email']) && !isset($_SESSION['pwd'])){
 //   echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
//}
// DEMARRER UN NOUVEL OBJET DE CONNEXION
$appli = new Connexion();
// TITRE DE LA PAGE
//$title = "Ajouter Un Chien";
// INCLURE LE HEADER
//include "header.php";
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




<div class="container">
     <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Ajouter Un Talent</h5>
                    <form class="form-signin" action="" method="POST" enctype="multipart/form-data" >
                        <?php // include "action/ajouter-un-chien-form.php";?>    
                        <div class="form-label-group">
                            <label for="inputPrenom">Nom du Talent</label>
                            <input type="text" id="inputPrenom" name ="nickname" class="form-control" placeholder="Nom du chien" required autofocus> 
                        </div>

                        <div class="form-label-group">
                            <label for="inputPrenom">Nom du Talent</label>
                            <input type="text" id="inputPrenom" name ="nickname" class="form-control" placeholder="Nom du chien" required autofocus> 
                        </div>

                        <div class="form-label-group">
                            <label for="inputNom"></label>
                            <input type="Date" id="inputNom" name ="birthday" class="form-control" placeholder="Date" required> 
                        </div>
                        <div class="form-label-group">
                            <label for="inputvedio">Téléverser la photo  </label>
                            <input type="file" id="inputPhoto" name ="picture" class="form-control" placeholder="Téléverser la photo de votre chien" required> 
                        </div>
                        <br><br>    
                        <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Race(s)</label>
                    </div>
                    <select class="custom-select" name ="race1" id="inputGroupSelect01">
                        <option selected>Choisir...</option>
                        <?php $races = $appli->getAllRaces();
                          foreach  ($races as $race) {
                          $dogRace = $race->nameRace;
                          echo "<option value = '$race->id'>$dogRace</option>";  
                          }  ?>
                    </select>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block text-uppercase btn-aj-ch" name="ajouterDog" type="submit">Enregistrer</button>
                </div> 
            </div>
        </div>      
    </div>
</div>


<?php 
include "footer.php"
?>