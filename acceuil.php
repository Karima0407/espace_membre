<?php 
session_start();//à mettre avant html c'est pour demarrer une session

if(!isset($_SESSION['id'])){
    header("Location :connexion.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once "nav.php"; ?>
</body>
</html>