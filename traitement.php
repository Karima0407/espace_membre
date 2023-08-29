<?php
session_start();
// inclure le fichier database qui contient la fonction permettant de se connecter à la base de données 
require_once('database.php');
if (isset($_POST['envoi'])) {
    //recuperation des données saisies par l'utilisateur
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $password = htmlspecialchars($_POST['password']);
    $email = htmlspecialchars($_POST['email']);
    $repass = htmlspecialchars($_POST['repass']);
    //crypter le mot de passe hachée
    $mdpCrypt = password_hash($password, PASSWORD_DEFAULT);
    // il faut se connecter à la base de données
    // echo "<pre>";
    // print_r($_FILES);
    // echo "<pre>";

    // traitement de l'image
    $img_name = $_FILES['image']['name'];
    $img_tmp = $_FILES['image']['tmp_name'];
    $destination = $_SERVER['DOCUMENT_ROOT'] . '/espace_membre/img/' . $img_name;
    move_uploaded_file($img_tmp, $destination); //une fonction qui enregistre l'image dans le dossier img

    $db = dbConnexion(); //permet la connexion avec la base de données
    //preparation de la requete
    $request = $db->prepare("INSERT INTO membres(email,pseudo,mdp,profil_img) VALUES (?,?,?,?)");
    //execution  de la requete
    try {
        $request->execute(array($email, $pseudo, $mdpCrypt, $img_name));
    } catch (PDOException $e) {
        echo $e->getMessage(); //afficher l'erreur sql genere 
    }

}

//pour la connexion
if (isset($_POST['connexion'])) {
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['password'];

    // etablir la connexion avec la bd
    $connect = dbConnexion();
    //preparer la requete
    $connexionRequest = $connect->prepare("SELECT * FROM membres WHERE pseudo = ?");
    // ? car c'est une requete préparé
    //exécuter une requête
    $connexionRequest->execute(array($pseudo));
    //récupère le résultat de la requete dans le tableau : $utilisateur
    $utilisateur = $connexionRequest->fetch(PDO::FETCH_ASSOC); // converti le résultat de la requête en tableau pour le manipuler facilement. On départ c'est objet
    // "fetch", "prepare", "exécute"...  sont des méthod de la class PDO qui nous les fournis

    // echo "<pre>";
    // print_r($utilisateur);
    // echo "<pre>";


    //le tableau $utilisateur contient les infos de l'utilisateur comme suivant:
    //$utilisateur=[
    //'id_membre'=>1,
    // "email"=>"WassilaDors@mail.com,
    // "pseudo"=>WassilaDors",
    // "mdp"=>$hljljmskifmol*ù*ùfù,
    // "profil_img"=>"sommeil.enfant.dormir.jpeg";
//   ]

    //si aucun utilisateur de correspond, il retourne un tableau vide

    if (empty($utilisateur)) { // si le tableau $utilisateur est vide
        // echo "Utilisateur inconnu...";
        $_SESSION['error'] = "Utilisateur inconnu...";
        header("Location:connexion.php"); //rediriger 

    } else { //sinon
        //vérifie le mot de passe (est-ce cette chaine de caractère qui est à l'origine du cryptage)
        if (password_verify($mdp, $utilisateur["mdp"])) { // mdp c'est le nom de la colonne dans le table
            //la variable$_SESSION est un tableau
            // touts les superglobal en php sont des tableaux
            // creer les variables de session:
            $_SESSION["id"] = $utilisateur['id_membre'];
            $_SESSION['pseudo'] = $utilisateur['pseudo'];
            $_SESSION['img'] = $utilisateur['profil_img'];

            //cration du cookie qui va stocker l'identifiant de l'utilisateurpour permettre une 
            // meilleure experience c a d on va la connecter automatiquement apres verification du cookie
            setcookie("id_user",$utilisateur['id_membre'],time()+3600,'/','localhost',false,true);

            header("Location: acceuil.php");
        } else {
            echo "mot de passe incorrect";
            // header("refresh:2;http://localhost/php/WF3/espace_membre/connexion.php");
        }
    }







}

// pour la publication
if (isset($_POST['publier'])) {
    $message = htmlspecialchars($_POST['message']);
    $img_name = $_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_name'];
    $destination = $_SERVER['DOCUMENT_ROOT'].'/espace_membre/img/'.$img_name;
    move_uploaded_file($tmp, $destination);

    // connexion a la bd
    $dbconnect = dbConnexion();
    // preparation de la requete
    $request = $dbconnect->prepare("INSERT INTO posts (membre_id,photo,text) VALUES (?,?,?)");
    // execution de la requete
    try {
        $request->execute(array($_SESSION["id"], $img_name, $message));
        header("Location: acceuil.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_GET['idpost'])){
    $dbconnect=dbConnexion();//connexion a la base de données
    // preparer la requete
    $request=$dbconnect->prepare("SELECT likes FROM posts WHERE id_post=?");
    // executer la requete
    $request->execute(array ($_GET['idpost']));
    // on recupere le resultat
    $likes=$request->fetch();
    // echo $likes['likes'];// cest pour quand on clique sur le bouton like affiche le nombre de likes
    //requete pour modifier le nombre like
    $request1=$dbconnect->prepare ("UPDATE posts SET likes=? WHERE id_post=?");
    // executer la requete
    $request1->execute(array($likes['likes']+1, $_GET['idpost']));
    header("Location:acceuil.php");

}