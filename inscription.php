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
    <?php include_once "nav.php"; ?>
    <div class="contenu">
       
        <div class="cadre">
            <button class="cnx">Connexion</button>
        </div>
        <form action="traitement.php"method="POST" enctype="multipart/form-data">
             <div><input type="text" name="email" id="" placeholder="Votre email"></div>
        <div><input type="text" name="pseudo" id="" placeholder="Votre pseudo"></div>
        <div><input type="password" name="password" id="" placeholder="Mot de passe"></div>
        <div><input type="password" name="repass" id="" placeholder="Confirmation mot de passe"></div>
        <div><input type="file" name="image" id="" ></div>
        
        <button class="inscri" name="envoi">Inscription</button>

        </form>

       
        
    </div>

</body>

</html>