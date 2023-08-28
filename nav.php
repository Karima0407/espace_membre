<?php
if(isset($_SESSION['id'])){?>
 <nav class="premier">
    <a href="post.php">publier</a>
   <div class="profil">
    <img src="img/<?php echo $_SESSION['img'];?>" alt="profil">
   </div> 
    <form method="post">
        <button class="dcnx" name="logout">Deconnexion</button>
    </form>
 </nav>
<?php } else { ?>
        <nav>
        <button><a href="connexion.php">Connexion</a></button>
    </nav>
<?php } ?>

<?php
// couper la session du site
if(isset($_POST['logout'])){
    session_destroy();
}
?>
