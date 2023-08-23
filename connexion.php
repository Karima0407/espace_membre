<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once "nav.php" ; ?>
    <form action="traitement.php" method="post">
        <div>
        <input type="text"name="pseudo" placeholder="Votre pseudo">
    </div>
    <div>
    <input type="password" name="password" id=""placeholder="Votre mot de passe">
    </div>
    <div>
        <button name="connexion">Connexion</button>
    </div>
    </form>
    
</body>
</html>