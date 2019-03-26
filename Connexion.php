<?php
/* ------------------------------------------------------------------------------------------------------*/
/* ----------------------------------Set UTF-8 as the character set------------------------------------- */
/* ------------------------------------------------------------------------------------------------------*/
header('Content-Type: text/html; charset=utf-8');
/* ------------------------------------------------------------------------------------------------------*/
/* ///////////////////////////////////////CLASSE DE CONNEXION////////////////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/
class Connexion
{
    private $connexion;

    public function __construct()
    {
        // le chemin vers le serveur
        $PARAM_hote = 'localhost';
        // le port de connexion à la base de données
        $PARAM_port = '3306';
        // le nom de la base de données
        $PARAM_nom_bd = 'InstaDog';
        // Le nom d'utilisateur pour se connecter 
        $PARAM_utilisateur = 'adminInstaDog';
        // le mot de passe de l'utilisateur pour se connecter
        $PARAM_mot_passe = 'Inst@D0g';
        // Attraper les exceptions
        try {
            $this->connexion = new PDO(
                'mysql:host=' . $PARAM_hote . ';
                dbname=' . $PARAM_nom_bd,
                $PARAM_utilisateur,
                $PARAM_mot_passe
            );
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage() . '<br/>';
            echo 'N° : ' . $e->getCode();
        }
    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* ----------------------------------------UTILISATEUR(S)----------------------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function getUsers()
    {
        // Je prépare la requête 
        $requete_prepare = $this->connexion->prepare(
            "SELECT * 
            FROM UserDog"
        );
        // J'execute la requête
        $requete_prepare->execute();
        // Je récupère le résultat de la requête en mappant avec la classe Profile
        $listUsers = $requete_prepare->fetchAll(PDO::FETCH_CLASS, 'Profile');
        // Je retourne une liste d'objets Profile 
        return $listUsers;
    }

    public function getUserProfile($id)
    {
        // Je prépare la requête 
        $requete_prepare = $this->connexion->prepare(
            "SELECT * 
            FROM UserDog
            WHERE id = :id"
        );
        // J'execute la requête en passant la valeur
        $requete_prepare->execute(
            array('id' => $id)
        );
        // Je récupère le résultat de la requête en mappant avec la classe Profile
        $userProfile = $requete_prepare->fetchObject("Profile");
        // Je retourne un objet Profile
        return $userProfile;
    }

    public function getUsersByEmail($email)
    {
        // Je prépare la requête 
        $requete_prepare = $this->connexion->prepare(
            "SELECT * 
            FROM UserDog
            WHERE email = :email"
        );
        // J'execute la requête en passant la valeur
        $requete_prepare->execute(
            array('email' => $email)
        );
        // Je récupère le résultat de la requête en mappant avec la classe Profile
        $userProfile = $requete_prepare->fetchObject("Profile");
        // Je retourne un objet Profile
        return $userProfile;
    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* ----------------------------------------------DOG(S)------------------------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function getDogs() // => index.php
    {
        // Je prépare la requête 
        $requete_prepare = $this->connexion->prepare(
            "SELECT * 
            FROM Dog"
        );
        // J'execute la requête
        $requete_prepare->execute();
        // Je récupère le résultat de la requête en mappant avec la classe Dog
        $listDogs = $requete_prepare->fetchAll(PDO::FETCH_CLASS, 'Dog');
        // Je retourne une liste d'objets Dog
        return $listDogs;
    }

    public function getDogProfile($id) // => profil-du-chien.php
    {
        // Je prépare la requête 
        $requete_prepare = $this->connexion->prepare(
            "SELECT * 
            FROM Dog
            WHERE id = :id"
        );
        // J'execute la requête en passant la valeur
        $requete_prepare->execute(
            array('id' => $id)
        );
        // Je récupère le résultat de la requête en mappant avec la classe Dog
        $dog = $requete_prepare->fetchObject("Dog");
        // Je retourne un object Dog
        return $dog;
    }

    public function getUserDogs($userId)
    {
        // Je prépare la requête 
        $requete_prepare = $this->connexion->prepare(
            "SELECT * 
            FROM Dog
            WHERE userId = :userId"
        );
        // J'execute la requête en passant la valeur
        $requete_prepare->execute(
            array('userId' => $userId)
        );
        // Je récupère le résultat de la requête en mappant avec la classe Dog
        $listUserDogs = $requete_prepare->fetchAll(PDO::FETCH_CLASS, 'Dog');
        // Je retourne une liste d'objets Dog
        // $test = new Profile();
        // $test->setListDogs($listUserDogs);
        return $listUserDogs;
    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* ---------------------------------------------- ARTICLES --------------------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function getArticles()
    {
        // Je prépare la requête 
        $requete_prepare = $this->connexion->prepare(
            "SELECT * 
            FROM Article"
        );
        // J'execute la requête
        $requete_prepare->execute();
        // Je récupère le résultat de la requête en mappant avec la classe Article
        $listArticles = $requete_prepare->fetchAll(PDO::FETCH_CLASS, 'Article');
        // Je retourne une liste d'objets Article
        return $listArticles;
    }

    public function getArticleDetails($id)
    {
        // Je prépare la requête 
        $requete_prepare = $this->connexion->prepare(
            "SELECT * 
            FROM Article
            WHERE id = :id"
        );
        // J'execute la requête en passant la valeur
        $requete_prepare->execute(
            array('id' => $id)
        );
        // Je récupère le résultat de la requête en mappant avec la classe Article
        $article = $requete_prepare->fetchObject("Article");
        // Je retourne un objet Article
        return $article;
    }

    public function getDogArticles($dogId) // profil-du-chien.php
    {
        // Je prépare la requête 
        $requete_prepare = $this->connexion->prepare(
            "SELECT * 
            FROM Article
            WHERE dogId = :dogId"
        );
        // J'execute la requête en passant la valeur
        $requete_prepare->execute(
            array('dogId' => $dogId)
        );
        // Je récupère le résultat de la requête en mappant avec la classe Article
        $listDogArticles = $requete_prepare->fetchAll(PDO::FETCH_CLASS, 'Article');
        // Je retourne une liste d'objets Article
        return $listDogArticles;
    }

    /* ------------------------------------------------------------------------------------------------------*/
    /* ---------------------------------------------- COMMENTS --------------------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function getComments()
    {
        // Je prépare la requête 
        $requete_prepare = $this->connexion->prepare(
            "SELECT * 
            FROM Comment"
        );
        // J'execute la requête en passant la valeur
        $requete_prepare->execute();
        // Je récupère le résultat de la requête en mappant avec la classe Comment
        $listComments = $requete_prepare->fetchAll(PDO::FETCH_CLASS, 'Comment');
        // Je retourne une liste d'objets Comment
        return $listComments;
    }

    public function getCommentDetails($id)
    {
        // Je prépare la requête 
        $requete_prepare = $this->connexion->prepare(
            "SELECT * 
            FROM Comment
            WHERE id = :id"
        );
        // J'execute la requête en passant la valeur
        $requete_prepare->execute(
            array('id' => $id)
        );
        // Je récupère le résultat de la requête en mappant avec la classe Comment
        $comment = $requete_prepare->fetchObject("Comment");
        // Je retourne un objet Comment
        return $comment;
    }

    public function getArticleComments($articleId)
    {
        // Je prépare la requête 
        $requete_prepare = $this->connexion->prepare(
            "SELECT * 
            FROM Comment
            WHERE articleId = :articleId"
        );
        // J'execute la requête en passant la valeur
        $requete_prepare->execute(
            array('articleId' => $articleId)
        );
        // Je récupère le résultat de la requête en mappant avec la classe Comment
        $listArticleComments = $requete_prepare->fetchAll(PDO::FETCH_CLASS, 'Comment');
        // Je retourne une liste d'objets Comment
        return $listArticleComments;
    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* -----------------------------------FONCTION D'INSERTION COMMENT-------------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function setComment ($comment, $publicationDate, $articleId, $userId){
        // on prépare notre requête 
        $requete_prepare = $this->connexion->prepare(
            "INSERT INTO Comment (comment, publicationDate, articleId, userId) 
            VALUE (:comment, :publicationDate, :articleId, :userId)"
        );
        // on exécute la requête
        $requete_prepare->execute (
            array ( 'comment' => $comment,
                    'publicationDate' => $publicationDate,
                    'articleId' => $articleId,
                    'userId' => $userId
            )
        );
    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* -----------------------------------FONCTION D'INSERTION ARTICLE-------------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function setArticle ($title, $picture, $description, $publicationDate, $dogId){
        // on prépare notre requête 
        $requete_prepare = $this->connexion->prepare(
            "INSERT INTO Article (title, picture, description, publicationDate, dogId) 
            VALUE (:title, :picture, :description, :publicationDate, :dogId)"
        );
        // on exécute la requête
        $requete_prepare->execute (
            array ( 'title' => $title,
                    'picture' => $picture,
                    'description' => $description,
                    'publicationDate' => $publicationDate,
                    'dogId' => $dogId
            )
        );
        return $this->connexion->lastInsertId();
    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* ------------------------------------ FONCTION D'INSERTION DOG --------------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function setDog ($nickname, $birthday, $picture, $userId){
        // on prépare notre requête 
        $requete_prepare = $this->connexion->prepare(
            "INSERT INTO Dog (nickname, birthday, picture, userId) 
            VALUE (:nickname, :birthday, :picture, :userId)"
        );
        // on exécute la requête
        $requete_prepare->execute (
            array ( 'nickname' => $nickname,
                    'birthday' => $birthday,
                    'picture' => $picture,
                    'userId' => $userId
            )
        );
        return $this->connexion->lastInsertId();
    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* ----------------------------------- FONCTION D'INSERTION USER --------------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function setUserDog ($email, $pwd, $lastConnectionDate, $lastName, $firstName, $country, $city){
        // on prépare notre requête 
        $requete_prepare = $this->connexion->prepare(
            "INSERT INTO UserDog (email, pwd, lastConnectionDate, lastName, firstName, country, city) 
            VALUE (:email, :pwd, :lastConnectionDate, :lastName, :firstName, :country, :city)"
        );
        // on exécute la requête
        $requete_prepare->execute (
            array ( 'email' => $email,
                    'pwd' => $pwd,
                    'lastConnectionDate' => $lastConnectionDate,
                    'lastName' => $lastName,
                    'firstName' => $firstName,
                    'country' => $country,
                    'city' => $city
            )
        );
        return $this->connexion->lastInsertId();
    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* -------------------- FONCTION RECHERCHER UN CHIEN PAR NOM OU RACE ----------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function getDogsByKeywords($keywords)
    {
        // Je prépare la requête 
        $requete_prepare = $this->connexion->prepare(
            "SELECT * 
            FROM Dog
            WHERE nickname LIKE :keywords"
        );
        // J'execute la requête en passant la valeur
        $requete_prepare->execute(
            array('keywords' => "%$keywords%")
        );
        // Je récupère le résultat de la requête sous forme d'objet en mappant avec la classe Dog
        $listDogs = $requete_prepare->fetchAll(PDO::FETCH_CLASS, 'Dog');
        // Je retourne un objet Comment
        return $listDogs;
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
    /* ///////////////////////////////            getAllRaces              /////////////////////////////////*/
    /* ------------------------------------------------------------------------------------------------------*/ 
    public function getAllRaces() {
    
        $requete_prepare = $this->connexion -> prepare(
            "SELECT * FROM Race");

        $requete_prepare -> execute();
        $race=$requete_prepare->fetchAll(PDO::FETCH_OBJ);

        return $race;
    } 
        /* ------------------------------------------------------------------------------------------------------*/
    /* -------------------- FONCTION RECHERCHER UNE RACE PAR ID  ----------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    // public function getDogsByRace($race)
    // {
    //     // Je prépare la requête 
    //     $requete_prepare = $this->connexion->prepare(
    //         "SELECT * 
    //         FROM Dog
    //         WHERE nameRace = :race"
    //     );
    //     // J'execute la requête en passant la valeur
    //     $requete_prepare->execute(
    //         array('race' => "%$race%")
    //     );
    //     // Je récupère le résultat de la requête sous forme d'objet en mappant avec la classe Dog
    //     $listDogs = $requete_prepare->fetchAll(PDO::FETCH_CLASS, 'Dog');
    //     // Je retourne un objet CommentfetchAll(PDO::FETCH_CLASS, 'Dog');
    //     return $listDogs;fetchAll(PDO::FETCH_CLASS, 'Dog');
    // }  fetchAll(PDO::FETCH_CLASS, 'Dog');
  /* -----------------------------------------------------fetchAll(PDO::FETCH_CLASS, 'Dog');-------------------------------------------------*/
    /* -------------------- FONCTION RECHERCHER UNE RACE PfetchAll(PDO::FETCH_CLASS, 'Dog');AR ID  ----------------------------------- */
    /* ---------------------personneId--------------------fetchAll(PDO::FETCH_CLASS, 'Dog');-------------------------------------------------------------*/
    public function getDogsByRace ($raceId) {        
        $requete_prepare = $this->connexion->prepare(
            "SELECT D.id, D.nickname, D.birthday, D.picture, D.userId FROM Dog D
        INNER JOIN DogRace DR ON DR.dogId = D.id
        WHERE DR.raceId = :raceId");     
         $requete_prepare -> execute(
            array("raceId" => $raceId));
         $listDogs = $requete_prepare->fetchAll(PDO::FETCH_CLASS, 'Dog');
         return $listDogs;
    }
    /* ------------------------------------------------------------------------------------------------------*/
/* ///////////////////////////////          UpdateUserProfile           /////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/ 

    public function UpdateUserProfile($id, $lastName, $firstName, $country, $city) {  // Pour page profil-form.php     
        $requete_prepare = $this->connexion -> prepare(
            "UPDATE UserDog 
            SET lastName = :lastName, 
                firstName = :firstName, 
                country = :country, 
                city = :city 
            WHERE id = :id");
     
        $requete_prepare -> execute(array('id' => $id,
                                          'lastName'  => $lastName,
                                          'firstName' => $firstName,
                                          'country' => $country,
                                          'city' => $city));
    }   
    /* ------------------------------------------------------------------------------------------------------*/
    /* ------------------------------------ FONCTION D'INSERTION RACEDOG --------------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function setDogRace ($dogId, $raceId){
        // on prépare notre requête 
        $requete_prepare = $this->connexion->prepare(
            "INSERT INTO DogRace (dogId, raceId) 
            VALUE (:dogId, :raceId)"
        );
        // on exécute la requête
        $requete_prepare->execute (
            array ( 'dogId' => $dogId,
                    'raceId' => $raceId
            )
        );
    }
}
    

// CLASSE USERDOG
include "UserDog.php";
// CLASSE DOG
include "Dog.php";
// CLASSE ARTICLE
include "Article.php";
// CLASSE COMMENT
include "Comment.php";

?>