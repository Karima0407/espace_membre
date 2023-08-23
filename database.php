<?php
function dbConnexion()
{
    $connexionDb = null; //variable qui doit stocker notre instance de connexion à la base de données 

    try {

        $connexionDb = new PDO("mysql:host=localhost;dbname=cours_db", "root", ""); // on recupere l'objet de connexion à la base de données dans la variable 
//  $connexionDb

    } catch (PDOException $erreur) { // si la connexion echoue 
        $connexionDb = $erreur; //on recupere notre erreur dans $connexionDb



    }
    return $connexionDb; // retourne un objet de connexion ou une erreur  

}



?>