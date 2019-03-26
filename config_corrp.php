<?php

header('Content-Type: text/html; charset=utf-8');
/* ------------------------------------------------------------------------------------------------------*/
/* //////////////////////////////////////CLASSE DE CONNEXION/////////////////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/
class Connexion
{
    public $connexion;

    public function __construct()
    {
        // le chemin vers le serveur
        $PARAM_hote = 'localhost';

        // le port de connexion à la base de données
        $PARAM_port = '3306';
        // le nom de la base de données

        $PARAM_nom_bd = 'thriveDB';

        // Le nom d'utilisateur pour se connecter 
        $PARAM_utilisateur = 'adminThrive';

        // le mot de passe de l'utilisateur pour se connecter
        $PARAM_mot_passe = 'thr!v3@Gen';
  
        // Attraper les exceptions 
        try {
            $this->connexion = new PDO(
                'mysql:host=' . $PARAM_hote . ';
                dbname=' . $PARAM_nom_bd,
                $PARAM_utilisateur,
                $PARAM_mot_passe   
            );
            $this->connexion->exec("SET NAMES 'UTF8'");
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage() . '<br/>';
            echo 'N° : ' . $e->getCode();
        }
    }

   

/* ------------------------------------------------------------------------------------------------------*/
/* //////////////////////////////////////    getActiviteById    [ 2 ]  //////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/    
    
public function getActiviteById($id) {

    $requete_prepare = $this->connexion->prepare(
        "SELECT * FROM activite WHERE id = :id");

    $requete_prepare -> execute(array("id" => $id ));
    $activ=$requete_prepare->fetch(PDO::FETCH_OBJ);
    return $activ; 
}

/* ------------------------------------------------------------------------------------------------------*/
/* ///////////////////////////////////    getProfileUserById     [ 3 ]     //////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/
    
public function getProfileUserById($idUser) {

        $requete_prepare = $this->connexion->prepare(
            "SELECT * FROM profileC WHERE iduser = :iduser");
    
        $requete_prepare -> execute(array("iduser" => $idUser ));

        $userProfile=$requete_prepare->fetchObject("ProfileC");
        return $userProfile; 
    }

/* ------------------------------------------------------------------------------------------------------*/
/* //////////////////////////////////////    getAllProfileUser    [ 4 ]  ////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/    
    
public function getAllProfileUser(){
        
    $requete_prepare = $this->connexion->prepare(
        "SELECT * FROM profileC");   
    
    $requete_prepare->execute();
     
    $prof=$requete_prepare->fetchAll(PDO::FETCH_CLASS, 'ProfileC');
    return $prof;
}

/* ------------------------------------------------------------------------------------------------------*/
/* //////////////////////////////////////    getProfileByActivite     ///////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/   

public function getProfileByActivite ($idAct) {        
    $requete_prepare = $this->connexion->prepare(
        "SELECT * FROM profileC WHERE idAct = :idAct"); 

     $requete_prepare -> execute(
        array("idAct" => $idAct));

     $listProfile = $requete_prepare->fetchAll(PDO::FETCH_CLASS, 'ProfileC');

     return $listProfile;

}  

/* ------------------------------------------------------------------------------------------------------*/
/* //////////////////////////////////////    getProfileByPermiTra     //////////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/   

public function getProfileByPermiTra ($permiTra) {        
    $requete_prepare = $this->connexion->prepare(
        "SELECT * FROM profileC WHERE permiTra = :permiTra"); 

     $requete_prepare -> execute(
        array("permiTra" => $permiTra));

     $listProfile = $requete_prepare->fetchAll(PDO::FETCH_CLASS, 'ProfileC');

     return $listProfile;

}  

/* ------------------------------------------------------------------------------------------------------*/
/* //////////////////////////////////////    getProfileByCanton     /////////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/   

public function getProfileByCanton ($canton) {        
    $requete_prepare = $this->connexion->prepare(
        "SELECT * FROM profileC WHERE canton = :canton"); 

     $requete_prepare -> execute(
        array("canton" => $canton));

     $listProfile = $requete_prepare->fetchAll(PDO::FETCH_CLASS, 'ProfileC');

     return $listProfile;

}  
/* ------------------------------------------------------------------------------------------------------*/
/* //////////////////////////////////////  getAllProfileUser   ///////////////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/

    public function getAllDogsUser($id){
        $requete_prepare = $this->connexion->prepare(
            "SELECT *  FROM Dog
             WHERE userId = :id");

        $requete_prepare -> execute(array("id" => $id ));
        $dogs=$requete_prepare->fetchAll(PDO::FETCH_CLASS, 'Dog');
        return $dogs; 
    }  

/* ------------------------------------------------------------------------------------------------------*/
/* ///////////////////////////////    get_User_De_Un_Dog_By_User_Id     /////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/ 
    
    public function getUserDeUnDogByUserId($id) {

        $requete_prepare = $this->connexion->prepare(
            "SELECT  * FROM userDog  WHERE id = :id");

        $requete_prepare -> execute(array("id" => $id ));
        $userDog=$requete_prepare->fetchObject("userDog");
        return $userDog; 

}

/* ------------------------------------------------------------------------------------------------------*/
/* ///////////////////////////////    get_Tous_Dog_Article     /////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/ 

    public function getArticlsByDogId($id) {

        $requete_prepare = $this->connexion->prepare(
            "SELECT  * FROM Article  WHERE dogid = :id");

            $requete_prepare -> execute(array("id" => $id));
        $articls=$requete_prepare->fetchAll(PDO::FETCH_CLASS, 'Articl');
        return $articls; 

     }
/* ------------------------------------------------------------------------------------------------------*/
/* ///////////////////////////////   User Iscripation    /////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/ 


    public function insertUser($email, $pwd) {
           
        $requete_prepare = $this->connexion -> prepare(
            "INSERT INTO UserDog (email, pwd) values (:email, :pwd)");
 
        $requete_prepare -> execute(
            array( 'email' => $email,
                    'pwd' => $pwd)); 
 
 } 

/* ------------------------------------------------------------------------------------------------------*/
/* ///////////////////////////////   Check If The User is Exist         /////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/ 

    public function checkUserIsExist($email){
         
             
        $requete_prepare = $this->connexion->prepare(
            "SELECT * FROM UserDog WHERE email =  :email");
        
        $requete_prepare -> execute(array("email" => "$email",));

        $checkUser = $requete_prepare->fetchObject("UserDog");

        return $checkUser;

    }

/* ------------------------------------------------------------------------------------------------------*/
/* ///////////////////////////////          Get Last Entered ID        /////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/ 


    public function getLastId(){

        return $this->connexion->lastInsertId();

    }

/* ------------------------------------------------------------------------------------------------------*/
/* ///////////////////////////////   insertLastConnectionDateToUser     /////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/ 

    public function insertLastConnectionDateToUser($id) {
           
        $requete_prepare = $this->connexion -> prepare(
            "UPDATE UserDog SET lastConnectionDate = NOW()
             WHERE id = :id");

        $requete_prepare -> execute(array("id" => $id));

    }      

/* ------------------------------------------------------------------------------------------------------*/
/* ///////////////////////////////          UpdateUserProfile           /////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/ 

    public function UpdateUserProfile($id, $lastName, $firstName, $country, $city) {
           
        $requete_prepare = $this->connexion -> prepare(
            "UPDATE UserDog SET lastName = :lastName, firstName = :firstName, country = :country, 
            city = :city WHERE id = :id");
     
        $requete_prepare -> execute(array('id' => $id,
                                          'lastName'  => $lastName,
                                          'firstName' => $firstName,
                                          'country' => $country,
                                          'city' => $city));


    }

/* ------------------------------------------------------------------------------------------------------*/
/* ///////////////////////////////          Insert Nouveau Dog          /////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/ 
     
    public  function insertDog($nickName, $birthday, $picture, $userId) {
           
        $requete_prepare = $this->connexion -> prepare(
            "INSERT INTO Dog (nickName, birthday, picture, userId) values (:nickName, :birthday,
                         :picture, :userId)");

        $requete_prepare -> execute(                    
                array( 'nickName' => $nickName,
                       'birthday' => $birthday,
                       'picture' => $picture,
                       'userId' => $userId));                  

    }
    
/* ------------------------------------------------------------------------------------------------------*/
/* ///////////////////////////////            getAllRaces              /////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/ 
    public function getAllRaces() {
   
        $requete_prepare = $this->connexion -> prepare(
            "SELECT nameRace FROM Race");
 
        $requete_prepare -> execute();
        $race=$requete_prepare->fetchAll(PDO::FETCH_OBJ);
 
        return $race;
 }

    

    
/* ------------------------------------------------------------------------------------------------------*/
/* ///////////////////////////////            getAllActiviteFr   [ 1 ]        ///////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/ 

public function getAllActiviteFr() {
   
    $requete_prepare = $this->connexion -> prepare(
        "SELECT * FROM activite");

    $requete_prepare -> execute();
    $act=$requete_prepare->fetchAll(PDO::FETCH_OBJ);
     
    return $act;
}    




    
/* ------------------------------------------------------------------------------------------------------*/
/* -----------------------------------------La FIN DE CLASS CONNEXION------------------------------------*/
}      
/* -----------------------------------------La FIN DE CLASS CONNEXION------------------------------------*/
/* ------------------------------------------------------------------------------------------------------*/


 class ProfileC {
    public $idUser;
    public $idAct;
    public $emailUser;
    public $phoneNum;
    public $lastName;
    public $firstName;
    public $canton;
    public $ville;
    public $permiTra;
    public $permiCo;
    public $photo;
    public $cvPdf;
    public $vedioT;

    
        public function __set($name, $value){}
        public function setIdUser($idAct) { $this->idAct = $idAct; }
        public function getIdUser() { return $this->idAct; }    
        public function setIdAct($idAct) { $this->idAct = $idAct; }
        public function getIdAct() { return $this->idAct; }
        public function setEmailUser($emailUser) { $this->emailUser = $emailUser; }
        public function getEmailUser() { return $this->emailUser; }
        public function setPhoneNum($phoneNum) { $this->phoneNum = $phoneNum; }
        public function getPhoneNum() { return $this->phoneNum; }
        public function setLastName($lastName) { $this->lastName = $lastName; }
        public function getLastName() { return $this->lastName; }
        public function setFirstName($firstName) { $this->firstName = $firstName; }
        public function getFirstName() { return $this->firstName; }
        public function setCanton($canton) { $this->canton = $canton; }
        public function getCanton() { return $this->canton; }
        public function setVille($ville) { $this->ville = $ville; }
        public function getVille() { return $this->ville; }
        public function setPermiTra($permiTra) { $this->permiTra = $permiTra; }
        public function getPermiTra() { return $this->permiTra; }
        public function setPermiCo($permiCo) { $this->permiCo = $permiCo; }
        public function getPermiCo() { return $this->permiCo; }
        public function setPhoto($photo) { $this->photo = $photo; }
        public function getPhoto() { return $this->photo; }
        public function setCvPdf($cvPdf) { $this->cvPdf = $cvPdf; }
        public function getCvPdf() { return $this->cvPdf; }
        public function setVedioT($vedioT) { $this->vedioT = $vedioT; }
        public function getVedioT() { return $this->vedioT; }

}

?>
