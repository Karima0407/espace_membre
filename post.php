<?php session_start() ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include_once ("nav.php" ); ?>
    <form class="post_fichier" action="traitement.php" method="post" enctype="multipart/form-data">
     <input  type="file" name="img">
     <div><textarea name="message" id="" cols="30" rows="10" placeholder="votre message"></textarea></div>
     <button name="publier">publier</button>
    </form>
</body>
</html>