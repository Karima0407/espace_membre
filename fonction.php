<?php
require_once "database.php";
function getPost(){
   $lesPosts = null;
    $dbConnect=dbConnexion(); // connexion a la bd
    //preparation de la requete 
    $request=$dbConnect->prepare("SELECT id_post, likes, membre_id, text, photo, id_membre, pseudo FROM posts, membres WHERE posts.membre_id = membres.id_membre");
   // execution de la requete

   try{
    $request->execute();
   $lesPosts = $request->fetchAll();

   }catch(PDOException $e){
      $lesPosts=$e->getMessage();
   }
   return $lesPosts; // retourne la liste des posts
}