<?php
session_start(); //à mettre avant html c'est pour demarrer une session
echo $_COOKIE['id_user'];
require_once 'fonction.php';

if (!isset($_SESSION['id'])) {
    header("Location: connexion.php");
}
$listPost = getPost(); // recuperer la liste des posts
// echo "<pre>";
// print_r($listPost);
// echo "<pre>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include_once "nav.php"; ?>
    <div class="container">
        <?php foreach ($listPost as $post) { ?>
            <div class="post">
                <div class="postimg">
                    <img src="img/<?= $post['photo']; ?>" alt="image">
                </div>
                <p>
                    <?= $post['text']; ?>
                </p>
                <span>
                    <?= $post['likes']; ?>likes 
                    <a href="traitement.php?idpost=<?= $post['id_post']; ?>"><i class="fa-solid fa-thumbs-up"></i></a>
                </span>
            </div>
        <?php } ?>
    </div>

</body>

</html>