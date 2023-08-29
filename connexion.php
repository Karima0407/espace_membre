<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>

</head>

<body>
    <div class="fond">
        <form class="image" action="traitement.php" method="post">
            <?php if (isset($_SESSION['error'])) { ?>
                <p>
                    <?= $_SESSION['error']; ?>
                </p>

            <?php } ?>
            <div>
                <input type="text" name="pseudo" placeholder="Votre pseudo">
            </div>
            <div>
                <input type="password" name="password" id="" placeholder="Votre mot de passe">
            </div>
            <div>
                <button name="connexion" class="bouton_cnx">Connexion</button>
            </div>
        </form>
    </div>


</body>

</html>